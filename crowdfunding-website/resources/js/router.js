import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

//Define Route
const router = new Router ({
    mode : 'history',
    routes :[
        {
            path : '/',
            name : 'home',
            alias :'/home',
            component : ()=> import(/*webpackChunkName: "categories"*/'./views/Home.vue')
        },
        {
            path : '/donations',
            name : 'donations',
            component : ()=> import(/*webpackChunkName: "categories"*/'./views/Donations.vue')
        },
        {
            path : '/berita',
            name : 'berita',
            component : ()=> import(/*webpackChunkName: "categories"*/'./views/Berita.vue')
        },
        {
            path : '*',
            redirect : '/'
        }
    ]
});

export default router