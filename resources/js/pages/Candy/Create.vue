<template>
    <div>
        <SubHeader title="Add Candy" />
        <form @submit.prevent="saveCandy" class="form">
            <ul>
                <li v-for="(error, i) in errors" :key="i">{{error}}</li>
            </ul>
            <div class="form-group mt-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" v-model="form.name" />
            </div>
            <div class="form-group mt-3">
                <label for="details">Details</label>
                <input type="text" name="details" class="form-control" v-model="form.details" />
            </div>
            <div class="form-group mt-3 float-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
    import { reactive, ref } from '@vue/reactivity';
    import SubHeader from '../../components/Layouts/SubHeader.vue';
    import useCandies from '../../composables/candies';

    export default {
        name: "CandyCreate",
        components: { SubHeader },
        setup(){

            const form = reactive({
                name: '',
                details: '',
            });

            const { errors, storeCandy } = useCandies();

            const saveCandy = async() => {
                await storeCandy();
            }

            return {
                form, errors, saveCandy
            }
        }
    }
</script>