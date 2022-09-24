<template>
    <div>
        <v-card>
            <v-table>
                <thead>
                    <tr>
                        <th class="text-left">ID</th>
                        <th class="text-left">Cliente</th>
                        <th>Email</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in orders" :key="item.name">
                        <td>{{ item.id }}</td>
                        <td>{{ item.customerName }}</td>
                        <td>{{ item.customerEmail }}</td>
                        <td>{{ item.total }}</td>
                        <td>{{ item.status }}</td>
                        <td>
                            <v-btn
                                variant="text"
                                size="small"
                                :to="{
                                    name: 'orderSummary',
                                    params: { id: item.id },
                                }"
                                color="primary"
                            >
                                ver pedido
                            </v-btn>
                        </td>
                    </tr>
                </tbody>
            </v-table>
        </v-card>
    </div>
</template>
<script>
export default {
    data() {
        return {
            orders: [],
        };
    },
    mounted() {
        this.getOrders();
    },
    methods: {
        async getOrders() {
            try {
                let result = await this.$http.get("/v1.0/orders/get-all-orders");
                this.orders = result.data.data;
            } catch (error) {
                console.log(error);
            }
        },
    },
};
</script>
