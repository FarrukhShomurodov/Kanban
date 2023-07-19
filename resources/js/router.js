import vueRouter from "vue-router"
import Vue from "vue"

Vue.use(vueRouter)

import Registr from "./views/Registr";
import Login from "./views/Login";

const routes = [
    {
        path: "/login",
        component: Login,
    },
    {
        path: "/registration",
        component: Registr,
    }
];

export default new vueRouter({
    history: 'history',
    routes
})
