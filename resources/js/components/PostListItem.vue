<template>
    <div class="flex-1">
        <div class="bg-white relative p-4 flex flex-col flex-1 w-full" style="z-index:100">
            <div class="text-xl">
                <div class="font-extrabold" v-text="post.author.fullName"></div>
                <div class="text-sm font-normal text-grey-dark uppercase tracking-wide mb-3" v-text="post.created"></div>
            </div>

            <div class="-mx-4" v-if="post.media.length > 0">
                <carousel ref="carousel"
                          :per-page="1"
                          :pagination-enabled="false"
                          :navigation-enabled="false"
                          @pageChange="pageChanged($event)"
                          @mounted="carouselMounted"
                >
                    <slide v-for="image in post.allMedia" :key="image.id">
                        <div v-html="image"></div>
                    </slide>
                </carousel>
            </div>

            <div v-if="post.caption">
                <div class="mb-3" v-text="post.caption"></div>
            </div>

            <div class="flex items-center justify-between mt-3">
                <favorite :post="post"></favorite>

                <button class="flex items-center outline-none" @click="showComments = !showComments">
                    <span class="mr-1 text-sm text-grey-dark"
                        :class="{ 'text-blue-dark': post.commentsCount > 0 }"
                        v-text="post.commentsCount"
                    ></span>
                    <i data-feather="message-circle" class="h-6 w-6 text-grey" :class="{ 'text-blue-dark': post.commentsCount > 0 }"></i>
                </button>
            </div>
        </div>

        <post-comment-list :post="post"
                           :show="showComments"
                           :initial-comments="post.comments"
        ></post-comment-list>
    </div>
</template>

<script>
import _ from 'lodash';
import { Carousel, Slide } from 'vue-carousel';
import Favorite from './PostListItemFavorite';
import PostCommentList from './PostCommentList';

export default {
    components: { Favorite, PostCommentList, Carousel, Slide },

    props: {
        post: {
            type: Object,
            default: () => {
                return {};
            }
        }
    },

    data () {
        return {
            showComments: false
        }
    },

    methods: {
        carouselMounted () {
            console.log('carousel mounted')
        },

        pageChanged (value) {
            let element = this.$refs.carousel.$el;

            element.setAttribute('style', 'height:auto');
        }
    },

    mounted () {
        this.$nextTick(() => {
            if (this.$refs.carousel) {
                const slides = this.$refs.carousel.$children;

                slides.forEach((slide) => {
                    if (slide.isActive) {
                        const element = slide.$el;

                        // console.log(element.getBoundingClientRect());

                        // element.setAttribute('style', 'border:1px solid red');
                    }
                });
            }
        });
    }
}
</script>
