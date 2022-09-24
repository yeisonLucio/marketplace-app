<template>
    <div>
        <v-card max-width="300" v-for="(product, key) in products">
            <v-img
                class="align-end text-white"
                height="200"
                src="https://picsum.photos/500/500"
                cover
            >
                <v-card-title>{{ product.reference }}</v-card-title>
            </v-img>

            <v-card-subtitle class="mt-2"
                >$ {{ product.amount }}</v-card-subtitle
            >
            <v-card-text>
                <div>
                    {{ product.description }}
                </div>
            </v-card-text>
            <v-card-actions>
                <v-btn
                    class="ma-2"
                    color="primary"
                    @click="buyProduct(product)"
                >
                    <v-icon start icon="mdi-basket-plus-outline" />
                    Comprar
                </v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: [
                {
                    reference: "ref-001",
                    description:
                        "Lorem ipsum dolor sit amet consectetur adipisicing elit",
                    amount: "30.000",
                },
            ],
        };
    },
    methods: {
        buyProduct(product) {
            this.$store.commit("setProduct", product);
            this.$router.push({ name: "checkout" });
        },
    },
};
</script>
