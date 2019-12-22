<template lang="pug">
    .container
        .search.mb-5
            .input-group
                .input-group-prepend
                    button.btn.btn-outline-danger(v-on:click="resetSearch()") reset
                input.form-control(v-model="searchVal")
                .input-group-prepend
                    button.btn.btn-outline-success(v-on:click="runSearch(searchVal)") search


        .card.mb-2(v-for="post in allPosts")
            .card-body
                h4 {{post.title}}
                p.mb-0 {{post.excerpt}}
                <router-link :to="{name: 'post', params: {id: post.id, post: post}}" class="btn btn-outline-info float-right">Read more</router-link>
        .row(v-if="pagination.last_page > 1")
            .pagination.col-9
                li.page-item(v-if="pagination.current != 1")
                    button.page-link(v-on:click='first') first
                li.page-item(v-if="pagination.current != 1")
                    button.page-link(v-on:click='prev') <<
                li.page-item(v-if="pagination.to != pagination.total")
                    button.page-link(v-on:click='next') >>
                li.page-item(v-if="pagination.to != pagination.total")
                    button.page-link(v-on:click='last') last
            .col-3
                span.float-right {{pagination.to}} / {{pagination.total}}

</template>

<script>
    import {mapGetters, mapActions, mapMutations} from 'vuex'

    export default {
        data: function () {
            return {
                searchVal:''
            }
        },
        computed: mapGetters(['allPosts', 'pagination', 'searchValue']),
        methods: {
            ...mapActions(['fetchPosts', 'first', 'prev', 'next', 'last', 'search']),
            runSearch(search) {
                this.search(search)
            },
            resetSearch() {
                this.searchVal = '';
                this.search()
            }
        },
        created() {},
        async mounted() {
            this.fetchPosts();
            this.searchVal = this.searchValue
        }
    }
</script>
