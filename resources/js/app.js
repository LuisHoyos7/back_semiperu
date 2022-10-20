require('./bootstrap');
require('./dataTablesb5');

import { createApp } from 'vue';
import Vuetify from 'vuetify'

// Vue.use(Vuetify)

import 'vuetify/dist/vuetify.min.css' 
import App from './App.vue';

import router from './router';
import store from './store';


// const app = createApp({
//     components: {
//         'IndexComponent': App,
//         Vuetify,
//     }
// }).use(store).use(router).mount("#app")

const app = createApp(App)
app.use(router)
app.use(store)
app.use(Vuetify)
app.mount('#app')
require('./portal');
