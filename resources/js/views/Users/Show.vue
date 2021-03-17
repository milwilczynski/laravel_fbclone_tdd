<template>
    <div
        class="flex flex-col items-center"
        v-if="status.user === 'success' && user"
    >
        <div class="relative w-full mb-8">
            <div class="w-100 h-64 overflow-hidden z-10">
                <UploadableImage
                    image-width="1500"
                    image-height="300"
                    location="cover"
                    alt="user background image"
                    classes="object-cover w-full"
                    :user-image="user.data.attributes.cover_image"
                />
            </div>
            <div
                class="absolute flex items-center bottom-0 left-0 -mb-8 ml-12 z-20"
            >
                <div class="w-32">
                    <UploadableImage
                        image-width="750"
                        image-height="750"
                        location="profile"
                        alt="user profile image"
                        classes="bg-blue-200 object-cover w-32 h-32 border-4 border-gray-200 rounded-full shadow-lg"
                        :user-image="user.data.attributes.profile_image"
                    />
                </div>
                <p class="ml-4 text-2xl text-gray-100">
                    {{ user.data.attributes.name }}
                </p>
            </div>
            <div
                class="absolute flex items-center bottom-0 right-0 mb-4 ml-12 z-20"
            >
                <button
                    class="py-1 px-3 mr-2 bg-gray-400 rounded"
                    @click="
                        $store.dispatch(
                            'sendFriendRequest',
                            $route.params.userId
                        )
                    "
                    v-if="friendButtonText && friendButtonText !== 'Accept'"
                >
                    {{ friendButtonText }}
                </button>
                <button
                    class="py-1 px-3 mr-2 bg-blue-500 rounded"
                    @click="
                        $store.dispatch(
                            'acceptFriendRequest',
                            $route.params.userId
                        )
                    "
                    v-if="friendButtonText && friendButtonText === 'Accept'"
                >
                    Accept
                </button>
                <button
                    class="py-1 px-3 mr-2 bg-gray-400 rounded"
                    @click="
                        $store.dispatch(
                            'ignoreFriendRequest',
                            $route.params.userId
                        )
                    "
                    v-if="friendButtonText && friendButtonText === 'Accept'"
                >
                    Ignore
                </button>
            </div>
        </div>
        <img
            v-if="status.posts === 'loading'"
            src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/dae67631234507.564a1d230a290.gif"
        />

        <div v-else-if="posts.length < 1">
            There is no posts.
        </div>

        <Post
            v-else
            v-for="(post, postKey) in posts.data"
            :key="postKey"
            :post="post"
        />
    </div>
</template>

<script>
import Post from "./../../components/Post.vue";
import UploadableImage from "./../../components/UploadableImage";
import { mapGetters } from "vuex";

export default {
    name: "Show",
    components: {
        Post,
        UploadableImage
    },

    mounted() {
        this.$store.dispatch("fetchUser", this.$route.params.userId);
        this.$store.dispatch("fetchUserPosts", this.$route.params.userId);
    },

    computed: {
        ...mapGetters({
            user: "user",
            posts: "posts",
            status: "status",
            friendButtonText: "friendButtonText"
        })
    }
};
</script>

<style></style>
