require('./bootstrap');
require('./dataTablesb5');

import 'vuetify/styles' 
import { createApp } from 'vue';
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
const vuetify = createVuetify({
    components,
    directives,
    ssr: true,
  })

import 'vuetify/dist/vuetify.min.css' 
import App from './App.vue';

import router from './router';
import store from './store';

store.dispatch("getUser");

createApp({
    components: {
        'IndexComponent': App
    }
}).use(store).use(router).mount("#app")

// const app = createApp({
//     components: {
//         'IndexComponent': App,
//         Vuetify,
//     }
// }).use(store).use(router).mount("#app")

const app = createApp(App)
app.use(router)
app.use(store)
app.use(vuetify)
app.mount('#app')
require('./portal');
