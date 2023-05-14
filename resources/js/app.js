import "./bootstrap";
import "vuetify/styles";
import { createApp } from "vue";
import router from "./router/index";
import App from "./App.vue";
import { loadFonts } from "./plugins/webfontloader";
import vuetify from "./plugins/vuetify";

import store from "./store/store";
import axios from "axios";

loadFonts();

const app = createApp(App);

const axiosInstance = axios.create({
    baseURL: 'http://localhost:8086/api'
})

app.config.globalProperties.$http = { ...axiosInstance }
app.use(vuetify);
app.use(router);
app.use(store)

app.mount("#app");
