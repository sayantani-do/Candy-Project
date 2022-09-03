import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

export default function useCandies(){

    const errors = ref('');
    const candies = ref([]);
    const router = useRouter();

    const getCandy = async() => {
        let res = await axios.get('/api/candies');
        candies.value = res.data.data;
        console.log(candies.value);
    }

    const storeCandy = async(data) => {
        await axios.post('/api/candies/', data);
        await router.push({name: 'candies.index'})
    }

    const destroyCandy = async(id) => {
        await axios.delete('/api/candies/'+id);
    }

    return {
        errors,
        candies,
        getCandy,
        storeCandy,
        destroyCandy
    }
}