<template lang="pug">
    <router-view></router-view>
</template>


<script>
    var Centrifuge = require("centrifuge");
    var SockJS = require('sockjs-client');
    import axios from 'axios';

    export default {
        data: function() {
          return {
              centrifugo: ''
          }
        },
        methods: {
            initCentrifugo() {
                axios.post('http://localhost:8000/centrifugo/token')
                    .then((response) => {
                        this.centrifugo = new Centrifuge(response.data.url);
                        this.centrifugo.setToken(response.data.token);

                        this.subscribe();
                        this.centrifugo.connect();
                });
            },
            subscribe() {
                this.centrifugo.subscribe("news", function(message) {
                    console.log(message);
                });
                this.centrifugo.on("connect", function () {
                    console.log('connect');
                });
            }
        },
        mounted() {
            this.initCentrifugo();

            console.log('Component mountesd. ss')
        }
    }
</script>
