import { createRouter, createWebHashHistory } from "vue-router";
import Home from "../views/Home.vue";
import Orders from "../views/Orders.vue";
import Checkout from "../views/Checkout.vue";
import OrderSummary from "../views/OrderSummary.vue";

const routes = [
    { path: "/", component: Home, name: "home" },
    { path: "/orders", component: Orders },
    { path: "/checkout", component: Checkout, name: "checkout" },
    { path: "/order-summary/:id", component: OrderSummary },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;
