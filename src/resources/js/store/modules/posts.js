import axios from 'axios';
import r from '../../route';

export default {
    state: {
        posts: [],
        pagination: {
            last_page: null,
            current: null,
            to: null,
            total: null,
        },
        page: 1,
        search:""
    },
    actions: {
       async fetchPosts(contex, page = 1) {
           let url = r('posts.index')+'?page=' + page,
               search = contex.getters.searchValue;
           if (search) {
               url = url + "&search=" + search;
           }
           axios.get(url)
               .then((response) => {
                   contex.commit('updatePosts', response.data.data);
                   contex.commit('updatePagination', {
                       last_page: response.data.last_page,
                       total: response.data.total,
                       to: response.data.to,
                       current: response.data.current_page,
                   });
               });
        },
        async first(contex) {
            var page = 1;
            contex.dispatch('fetchPosts', page)
        },
        async last(contex) {
            var page = contex.state.pagination.last_page;
            contex.dispatch('fetchPosts', page)
        },
        async next(contex) {
            var page = contex.state.pagination.current;
            page = page+1;
            contex.dispatch('fetchPosts', page)
        },
        async prev(contex) {
            var page = contex.state.pagination.current;
            page = page-1;
            contex.dispatch('fetchPosts', page)
        },
        async search(contex, search = '') {
            var page = 1;
            contex.commit('updateSearch', search);
            contex.dispatch('fetchPosts', page)
        }
    },
    getters: {
        allPosts(state) {
            return state.posts;
        },
        pagination(state) {
            return state.pagination;
        },
        searchValue(state) {
            return state.search;
        }
    },
    mutations: {
        updatePosts(state, posts) {
            state.posts = posts
        },
        updatePagination(state, pagination) {
            state.pagination = pagination
        },
        updateSearch(state, search) {
            state.search = search
        }
    },
}
