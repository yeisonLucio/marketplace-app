<template>
    <div>
        <product-list></product-list>
    </div>
</template>

<script>
import ProductList from "../components/ProductList.vue";

export default {
    components: {
        "product-list": ProductList,
    },
    data() {
        return {};
    },
};
</script>
