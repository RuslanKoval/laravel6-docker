<template lang="pug">
.container
    .card
        .card-body
            h4 {{post.title}}
            p.mb-0 {{post.content_html}}
            <router-link to="/" class="btn btn-outline-info float-right">Назад</router-link>

</template>

<script>

    import axios from 'axios';
    import r from '../route';

    export default {
        data() {
            return {
                post: []
            }
        },
        computed: {
            postsList: function () {
                return this.posts;
            }
        },
        created() {
            var postId = this.$route.params.id;
            this.post =  this.$route.params.post;
        },
        methods: {

        },
        mounted() {

        }
    }
</script>
