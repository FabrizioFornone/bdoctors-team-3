import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./pages/Home.vue";
import Error from "./pages/Error.vue";
import Message from "./pages/Message.vue";
import Show from "./pages/infos/Show.vue";

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
                linkText: "Home",
            },
        },
        {
            path: "/message/:result",
            component: Message,
            name: "message.index",
            meta: {
                title: "Message",
                linkText: "Message"
            }
        },
        { path: "/results/:result", component: Show, name: "results.show",
            meta: {
                title: "Doctor's details",
            }
        },
        {
            path: "/not-found",
            alias: "*",
            component: Error,
            name: "error",
        },
    ],
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title;

    next();
});

export default router;
