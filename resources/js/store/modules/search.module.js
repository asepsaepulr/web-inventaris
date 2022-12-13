import { apiClient } from '@src/utils/api-client.js'

const state = () => ({
    books: [],
    totalBooks: 0
})

const mutations = {
    setBooks (state, payload) {
        if (payload.isAdd) {
            payload.data.map(item => {
                state.books.push(item)
            })
        } else {
            state.books = payload.data
        }
    },
    setTotalBooks (state, payload) {
        state.totalBooks = payload
    }
}

const actions = {
    getListBooks ({ commit }, payload) {
        return new Promise((_, reject) => {
            apiClient
                .get('/books', payload)
                .then(response => {
                    const payloadState = {
                        data: response.data.data.data,
                        isAdd: true
                    }
                    commit('setTotalBooks', response.data.data.total)

                    if (payload.params.page === 1) {
                        payloadState.isAdd = false
                        commit('setBooks', payloadState)
                    } else {
                        commit('setBooks', payloadState)
                    }
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
