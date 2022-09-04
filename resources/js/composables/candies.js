import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

export default function useCandies(){

    const errors = ref('');
    const candies = ref([]);
    const candy = ref([]);
    const router = useRouter();

    const getCandies = async() => {
        let res = await axios.get('/api/candies');
        candies.value = res.data.data;
        console.log(candies.value);
    }

    const storeCandy = async(data) => {
        try {
            await axios.post('/api/candies/', data)
            await router.push({name: 'candies.index'})
        } catch (error) {
            if(error.response.status === 422){
                errors.value = error.response.data;
            }
        }
    }

    const getCandy = async(id) => {
        let res = await axios.get('/api/candies/'+id);
        candy.value = res.data.data;
    }

    const updateCandy = async(id) => {
        try {
            // console.log(candy);
            await axios.put('/api/candies/'+id, candy.value)
            await router.push({name: 'candies.index'})
        } catch (error) {
            if(error.response.status === 422){
                errors.value = error.response.data;
            }
        }
    }

    const destroyCandy = async(id) => {
        await axios.delete('/api/candies/'+id);
    }

    return {
        errors,
        candies,
        candy,
        getCandies,
        storeCandy,
        getCandy,
        updateCandy,
        destroyCandy
    }
}