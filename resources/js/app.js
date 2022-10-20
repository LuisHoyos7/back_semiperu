require('./bootstrap');
require('./dataTablesb5');

import { createApp } from 'vue';
import VueNextSelect from 'vue-next-select'

import App from './App.vue';

import router from './router';
import store from './store';


const app = createApp({
    components: {
        'IndexComponent': App,
    }
}).use(store).use(router).mount("#app")

require('./portal');
