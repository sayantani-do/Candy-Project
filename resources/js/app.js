require('./bootstrap');

import { createApp } from 'vue'
import App from './components/Layouts/App.vue';
import router from './router';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';


const app = createApp(App);

app.use(router)
app.use(VueSweetalert2)
app.mount('#app')

