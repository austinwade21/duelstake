import axios from 'axios'

export default {
    namespaced: true,

    state: {
        chatOpen: true,
    },

    getters: {
        chatOpen (state) {
            return state.chatOpen
        },

    },

    mutations: {
        SET_CHATOPEN (state, value) {
            state.chatOpen = value
        },

    },

    actions: {
        setChatOpen({commit, state}){
            commit('SET_CHATOPEN', !state.chatOpen);
        }
    }
}