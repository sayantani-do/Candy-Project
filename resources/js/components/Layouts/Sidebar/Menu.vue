<template>
    <li class="row text-center mt-2">
        <!-- <span class="h4">{{menu.name}}</span> -->
        <router-link :to="{path: menu.path}" exact-active-class="active" ><span class="h5">{{menu.name}}</span></router-link>
    </li>
</template>

<script>
export default {
    name:'menuItem',
    props:{menu:Object},
}
</script>