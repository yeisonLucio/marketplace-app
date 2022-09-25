<template>
    <div>
        <v-app-bar color="primary" app clipped-left>
            <v-spacer class="hidden-md-and-up"></v-spacer>
            <v-toolbar-title> Marketplace </v-toolbar-title>
            <v-spacer class="hidden-md-and-up"></v-spacer>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn
                    small
                    v-for="(item, i) in items"
                    :key="i"
                    :to="item.path"
                    >{{ item.text }}</v-btn
                >
            </v-toolbar-items>
        </v-app-bar>
    </div>
</template>
<script>
export default {
    data() {
        return {
            items: [
                { text: "HOME", icon: "mdi-home", path: "/" },
                { text: "ORDERS", icon: "mdi-account-plus", path: "/orders" },
            ],
        };
    },
};
</script>
