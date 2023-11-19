import vueRouter from "vue-router"
import Vue from "vue"

Vue.use(vueRouter)

import Registration from "./views/Registration";
import Login from "./views/Login";

const routes = [
    {
        path: "/log",
        component: Login,
    },
    {
        path: "/registration",
        component: Registration,
    }
];

export default new vueRouter({
    history: 'history',
    routes
})
