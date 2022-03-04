// questo file contiene le regole delle rotte

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// lasta componenti
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import Alert from './pages/Alert.vue';
import DetailsPost from './pages/DetailsPost.vue';
// end lista componenti

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/about",
            name: "about",
            component: About
        },
        {
            path: "/blog",
            name: "blog",
            component: Blog
        },
        {
            path: "/blog/:slug",
            name: "post-details",
            component: DetailsPost
        },
        {
            path: "/*",
            name: "Alert",
            component: Alert
        },
    ]
});

export default router;