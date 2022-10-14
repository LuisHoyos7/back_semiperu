// require('./bootstrap');

import { createApp } from 'vue'
// import { VueRouter } from ''

import HolaMundo from './components/HolaMundo';
createApp({
    components: {
        HolaMundo
    }
}).mount("#app")
