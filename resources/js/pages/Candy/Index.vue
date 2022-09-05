<template>
    <div class="list">
        <SubHeader title="Candies">
            <router-link class="btn btn-primary" :to="{name: 'candies.create'}">Add Candy</router-link>
        </SubHeader>
        <div class="card">
            <div class="card-body">
                <!-- <h5 class="card-title">Candies</h5> -->
                <table class="table">
                    <thead>
                        <tr >
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Sku</th>
                            <th scope="col">Price</th>
                            <th scope="col">Details</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(candy, i) in candies" :key="i+1">
                            <th scope="row">{{i+1}}</th>
                            <td>{{candy.name}}</td>
                            <td>{{candy.sku}}</td>
                            <td>${{candy.price}}</td>
                            <td>{{candy.details.substring(0,27)+'...'}}</td>
                            <td>
                                <button type="button" class="btn btn-success" v-if="candy.in_cart == 0" @click="addToCart(candy.id)" >Add To Cart</button>
                                <router-link :to="{ name: 'candies.edit', params: { id: candy.id } }" class="btn btn-primary mx-1" >Edit</router-link>
                                <button type="button" class="btn btn-info" @click="deleteCandy(candy.id)" >Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import { onMounted } from '@vue/runtime-core';
    import useCandies from '../../composables/candies';
    import useCart from '../../composables/cart';
    import SubHeader from '../../components/Layouts/SubHeader.vue';
    import Swal from 'sweetalert2/dist/sweetalert2.js';
    import common from '../../common';

    export default {
        name:'CandyIndex',
        components: {
            SubHeader
        },
        setup () {
            const { candies, getCandies, destroyCandy } = useCandies();
            const { items, getItems, addCart, processing } = useCart();

            onMounted(getCandies);

            // const onMountcallFun = () => {
            //     getItems();
            //     getCandies();
            // }

            const addToCart = async(id) => {
                if(!processing.value){
                    // console.log(processing.value);
                    processing.value = true;
                    var data = {
                        'candy_id': id,
                        'quantity': 1
                    }
                    await addCart(data);
                    await getCandies();
                    await processing.value == false;
                    
                }
            }

            const deleteCandy = async(id) => {
                await Swal.fire({
                    title: "Delete this candy?",
                    text: "Are you sure? You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: common.primary,
                    confirmButtonText: "Yes, Delete it!"
                }).then(async(confirmed) => {
                    if (confirmed.value) {
                        await destroyCandy(id);
                        await getCandies();
                    }
                });                
            }

            return {
                items,
                candies,
                addToCart,
                deleteCandy
            }
        }
    }
</script>