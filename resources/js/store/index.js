import { createStore } from 'vuex';
import axios from "axios";
axios.defaults.withCredentials = true;
const baseURL = process.env.MIX_VUE_APP_API_URL || "http://back_semiperu.test";

// console.log(baseURL);

export default createStore({
    state:{
        user: null,
        auth: false
    },
    getters: {},
    mutations:{
        SET_USER(state,user){
            state.user = user;
            state.auth = Boolean(user);
        }
    },
    actions: {
        getUser({ commit }) {
            axios.get(`${baseURL}/api/user`)
            .then(res => {
                commit("SET_USER", res.data);
                console.log(res.data);
            }).catch(() => {
                commit("SET_USER", null);
                console.log("cerrada sesion");
            });
        },
        async logout({ dispatch }) {
            await axios.post(`${baseURL}/logout`);
            return dispatch("getUser");
        },

    },
    modules: {}
})
