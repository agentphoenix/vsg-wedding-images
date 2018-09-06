<template>
    <div class="container pt-24">
        <div class="flex w-full bg-white shadow-stripe-lg rounded overflow-hidden mb-8"
             v-for="post in posts"
             :key="post.id"
        >
            <post-list-item :post="post"></post-list-item>
        </div>

        <div class="rounded p-4 bg-guava-lighter text-guava-darker font-medium" v-if="posts.length === 0">
            Sorry, it looks like there aren't any posts.
        </div>
    </div>
</template>

<script>
import PostListItem from './PostListItem';

export default {
    components: { PostListItem },

    props: {
        posts: {
            type: Array,
            default: () => {
                return [];
            }
        }
    }
}
</script>
