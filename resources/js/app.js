require('./bootstrap');

import { createApp } from 'vue'
import App from './components/Layouts/App.vue';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faCartShopping, faPlus, faCartPlus, faPenToSquare, faTrash } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import router from './router';
import store from './store';

library.add(faCartShopping, faPlus, faCartPlus, faPenToSquare, faTrash);

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';


const app = createApp(App);

app.use(store)
app.use(router)
app.use(VueSweetalert2)
app.component('fa', FontAwesomeIcon)
app.mount('#app')

