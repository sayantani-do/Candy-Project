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
                            <th scope="col">Details</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(candy, i) in candies" :key="i+1">
                            <th scope="row">{{i+1}}</th>
                            <td>{{candy.name}}</td>
                            <td>{{candy.details}}</td>
                            <td>
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
    import SubHeader from '../../components/Layouts/SubHeader.vue';
    import Swal from 'sweetalert2/dist/sweetalert2.js';
    import common from '../../common';

    export default {
        name:'CandyIndex',
        components: {
            SubHeader
        },
        setup () {
            const { candies, getCandy, destroyCandy } = useCandies();

            onMounted(getCandy);

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
                        await getCandy();
                    }
                });
                
            }

            return {
                candies,
                deleteCandy
            }
        }
    }
</script>