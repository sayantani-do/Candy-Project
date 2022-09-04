<template>
    <li class="nav-item text-center overflow-hidden mt-2">
        <!-- <span class="h4">{{menu.name}}</span> -->
        <router-link :to="{path: menu.path}" exact-active-class="active" class="row sidebar-link"><span class="h5">{{menu.name}}</span></router-link>
    </li>
</template>

<script>
export default {
    name:'menuItem',
    props:{menu:Object},
}
</script>