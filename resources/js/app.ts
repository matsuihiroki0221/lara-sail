import { createApp } from 'vue';
import App from './App.vue';
import router from './router/index';
import Toast, { PluginOptions } from "vue-toastification";
import "vue-toastification/dist/index.css";
import Loading from './Loading.vue';
import store from './store';

import "bootstrap/dist/css/bootstrap.min.css"

const app = createApp(App);

const options: PluginOptions = {
    // You can set your default options here
};


app.use(router);
app.use(store)
app.use(Toast, options);
app.component('Loading',Loading);

app.mount('#app')