<template>
   <div>
        <v-row justify="center">
            <v-sheet
                elevation="1"
                class="px-5 py-5 mt-4"
                width="800"
            >
                <order-summary></order-summary>
                <!-- <v-btn color="primary" block>
                    <v-icon start icon="mdi-open-in-new" />
                    Ir a pagar
                </v-btn> -->
            </v-sheet>
        </v-row>
    </div>
</template>
<script>
import OrderSummary from "../components/OrderSummary.vue";
export default {
    props: {
        id: String
    },
    components: {
        "order-summary": OrderSummary,
    },
    data() {
        return {
            order: {}
        };
    },
    mounted(){
        this.order()
    },
    methods: {
        async getOrder(){
           let result = await this.$axios.get('/orders/get-order-summary/'+this.id);
           console.log(result);

        }
    }
};
</script>
