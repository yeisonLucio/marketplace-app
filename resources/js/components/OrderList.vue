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
                    <tr v-for="item in desserts" :key="item.name">
                        <td>{{ item.name }}</td>
                        <td>{{ item.calories }}</td>
                        <td>
                            <v-btn
                                variant="text"
                                size="small"
                                to="/order-summary/1"
                                color="primary"
                                >ver pedido</v-btn
                            >
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
            desserts: [
                {
                    name: "Frozen Yogurt",
                    calories: 159,
                },
                {
                    name: "Ice cream sandwich",
                    calories: 237,
                },
                {
                    name: "Eclair",
                    calories: 262,
                },
                {
                    name: "Cupcake",
                    calories: 305,
                },
                {
                    name: "Gingerbread",
                    calories: 356,
                },
                {
                    name: "Jelly bean",
                    calories: 375,
                },
                {
                    name: "Lollipop",
                    calories: 392,
                },
                {
                    name: "Honeycomb",
                    calories: 408,
                },
                {
                    name: "Donut",
                    calories: 452,
                },
                {
                    name: "KitKat",
                    calories: 518,
                },
            ],
        };
    },
};
</script>
