<template>
    <li class="nav-item text-center overflow-hidden my-2">
        <!-- <span class="h4">{{menu.name}}</span> -->
        <router-link :to="{path: menu.path}" :class="{'active' : $store.state.menuActive.candies }" class="row sidebar-link"><span class="h5">{{menu.name}}</span></router-link>
    </li>
</template>

<script>
export default {
    name:'menuItem',
    props:{menu:Object}
}
</script>