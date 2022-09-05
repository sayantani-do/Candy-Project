<template>
    <div>
        <SubHeader title="Add Candy" />
        <Form @submit="saveCandy" class="form">
            <div class="form-group row mt-3">
                <div class="col-md-6">
                    <label for="name">Name</label>
                    <Field type="text" name="name" class="form-control" rules="required" v-model="form.name" />
                    <ErrorMessage name="name" />
                </div>
                <div class="col-md-6">
                    <label for="price">Price</label>
                    <Field type="number" name="price" class="form-control" rules="required|notZero" v-model="form.price" />
                    <ErrorMessage name="price" />
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="details">Details</label>
                <!-- <Field type="text" name="details" class="form-control" :rules="required" v-model="form.details" /> -->
                <Field type="text" as="textarea" :rows="8" name="details" class="form-control" rules="required" v-model="form.details" />
                <ErrorMessage name="details" />
            </div>
            <div class="form-group mt-3 float-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </Form>
    </div>
</template>

<script>
    import useCandies from '../../composables/candies';
    import SubHeader from '../../components/Layouts/SubHeader.vue';
    import { reactive, ref } from '@vue/reactivity';
    import { Form, Field, ErrorMessage, defineRule } from 'vee-validate';

    export default {
        name: "CandyCreate",
        components: { SubHeader, Form, Field, ErrorMessage },
        setup(){

            const form = reactive({
                name: '',
                price: '0.00',
                details: '',
            });

            const { errors, storeCandy } = useCandies();

            const saveCandy = async(values, actions) => {
                await storeCandy(form);
                await actions.setErrors(errors.value);
            }

            defineRule("required", (value) => {
                if (!value || !value.length) {
                    return "This field is required";
                }
                return true;
            });

            defineRule("notZero", (value) => {
                if (parseFloat(value) == 0.0) {
                    return 'Price cannot be zero';
                }
                return true;
            });

            return {
                form, errors, saveCandy
            }
        }
    }
</script>