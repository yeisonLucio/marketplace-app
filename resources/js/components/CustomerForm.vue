<template>
    <div>
        <div class="text-h5 my-3">Ingresa tus datos</div>
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-text-field
                v-model="customer.name"
                :counter="80"
                :rules="nameRules"
                label="Nombre"
                color="primary"
                required
                density="compact"
                variant="outlined"
                class="my-3"
            ></v-text-field>
            <v-text-field
                v-model="customer.email"
                :counter="120"
                :rules="emailRules"
                label="Correo electrónico"
                color="primary"
                required
                density="compact"
                variant="outlined"
                class="my-3"
            ></v-text-field>
            <v-text-field
                v-model="customer.mobile"
                :counter="40"
                :rules="phoneRules"
                label="Numero de teléfono"
                color="primary"
                required
                density="compact"
                variant="outlined"
                class="my-3"
            ></v-text-field>
            <v-btn color="primary" block @click="createOrder">
                <v-icon start icon="mdi-checkbox-marked-circle-plus-outline" />
                Crear pedido
            </v-btn>
        </v-form>
    </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
    data() {
        return {
            customer: {
                name: "",
                email: "",
                mobile: "",
            },
            valid: true,
            nameRules: [
                (v) => !!v || "El nombre es requerido",
                (v) => (v && v.length <= 80) || "El nombre debe ser menor de 80 caracteres",
            ],
            emailRules: [
                (v) =>(v && v.length <= 80) || "El email debe ser menor de 120 caracteres",
                (v) => !!v || "El E-mail es requerido",
                (v) => /.+@.+\..+/.test(v) || "El E-mail no es valido",
            ],
            phoneRules: [
                (v) =>(v && v.length <= 40) || "El email debe ser menor de 40 caracteres",
                (v) => !!v || "El teléfono es requerido"
            ],
        };
    },
    computed: {
        ...mapGetters({
            product: "getProduct",
        }),
    },
    methods: {
        async createOrder() {
            try {
                let order = {
                    product: this.product,
                    customer: this.customer,
                };
    
                let result = await this.$http.post("/v1.0/orders/buy-product", {
                    ...order,
                });

                this.$router.push({
                    name: 'orderSummary',
                    params: {
                        id: result.data.data.id
                    }
                })

            } catch (error) {
                console.log(error);
            }
            

        },
    },
};
</script>
