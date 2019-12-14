<template lang="pug">
    .container
        .card.mb-2(v-for="post in posts")
            .card-body
                h4 {{post.title}}
                p.mb-0 {{post.excerpt}}
                <router-link :to="{name: 'post', params: {id: post.id, post: post}}" class="btn btn-outline-info float-right">Read more</router-link>

</template>

<script>

    import axios from 'axios';
    import r from '../route';

    export default {
        data() {
            return {
                posts: []
            }
        },
        computed: {
        },
        methods: {
            getPosts() {
                axios.get(r('posts.index'))
                    .then((response) => {
                        this.posts = response.data.data;
                    });
            }
        },
        created() {
            this.getPosts();
        },
        mounted() {

        }
    }
</script>
