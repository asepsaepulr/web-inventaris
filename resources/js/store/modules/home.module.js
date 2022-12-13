import { apiClient } from '@src/utils/api-client.js'

const state = () => ({})

const mutations = {}

const actions = {
    getListBooks (_, payload) {
        return new Promise((resolve, reject) => {
            apiClient
                .get('/books', payload)
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
