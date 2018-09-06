<template>
    <transition name="comments"
                enter-active-class="animated slideInDown"
                leave-active-class="animated slideOutUp"
    >
        <div class="text-grey-dark mt-3 relative p-3 pt-0 -mt-3 z-10" v-show="show">
            <div class="flex flex-row items-start text-sm my-6 rounded border-2 border-grey-lighter p-3">
                <textarea class="autosize outline-none appearance-none w-full text-grey-darker leading-normal"
                          placeholder="Leave a comment"
                          rows="1"
                          v-model="body"
                ></textarea>

                <button class="appearance-none ml-2 text-blue leading-none outline-none" @click="submit">
                    <i data-feather="send" class="h-6 w-6"></i>
                </button>
            </div>

            <transition-group name="comment-list" tag="div" enter-active-class="animated fadeIn">
                <div v-for="comment in comments" :key="comment.id">
                    <post-comment-list-item :comment="comment"></post-comment-list-item>
                </div>
            </transition-group>
        </div>
    </transition>
</template>

<script>
import App from '../vsg';
import autosize from 'autosize';
import PostCommentListItem from './PostCommentListItem';

export default {
    components: { PostCommentListItem },

    props: {
        post: {
            type: Object,
            required: true,
            default: () => {
                return {};
            }
        },
        initialComments: {
            type: Array,
            default: () => {
                return [];
            }
        },
        show: {
            type: Boolean,
            default: false
        }
    },

    data () {
        return {
            body: '',
            comments: this.initialComments
        }
    },

    methods: {
        submit () {
            App.request().post(route('comments.store', { post: this.post.id }), {
                'body': this.body
            }).then(({data}) => {
                this.comments.unshift({
                    id: data.id,
                    body: data.body,
                    author: data.author
                });

                this.body = '';
            });
        }
    },

    mounted () {
        autosize(document.querySelectorAll('textarea.autosize'));
    }
}
</script>
