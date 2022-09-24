import { createStore } from "vuex";

const store = createStore({
    state() {
        return {
            product: {
                reference: "",
                description: "",
                amount: "",
            },
        };
    },
    mutations: {
        setProduct(state, product) {
            state.product = product;
        },
    },
    getters: {
        getProduct(state) {
            return state.product;
        },
    },
});

export default store;
