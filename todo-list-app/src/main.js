import { createApp } from 'vue'
import store from './store/index'
import router from './router'
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css'
require('@/assets/main.css')
import App from './App.vue'

createApp(App).use(router).use(store).mount('#app')
