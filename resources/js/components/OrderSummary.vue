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
                        <v-col cols="9"> Yeison Lucio </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="3">
                            <div>Correo electrónico:</div>
                        </v-col>
                        <v-col cols="9">
                            <div>yeisonlucio@gmail.com</div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="3">
                            <div>Teléfono</div>
                        </v-col>
                        <v-col cols="9">
                            <div>3002543866</div>
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
                            <div>1</div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="3">
                            <div>Descripción del producto:</div>
                        </v-col>
                        <v-col cols="9">
                            <div>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit
                            </div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="3">
                            <div>Total:</div>
                        </v-col>
                        <v-col cols="9">
                            <div>$40.000</div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="3">
                            <div>Estado:</div>
                        </v-col>
                        <v-col cols="9">
                            <div>Pendiente</div>
                        </v-col>
                    </v-row>
                </div>
                <v-row>
                    <v-col cols="12">
                        <v-btn color="primary" block>
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
        id: {
            type: String,
        },
    },
    data() {
        return {
            order: {},
        };
    },
    mounted() {
        this.order()
    },
    methods: {
        async getOrder() {
            let result = await this.$axios.get(
                "/orders/get-order-summary/" + this.id
            );
            console.log(result);
        },
    },
};
</script>
