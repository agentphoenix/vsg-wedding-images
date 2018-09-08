<template>
    <transition name="modal">
        <div class="modal-mask" @click="close" v-show="show">
            <div class="mx-4">
                <div class="overflow-hidden rounded shadow-lg w-full mx-auto mt-20 modal-container" @click.stop>
                    <div class="flex items-center justify-between px-4 pt-6 bg-white">
                        <h3 class="uppercase tracking-wide text-sm">Want to add a caption?</h3>
                    </div>
                    <div class="flex px-4 py-6 bg-white">
                        <textarea v-model="caption"
                                  class="w-full p-3 border rounded font-sans leading-normal"
                                  rows="8"
                                  placeholder="Feel free to add a caption, tell a story, or leave a message with your post"
                        ></textarea>
                    </div>
                    <div class="flex">
                        <button class="w-full p-4 bg-guava-dark text-white font-medium text-sm uppercase tracking-wide hover:bg-guava"
                                @click="save"
                        >
                            Add Post
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        transition: opacity .3s ease;
    }

    .modal-container {
        transition: all .3s ease;
    }

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>


<script>
export default {
    props: {
        show: {
            type: Boolean,
            default: false
        }
    },

    data () {
        return {
            caption: ''
        }
    },

    methods: {
        close () {
            this.$emit('close');
        },

        save () {
            alert('Saving...');
            this.$emit('save', this.caption);
        }
    }
}
</script>
