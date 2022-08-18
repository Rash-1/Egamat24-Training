import { createApp } from 'vue';
import router from "./router/index.js";
import './style.css';
import App from './App.vue';
import '@popperjs/core';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';


createApp(App)
    .use(router)
    .mount('#app');
