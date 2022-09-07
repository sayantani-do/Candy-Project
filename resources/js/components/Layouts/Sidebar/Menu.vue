<template>
    <li class="nav-item text-center overflow-hidden my-2">
        <!-- <span class="h4">{{menu.name}}</span> -->
        <router-link :to="{path: menu.path}" exact-active-class="active" class="row sidebar-link"><span class="h5">{{menu.name}}</span></router-link>
    </li>
</template>

<script>
import { useRouter } from 'vue-router';
export default {
    name:'menuItem',
    props:{menu:Object},
    setup() {
        const candyMenuActive = ['candies.index', 'candies.add', 'candies.edit'];
        const router = useRouter();
        console.log(router.currentRoute.value);
    }
}
</script>