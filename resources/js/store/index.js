import Vue from "vue";
import Vuex from "vuex";
import User from "./Modules/user";
import Title from "./Modules/title";
import Profile from "./Modules/profile";
import Post from "./Modules/post";
Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        User,
        Title,
        Profile,
        Post
    }
});
