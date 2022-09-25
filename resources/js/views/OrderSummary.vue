<template>
    <div>
        <v-row justify="center">
            <v-sheet elevation="1" class="px-5 py-5 mt-4" width="800">
                <order-summary :orderId="orderId"></order-summary>
            </v-sheet>
        </v-row>
    </div>
</template>
<script>
import OrderSummary from "../components/OrderSummary.vue";
export default {
    components: {
        "order-summary": OrderSummary,
    },
    data() {
        return {
            orderId: this.$route.params.id,
        };
    },
};
</script>
