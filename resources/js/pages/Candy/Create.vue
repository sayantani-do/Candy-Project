<template>
    <div>
        <SubHeader title="Add Candy" />
        <Form @submit="saveCandy" class="form">
            <ul>
                <li v-for="(error, i) in errors" :key="i">{{error}}</li>
            </ul>
            <div class="form-group mt-3">
                <label for="name">Name</label>
                <Field type="text" name="name" class="form-control" rules="required" v-model="form.name" />
            </div>
            <div class="form-group mt-3">
                <label for="details">Details</label>
                <Field type="text" name="details" class="form-control" rules="required" v-model="form.details" />
            </div>
            <div class="form-group mt-3 float-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </Form>
    </div>
</template>

<script>
    import { Form, Field } from 'vee-validate';
    import { reactive, ref } from '@vue/reactivity';
    import SubHeader from '../../components/Layouts/SubHeader.vue';
    import useCandies from '../../composables/candies';

    export default {
        name: "CandyCreate",
        components: { SubHeader, Form, Field },
        setup(){

            const form = reactive({
                name: '',
                details: '',
            });

            const { errors, storeCandy } = useCandies();

            const saveCandy = async(values) => {
                console.log("submitted");
                console.log(values);
                // await storeCandy();
            }

            return {
                form, errors, saveCandy
            }
        }
    }
</script>