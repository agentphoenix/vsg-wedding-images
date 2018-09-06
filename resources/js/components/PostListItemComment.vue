<template>
    <button class="flex items-center outline-none" @click="toggle">
        <div class="text-sm font-mono font-medium text-blue-dark mr-1"
             v-show="count > 0"
             v-text="count"
        ></div>
        <div v-html="icon"></div>
    </button>
</template>

<script>
import App from '../vsg';
import feather from 'feather-icons';

export default {
    props: {
        post: {
            type: Object,
            required: true,
            default: () => {
                return {};
            }
        }
    },

    data () {
        return {
            active: this.post.isFavorited,
            count: this.post.commentsCount
        }
    },

    computed: {
        icon () {
            let attributes = {};

            if (this.active) {
                attributes['class'] = 'h-6 w-6 fill-current text-guava-dark';
            } else {
                attributes['class'] = 'h-6 w-6 fill-none text-grey-dark';
            }

            return feather.icons['message-circle'].toSvg(attributes);
        }
    },

    methods: {
        toggle () {
            let action = {};

            if (this.active) {
                action = {
                    method: 'delete',
                    url: route('favorites.destroy', { post: this.post.id })
                };

                this.active = false;
                this.count--;
            } else {
                action = {
                    method: 'post',
                    url: route('favorites.store', { post: this.post.id })
                };

                this.active = true;
                this.count++;
            }

            return App.request(action);
        }
    }
}
</script>
