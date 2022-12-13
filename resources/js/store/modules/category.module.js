import { apiClient } from '@src/utils/api-client.js'

const state = () => ({})

const mutations = {}

const actions = {
    getCategory (_, payload) {
        return new Promise((resolve, reject) => {
            apiClient
                .get('/category', payload)
                .then(response => {
                    resolve(response)
                })
                .catch(error => {
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
