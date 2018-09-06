<template>
	<div>
		<div class="field-group">
			<input type="text" class="field" name="first_name" placeholder="First Name" required autofocus v-model="firstName">
		</div>

		<div class="field-group">
			<input type="text" class="field" name="last_name" placeholder="Last Name" required v-model="lastName">
		</div>

		<transition name="custom-classes-transition"
					enter-active-class="animated flipInX"
					leave-active-class="animated flipOutX">
			<div class="field-group" v-show="needsPassword">
				<input type="password" class="field" name="password" placeholder="Password">
			</div>
		</transition>
	</div>
</template>

<script>
import _ from 'lodash';
import App from '../vsg';

export default {
    data () {
        return {
            firstName: '',
            lastName: '',
            guardedUsers: []
        }
    },

    computed: {
        fullName () {
            return [this.firstName, this.lastName].join(' ');
        },

        needsPassword () {
            return _.findIndex(this.guardedUsers, (user) => {
                return user.fullName == this.fullName;
            }) > -1;
        }
    },

    mounted () {
        App.request()
        .get('/sign-in/get-guarded-users')
        .then(({data}) => {
            this.guardedUsers = data;
        });
    }
}
</script>
