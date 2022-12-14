import { apiClient } from '@src/utils/api-client.js'

const user = JSON.parse(localStorage.getItem('user-loggedin'))

const state = () => ({
    token: localStorage.getItem('token') || null,
    user: JSON.parse(localStorage.getItem('user-loggedin')) || {},
    loggedIn: user ? true : false
})

const mutations = {
    SET_USER (state, payload) {
        state.loggedIn = true
        state.user = payload
        const userData = JSON.stringify(payload)
        localStorage.setItem('user-loggedin', userData)
    },
    SET_LOGOUT () {
        state.loggedIn = false
        state.user = {}
        localStorage.removeItem('user-loggedin')
        localStorage.removeItem('token')
        window.location = '/'
    }
}

const actions = {
    updateProfile ({ commit }, payload) {
        return new Promise((resolve, reject) => {
            apiClient
                .post('/profile', payload)
                .then(response => {
                    resolve(response)
                })
                .catch(error => {
                    reject(error)
                })
        })
    },
    getProfile ({ commit }) {
        return new Promise((resolve, reject) => {
            apiClient
                .get('/profile')
                .then(response => {
                    commit('SET_USER', response.data.data)
                    resolve(response)
                })
                .catch(error => {
                    reject(error)
                })
        })
    },
    getListReviews ({ commit }) {
        return new Promise((resolve, reject) => {
            apiClient
                .get('/user/reviews')
                .then(response => {
                    resolve(response)
                })
                .catch(error => {
                    reject(error)
                })
        })
    },
    postLogin (_, payload) {
        return new Promise((resolve, reject) => {
            apiClient
                .post('/login', payload)
                .then(response => {
                    resolve(response)
                })
                .catch(error => {
                    reject(error)
                })
        })
    },
    postRegister (_, payload) {
        return new Promise((resolve, reject) => {
            apiClient
                .post('/register', payload)
                .then(response => {
                    resolve(response)
                })
                .catch(error => {
                    reject(error)
                })
        })
    },
    postForgotPassword ({ commit }, payload) {
        return new Promise((resolve, reject) => {
            apiClient
                .post('/forgot-password', payload)
                .then(response => {
                    resolve(response)
                })
                .catch(error => {
                    reject(error)
                })
        })
    },
    resetPassword ({ commit }, payload) {
        return new Promise((resolve, reject) => {
            apiClient
                .post('/reset-password', payload)
                .then(response => {
                    resolve(response)
                })
                .catch(error => {
                    reject(error)
                })
        })
    },
    changePassword ({ commit }, payload) {
        return new Promise((resolve, reject) => {
            apiClient
                .post('/profile/change-password', payload)
                .then(response => {
                    resolve(response)
                })
                .catch(error => {
                    reject(error)
                })
        })
    },
    logout ({ commit }) {
        return new Promise((resolve, reject) => {
            apiClient
                .post('/logout')
                .then(response => {
                    commit('SET_LOGOUT')
                    resolve(response)
                })
                .catch(error => {
                    commit('SET_LOGOUT')
                    reject(error)
                })
        })
    }
}

const getters = {}

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}
