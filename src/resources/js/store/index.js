import Vuex from 'vuex'
import Vue from 'vue'
import Posts from './modules/posts'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        Posts
    }
})
