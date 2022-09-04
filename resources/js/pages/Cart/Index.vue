<template>
    <div class="list">
        <SubHeader title="My Cart" />
        <div v-if="items.length == 0">
            <p class="text-center text-secondary">Looks, empty in here</p>
        </div>
        <div class="card mb-2" v-for="(item, i) in items" :key="i">
            <div class="card-body d-flex justify-content-between">
                <div class="card-text">{{item.name}}</div>
                <div class="actions d-flex">
                    <div class="quantity mx-3 d-flex justify-content-end">
                        <button type="button" class="btn btn-outline-primary" @click="reduceItem(item.id)" :disabled="item.quantity == 1 || processing">-</button>
                        <input type="number" class="form-control d-inline-block w-25 mx-2" :value="item.quantity" readonly >
                        <button type="button" class="btn btn-outline-primary" @click="addItem(item.id)" >+</button>
                    </div>
                    <button type="button" class="btn btn-primary" @click="removeItem(item.id)" >Remove from Cart</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import useCart from '../../composables/cart';
    import SubHeader from '../../components/Layouts/SubHeader.vue';
    import { onMounted } from '@vue/runtime-core';
    import Swal from 'sweetalert2/dist/sweetalert2.js';
    import common from '../../common';

    export default {
        name:'CartIndex',
        components: {
            SubHeader
        },
        setup(){

            const { items, getItems, addQuantity, reduceQuantity, processing, destroyCart } = useCart();

            onMounted(getItems);

            const addItem = async(id) => {
                await addQuantity(id);
            }

            const reduceItem = async(id) => {
                await reduceQuantity(id);
            }

            const removeItem = async(id) => {
                await Swal.fire({
                    title: "Remove this item?",
                    text: "Are you sure? You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: common.primary,
                    confirmButtonText: "Yes, Remove it!"
                }).then(async(confirmed) => {
                    if (confirmed.value) {
                        await destroyCart(id);
                        await getItems();
                    }
                });
            }

            return {
                items,
                removeItem,
                addItem,
                reduceItem
            }
        }
    }
</script>