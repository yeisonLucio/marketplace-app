import { createStore } from "vuex";

const store = createStore({
    state() {
        return {
            product: {
                reference: "",
                description: "",
                amount: "",
            },
            order: {
                id: "",
                customerName: "",
                customerEmail: "",
                customerMobile: "",
                productReference: "",
                productDescription: "",
                total: "",
                status: "",
                processUrl: "",
            },
        };
    },
    mutations: {
        setProduct(state, product) {
            state.product = product;
        },
        setOrder(state, order) {
            state.order = order;
        },
    },
    getters: {
        getOrder(state) {
            return state.order;
        },
        getProduct(state) {
            return state.product;
        },
    },
});

export default store;
