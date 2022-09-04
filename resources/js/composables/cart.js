import { ref } from "vue";
import Swal from 'sweetalert2/dist/sweetalert2.js';

export default function useCart(){

    const items = ref([]);
    const processing = ref(false);

    const getItems = async() => {
        let res = await axios.get('/api/cart');
        items.value = res.data.data;
        console.log(items.value);
    }
    
    const addCart = async(data) => {
        try {
            await axios.post('/api/cart/', data)
            .then( res => {
                Swal.fire({
                    title: "Success",
                    text: res.data.message,
                    type: "success"
                });
                // var index = items.value.findIndex(item => {
                //     return item.candy_id === data.candy_id;
                // });
                // console.log("Cart: ");
                // console.log(items);
                // console.log("Data Id: "+data.candy_id)
                // console.group(index);
                // items.value[index].in_cart = 1;
            });
        } catch (error) {
            if(error.response.status === 422){
                errors.value = error.response.data;
            }
        }
    }

    const addQuantity = async(id) => {
        await axios.get('/api/cart/add-quantity/'+id)
        .then( res => {
            // console.log(res.data.data.quantity);
            var index = items.value.findIndex(item => {
                return item.id === id;
            });
            if(index != -1) items.value[index].quantity = res.data.data.quantity;
        });
    }

    const reduceQuantity = async(id) => {
        if(processing.value == false){
            processing.value = true;
            await axios.get('/api/cart/reduce-quantity/'+id)
            .then( res => {
                // console.log(res.data.data.quantity);
                var index = items.value.findIndex(item => {
                    return item.id === id;
                });
                if(index != -1) {
                    items.value[index].quantity = res.data.data.quantity;
                    processing.value = false;
                }
            })
            .catch( err => {
                console.log(err)
                processing.value = false;
            });
        }
    }

    const destroyCart = async(id) => {
        await axios.delete('/api/cart/'+id);
    }

    return {
        items,
        addCart,
        getItems,
        addQuantity,
        reduceQuantity,
        processing,
        destroyCart
    }

}