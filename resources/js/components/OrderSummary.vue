<template>
    <div>
        <v-card flat>
            <v-card-title>Resumen de tu pedido</v-card-title>
            <v-card-text>
                <div class="mb-2">
                    <div class="text-medium-emphasis">
                        Información comprador
                    </div>
                    <v-divider></v-divider>
                </div>
                <div class="ml-4">
                    <v-row>
                        <v-col cols="3">
                            <div>Nombre:</div>
                        </v-col>
                        <v-col cols="9"> {{ order.customerName }}</v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="3">
                            <div>Correo electrónico:</div>
                        </v-col>
                        <v-col cols="9">
                            <div>{{ order.customerEmail }}</div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="3">
                            <div>Teléfono</div>
                        </v-col>
                        <v-col cols="9">
                            <div>{{ order.customerMobile }}</div>
                        </v-col>
                    </v-row>
                </div>
                <div class="mt-5 mb-2">
                    <div class="text-medium-emphasis">
                        Información comprador
                    </div>
                    <v-divider></v-divider>
                </div>
                <div class="ml-4">
                    <v-row>
                        <v-col cols="3">
                            <div>Identificador del pedido:</div>
                        </v-col>
                        <v-col cols="9">
                            <div>{{ order.id }}</div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="3">
                            <div>Descripción del producto:</div>
                        </v-col>
                        <v-col cols="9">
                            <div>{{ order.productDescription }}</div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="3">
                            <div>Total:</div>
                        </v-col>
                        <v-col cols="9">
                            <div>$ {{ order.total }}</div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="3">
                            <div>Estado:</div>
                        </v-col>
                        <v-col cols="9">
                            <div :class="getColor(order.status)">{{ order.status }}</div>
                        </v-col>
                    </v-row>
                </div>
                <v-row>
                    <v-col cols="12">
                        <v-btn
                            color="primary"
                            block
                            v-if="showButtonPay"
                            @click="payOrder"
                        >
                            <v-icon start icon="mdi-open-in-new" />
                            Ir a pagar
                        </v-btn>
                    </v-col>
                </v-row>
            </v-card-text>
        </v-card>
    </div>
</template>
<script>
export default {
    props: {
        orderId: {
            type: String,
        },
    },
    data() {
        return {
            order: {},
        };
    },
    mounted() {
        this.getOrder();
    },
    computed: {
        showButtonPay() {
            let payed = this.order.status == "payed";

            if (payed || this.hasTransaction) {
                return false;
            }

            return true;
        },
        hasTransaction(){
            return this.order.requestId != "" && this.order.status == "created";
        }
    },
    methods: {
        async getOrder() {
            try {
                let result = await this.$http.get(
                    "/v1.0/orders/get-order-summary/" + this.orderId
                );

                this.order = result.data.data;
                if (this.hasTransaction) {
                    setTimeout(() => {
                        this.getOrder()
                    }, 10000)
                }
            } catch (error) {
                console.log(error);
            }
        },
        async payOrder() {
            let result = await this.$http.post("/v1.0/orders/pay-order", {
                orderId: this.order.id,
            });

            console.log(result);
            window.open(result.data.data.processUrl, "_blank").focus();
            location.reload();
        },
        getColor(status){
            if (status == 'created'){
                return 'orange'
            }
            if (status == 'payed'){
                return 'green'
            }

            return 'red'
        }
    },
};
</script>
<style>
    .orange{
        color: orange;
        font-weight: bold;
    }
    .green {
        color: green;
        font-weight: bold;
    }
    .red{
        color: red;
        font-weight: bold;
    }
</style>
