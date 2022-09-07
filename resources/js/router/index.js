// import { createRouter, createWebHistory } from vue-router;
import { createRouter, createWebHistory } from 'vue-router';
import CandyIndex from '../pages/Candy/Index';
import CandyCreate from '../pages/Candy/Create';
import CandyEdit from '../pages/Candy/Edit';
import Welcome from '../components/Layouts/Welcome.vue';
import CartIndex from '../pages/Cart/Index';
import store from '../store';


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
        path: '/candies/:id/edit',
        name: 'candies.edit',
        component: CandyEdit,
        props: true
    },
    {
        path: '/cart',
        name: 'cart.index',
        component: CartIndex
    },
    {
        path: "/",
        name: "app",
        component: Welcome
    },
];

var router = createRouter({
    history: createWebHistory(),
    routes
});


router.beforeEach((to, from, next) => {

    const menuActive = {
        'candies': ['candies.index', 'candies.create', 'candies.edit']
    }
    if(menuActive.candies.includes(to.name)){
        // store.state.menuActive.candies = true;
        var obj = { 'name': 'candies', value: true }
        store.dispatch('set_menu_active', obj);
    } else {
        // store.state.menuActive.candies = false;
        var obj = { 'name': 'candies', value: false }
        store.dispatch('set_menu_active', obj)
    }

    next();

});

export default router