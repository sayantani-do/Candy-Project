// import { createRouter, createWebHistory } from vue-router;
import { createRouter, createWebHistory } from 'vue-router';
import CandyIndex from '../pages/Candy/Index';
import CandyCreate from '../pages/Candy/Create';
import App from '../components/Layouts/App.vue';

const routes = [
    {
        path: '/candies',
        name: 'candies.index',
        component: CandyIndex
    },
    {
        path: '/candies/add',
        name: 'candies.create',
        component: CandyCreate
    },
    {
        path: "/",
        name: "app",
        component: App
    },
];

var router = createRouter({
    history: createWebHistory(),
    routes
});


router.beforeEach((to, from, next) => {
    // document.title = `${to.meta.title} - ${process.env.MIX_APP_NAME}`;
    next();
});

export default router