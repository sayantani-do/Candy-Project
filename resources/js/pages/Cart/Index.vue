<template>
    <div class="list">
        <SubHeader title="My Cart" />
        <div v-if="items.length == 0">
            <p class="text-center text-secondary">Looks, empty in here</p>
        </div>
        <div class="card mb-2" v-for="(item, i) in items" :key="i">
            <div class="card-body d-flex justify-content-between">
                <div class="card-text">
                    <h5>{{item.name}}</h5>
                    <p class="font-italic">{{item.sku}}</p>
                    <p class="m-0">Price: ${{item.price}}</p>
                    <p class="font-weight-bold">Total: ${{ item.total = (parseFloat(item.price) * parseFloat(item.quantity)).toFixed(2) }}</p>
                </div>
                <div class="actions">
                    <div class="quantity mx-3 d-flex justify-content-end">
                        <button type="button" class="btn btn-outline-primary" @click="reduceItem(item.id)" :disabled="item.quantity == 1 || processing">-</button>
                        <input type="number" class="form-control d-inline-block w-25 mx-2" :value="item.quantity" readonly >
                        <button type="button" class="btn btn-outline-primary" @click="addItem(item.id)" >+</button>
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary text-white mx-3 float-end" @click="removeItem(item.id)" >Remove from Cart</button>
                </div>
            </div>
        </div>
        <div class="card mb-2">
            <div class="card-body d-flex justify-content-between">
                <div class="card-text">
                    <h5 class="font-weight-bold">TOTAL: </h5>
                </div>
                <div>${{totalPrice}}</div>
            </div>
        </div>
    </div>
</template>
<script>
    import useCart from '../../composables/cart';
    import SubHeader from '../../components/Layouts/SubHeader.vue';
    import { computed, onMounted } from '@vue/runtime-core';
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

            const totalPrice = computed(() => {
                return (items.value.reduce((sum, object) => { return sum + parseFloat(object.total); }, 0)).toFixed(2);
            });
            
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
                reduceItem,
                totalPrice
            }
        }
    }
</script>