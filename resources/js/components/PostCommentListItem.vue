<template>
    <div class="text-sm leading-normal mb-4">
        <strong class="font-semibold" v-text="comment.author.fullName"></strong>
        <span v-html="comment.body"></span>
    </div>
</template>

<script>
export default {
    props: {
        comment: {
            type: Object,
            required: true,
            default: () => {
                return {};
            }
        }
    }
}
</script>
