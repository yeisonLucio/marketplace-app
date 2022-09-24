<template>
    <v-app>
        <nav-bar></nav-bar>
        <v-main>
            <v-container>
                <router-view></router-view>
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
import NavBar from './components/NavBar.vue'
export default {
    components: {
        'nav-bar': NavBar
    },
    data() {
        return {
            
        }
    },
}
</script>