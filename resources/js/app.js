require('./bootstrap');
require('./dataTablesb5');

import { createApp } from 'vue';
import App from './App.vue';

import router from './router';
import store from './store';

store.dispatch("getUser");

createApp({
    components: {
        'IndexComponent': App
    }
}).use(store).use(router).mount("#app")

require('./portal');
