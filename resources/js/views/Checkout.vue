<template>
    <div>
        <v-row justify="center">
            <v-sheet
                elevation="1"
                class="px-5 py-5 mt-4"
                :width="showSummary ? 800 : 450"
            >
                <v-row>
                    <v-col cols="12" v-if="!showSummary">
                        <customer-form
                            v-model:showSummary="showSummary"
                        ></customer-form>
                    </v-col>
                    <v-col cols="12" v-if="showSummary">
                        <order-summary></order-summary>
                    </v-col>
                </v-row>
            </v-sheet>
        </v-row>
    </div>
</template>
<script>
import CustomerForm from "../components/CustomerForm.vue";
import OrderSummary from "../components/OrderSummary.vue";

export default {
    components: {
        "customer-form": CustomerForm,
        "order-summary": OrderSummary,
    },
    data() {
        return {
            tab: "information",
            showSummary: false,
            product: {},
        };
    },
    mounted() {
        this.product = this.$store.state.product;
    },
    methods: {},
};
</script>
