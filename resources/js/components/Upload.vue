<template>
    <div>
        <label class="text-grey-darker leading-none flex">
            <i data-feather="plus-circle" class="h-8 w-8"></i>
            <input type="file"
                name="media[]"
                class="relative h-px w-px overflow-hidden opacity-0"
                style="z-index:-1"
                accept="image/*"
                multiple
                @change="addMedia($event.target.name, $event.target.files)">
        </label>

        <modal :show="showModal"
               @close="showModal = false"
               @save="upload($event)"
        ></modal>
    </div>
</template>

<script>
import App from '../vsg';
import Modal from './Modal';

export default {
    components: { Modal },

    data () {
        return {
            formData: null,
            showModal: false
        }
    },

    methods: {
        addMedia (fieldName, fileList) {
            this.formData = new FormData();

            if (! fileList.length) {
                return;
            }

            Array.from(Array(fileList.length).keys())
                .map((x) => {
                    return this.formData.append(fieldName, fileList[x], fileList[x].name);
                });

            this.showModal = true;
        },

        upload (caption) {
            this.formData.append('caption', caption);

            App.request().post(route('posts.store'), this.formData)
            .then(({data}) => {
                this.showModal = false;

                window.location.reload();
            })
            .catch((error) => {
                //
            });
        }
    }
}
</script>