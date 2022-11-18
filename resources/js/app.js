require('./bootstrap');
require('./dataTablesb5');

import { createApp } from 'vue';
import 'primevue/resources/themes/saga-blue/theme.css';       //theme
import 'primevue/resources/primevue.min.css';                 //core css
import 'primeicons/primeicons.css';                           //icons
import PrimeVue from 'primevue/config';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import Dialog from 'primevue/dialog';
import Steps from 'primevue/steps';
import Dropdown from 'primevue/dropdown';
import Card from 'primevue/card';
import ToastService from 'primevue/toastservice';
import Toast from "primevue/toast";
import App from './App.vue';
import InputNumber from 'primevue/inputnumber';
import router from './router';
import store from './store';


const app = createApp(App)
app.use(router)
app.use(store)
app.use(PrimeVue)
app.use(ToastService);
app.component('DataTable',DataTable)
app.component('Toast',Toast)
app.component('Column',Column)
app.component('Button',Button)
app.component('InputText',InputText)
app.component('Dialog',Dialog)
app.component('Steps',Steps)
app.component('Card',Card)
app.component('InputNumber',InputNumber)

app.component('Dropdown',Dropdown)
app.mount('#app')
// require('./portal');
