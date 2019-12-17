import axios from 'axios';
import r from '../../route';

function getData() {
    return axios.get(r('posts.index')+'?page=1')
}

export default {
    state: {
        posts: [],
        pagination: {
            last_page: null,
            current: null,
            to: null,
            total: null,
        },
        page: 1
    },
    actions: {
       async fetchPosts(contex) {
           axios.get(r('posts.index')+'?page=1')
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

            axios.get(r('posts.index')+'?page='+ page)
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
        async last(contex) {
            var page = contex.state.pagination.last_page;

            axios.get(r('posts.index')+'?page='+ page)
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
        async next(contex) {
            var page = contex.state.pagination.current;
            page = page+1;

            axios.get(r('posts.index')+'?page='+ page)
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
        async prev(contex) {
            var page = contex.state.pagination.current;
            page = page-1;

            axios.get(r('posts.index')+'?page='+ page)
                .then((response) => {
                    contex.commit('updatePosts', response.data.data);
                    contex.commit('updatePagination', {
                        last_page: response.data.last_page,
                        total: response.data.total,
                        to: response.data.to,
                        current: response.data.current_page,
                    });
                });
        }
    },
    getters: {
        allPosts(state) {
            return state.posts;
        },
        pagination(state) {
            return state.pagination;
        },
    },
    mutations: {
        updatePosts(state, posts) {
            state.posts = posts
        },
        updatePagination(state, pagination) {
            state.pagination = pagination
        }
    },
}
