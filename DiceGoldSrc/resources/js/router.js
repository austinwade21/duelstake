import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from "./views/Home";
import LogIn from "./components/Forms/LogIn";

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/login',
        name: 'LogIn',
        component: LogIn
    }
];

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
});

export default router;