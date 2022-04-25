import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./pages/Home.vue";
import Error from "./pages/Error.vue";
import AdvancedSearch from "./pages/AdvancedSearch.vue";
import Message from "./pages/Message.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",

    routes: [
        { 
            path: "/", 
            component: Home, 
            name: "home.index",
            meta: {
                title: "Homepage",
                linkText: "Home"
            }
        },
        {
            path: "/search",
            component: AdvancedSearch,
            name: "Search.index",
            meta: {
                title: "Advanced Search",
                linkText: "Search"
            }
        },
        {
            path: "/message",
            component: Message,
            name: "message.index",
            meta: {
                title: "Message",
                linkText: "Message"
            }
        },
        {
            path: "/not-found",
            alias: "*", 
            component: Error, 
            name: "error"
        }
    ]
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title;

    next();
});

export default router;