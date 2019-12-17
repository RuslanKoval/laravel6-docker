<template lang="pug">
    .container
        .card.mb-2(v-for="post in allPosts")
            .card-body
                h4 {{post.title}}
                p.mb-0 {{post.excerpt}}
                <router-link :to="{name: 'post', params: {id: post.id, post: post}}" class="btn btn-outline-info float-right">Read more</router-link>
        .row
            .pagination.col-9
                li.page-item
                    a.page-link(v-on:click='first') first
                li.page-item
                    a.page-link(v-on:click='prev') prev
                li.page-item
                    a.page-link(v-on:click='next') next
                li.page-item
                    a.page-link(v-on:click='last') last
            .col-3
                span.float-right {{pagination.to}} / {{pagination.total}}

</template>

<script>

    import {mapGetters, mapActions} from 'vuex'

    export default {
        computed: mapGetters(['allPosts', 'pagination']),
        methods: mapActions(['fetchPosts', 'first', 'prev', 'next', 'last']),
        created() {},
        async mounted() {
            this.fetchPosts()
        }
    }
</script>
