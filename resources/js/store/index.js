import { createStore } from "vuex";

const store = createStore({
    state: {
        'menuActive': {
            'candies': false
        }
    },
    getters: {},
    mutations: {
        SET_MENU_ACTIVE(state, payload){
            console.log(payload);
            console.log(state.menuActive[payload.name])
            state.menuActive[payload.name] = payload.value
        }
    },
    actions: {
        set_menu_active({commit}, payload){
            commit('SET_MENU_ACTIVE', payload)
        }
    }
});

export default store