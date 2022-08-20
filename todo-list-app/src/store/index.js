import { createStore } from "vuex";

export default createStore({
    state:{
        tasks:JSON.parse(localStorage.getItem('tasks')),
    },
    mutations:{
    },
})