<template>
    <div>
        <SubHeader title="Edit Candy" />
        <Form @submit="editCandy" class="form">
            <div class="form-group mt-3">
                <label for="name">Name</label>
                <Field type="text" name="name" class="form-control" :class="{'is-invalid': !!errors.length }" :rules="required" v-model="candy.name" />
                <!-- <Field type="text" name="name" :rules="required" v-slot="{ field, errors }">
                    <input v-bind="field" type="text" class="form-control" :class="{'is-invalid': !!errors.length }" v-model="candy.name" />
                </Field> -->
                <ErrorMessage name="name" />
            </div>
            <div class="form-group mt-3">
                <label for="details">Details</label>
                <Field type="text" as="textarea" :rows="8" name="details" class="form-control" :rules="required" v-model="candy.details" />
                <!-- <Field type="text" name="details" :rules="required" v-slot="{ field, errors }">
                    <textarea v-bind="field" class="form-control" :class="{'is-invalid': !!errors.length }" v-model="candy.details" >{{candy.details}}</textarea>
                </Field> -->
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
    import { Form, Field, ErrorMessage } from 'vee-validate';

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

            const required = (value) => {
                if (!value) {
                    return 'This field is required';
                }
                return true;
            }

            return {
                errors, candy, required, editCandy
            }
        }
    }
</script>