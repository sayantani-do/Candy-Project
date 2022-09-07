<template>
    <div class="header-nav">
        <div class="h-100 d-table float-end">
            <router-link :to="{name: 'cart.index'}" title="My Cart" class="text-decoration-none d-table-cell align-middle">
                <fa icon="fa-solid fa-cart-shopping" size="2x" color="white" />
            </router-link>
        </div>
    </div>
</template>