<template lang="pug">
    <router-view>
        nav
            <router-link to="/"> + dasdas</router-link>
            <router-link to="/ss"> + dasdas</router-link>
            <router-link to="/dd"> + dasdas</router-link>
    </router-view>
</template>


<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
