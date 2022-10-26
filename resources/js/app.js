require('./bootstrap');
require('./dataTablesb5');

// import 'vuetify/styles' 
import { createApp } from 'vue';
// import { createVuetify } from 'vuetify'
import 'primevue/resources/themes/saga-blue/theme.css';       //theme
import 'primevue/resources/primevue.min.css';                 //core css
import 'primeicons/primeicons.css';                           //icons
import PrimeVue from 'primevue/config';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
// import * as components from 'vuetify/components'
// import * as directives from 'vuetify/directives'
// const vuetify = createVuetify({
//     components,
//     directives,
//     ssr: true,
//   })

// import 'vuetify/dist/vuetify.min.css' 
import App from './App.vue';

import router from './router';
import store from './store';

// store.dispatch("getUser")
// .then(()=>{
//     createApp({
//         components: {
//             'IndexComponent': App
//         }
//     }).use(store).use(router).mount("#app")
// });

// createApp({
//     components: {
//         'IndexComponent': App
//     }
// }).use(store).use(router).mount("#app")

// const app = createApp({
//     components: {
//         'IndexComponent': App,
//         Vuetify,
//     }
// }).use(store).use(router).mount("#app")

const app = createApp(App)
app.use(router)
app.use(store)
app.use(PrimeVue)
app.component('DataTable',DataTable)
app.component('Column',Column)
app.component('Button',Button)
app.component('InputText',InputText)
app.mount('#app')
require('./portal');
