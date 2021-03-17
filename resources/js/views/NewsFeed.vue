<template>
    <div class="flex flex-col items-center py-4">
        <NewPost />

        <img
            v-if="newsStatus.newsPostsStatus === 'loading'"
            src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/dae67631234507.564a1d230a290.gif"
        />
        <Post
            v-else
            v-for="(post, postKey) in posts.data"
            :key="postKey"
            :post="post"
        />
    </div>
</template>
<script>
import NewPost from "../components/NewPost";
import Post from "../components/Post";
import { mapGetters } from "vuex";

export default {
    name: "NewsFeed",
    components: {
        NewPost,
        Post
    },

    mounted() {
        this.$store.dispatch("fetchNewsPosts");
    },

    computed: {
        ...mapGetters({
            posts: "posts",
            newsStatus: "newsStatus"
        })
    }
};
</script>
<style scoped></style>
