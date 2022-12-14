import Vue from 'vue'
import Vuex from 'vuex'

import auth from './modules/auth.module.js'
import home from './modules/home.module.js'
import category from './modules/category.module.js'
import search from './modules/search.module.js'
import book from './modules/book.module.js'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        auth,
        home,
        category,
        search,
        book
    }
})

export default store
