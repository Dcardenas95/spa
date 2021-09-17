import Vue from "vue";
import VueRouter from "vue-router";



const Cliente = () => import("../views/ClienteView.vue");
const JUMBO = () => import("../views/JumboView.vue");


Vue.use(VueRouter);

const routes = [
{
    path: "/",
    name: "home",
    component: JUMBO,
    // meta: {
    //     requiresAuth:true,
    // }
},

{
    path: "/clientes",
    name: "clientes",
    component: Cliente
},




];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes
});


export default router;
