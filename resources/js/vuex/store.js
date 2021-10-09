import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        cart: []
    },
    mutations: {
        PUSH_TO_CART: (state, product) => {
            let isProductExists = false;
            if (state.cart.length) {
                // state.cart.map(function (item) {
                //     if (item.id === product.id) {
                //     isProductExists = true;
                //     item.quantity++
                //     }
                // })
                if (!isProductExists) {
                    const cloneProduct = JSON.parse(JSON.stringify(product));
                    state.cart.push(cloneProduct);
                }
            } else {
                const cloneProduct = JSON.parse(JSON.stringify(product));
                state.cart.push(cloneProduct);
            }


            
        },
        REMOVE_FROM_CART: (state, index) => {
            state.cart.splice(index, 1);
            
        },
        INCREMENT: (state, index) => {
            state.cart[index].quantity++
        },
        DECREMENT: (state, index) => {
            if (state.cart[index].quantity > 1) {
                state.cart[index].quantity--
            }
        }
    },
    actions: {
        ADD_TO_CART({commit}, data){
            commit('PUSH_TO_CART', data);
        },
        DELETE_FROM_CART({commit}, index){
            commit('REMOVE_FROM_CART', index);
        },
        INCREMENT_CART_ITEM({commit}, index) {
            commit('INCREMENT', index);
        },
        DECREMENT_CART_ITEM({commit}, index) {
            commit('DECREMENT', index);
        }
    },
    getters: {
        CART(state){
            return state.cart;
        } 
    },
});

export default store;