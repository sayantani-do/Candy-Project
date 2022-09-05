<template>
    <div>
        <SubHeader title="Edit Candy" />
        <Form @submit="editCandy" class="form">
            <div class="form-group row mt-3">
                <div class="col-md-6">
                    <label for="name">Name</label>
                    <Field type="text" name="name" class="form-control" :class="{'is-invalid': !!errors.length }" rules="required" v-model="candy.name" />
                    <ErrorMessage name="name" />
                </div>
                <div class="col-md-6">
                    <label for="price">Price</label>
                    <Field type="number" name="price" class="form-control" :class="{'is-invalid': !!errors.length }" rules="required|notZero" v-model="candy.price" />
                    <ErrorMessage name="price" />
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="details">Details</label>
                <Field type="text" as="textarea" :rows="8" name="details" class="form-control" rules="required" v-model="candy.details" />
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
    import { onMounted } from '@vue/runtime-core';
    import { Form, Field, ErrorMessage, defineRule } from 'vee-validate';

    export default {
        name: "CandyCreate",
        components: { SubHeader, Form, Field, ErrorMessage },
        props: {
            id: {
                required: true,
                type: String
            }
        },
        setup(props){

            const { errors, candy, getCandy, updateCandy } = useCandies();

            onMounted(getCandy(props.id));

            const editCandy = async(values, actions) => {
                await updateCandy(props.id);
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
                errors, candy, editCandy
            }
        }
    }
</script>