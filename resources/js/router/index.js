// import { createRouter, createWebHistory } from vue-router;
import { createRouter, createWebHistory } from 'vue-router';
import CandyIndex from '../pages/Candy/Index';
import CandyCreate from '../pages/Candy/Create';
// import App from '../components/Layouts/App.vue';

const routes = [
    // {
    //     path: "/",
    //     name: "app",
    //     component: App
    // },
    {
        path: '/',
        name: 'candies.index',
        component: CandyIndex
    },
    {
        path: '/candies/add',
        name: 'candies.create',
        component: CandyCreate
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})