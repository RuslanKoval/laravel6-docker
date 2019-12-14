import VueRouter from 'vue-router';

import Users from './components/Users';
import Blog from './components/Blog';
import Posts from './components/Posts';

export default new VueRouter({
   routes: [
       {
           path: '/',
           component: Blog
       },
       {
           path: '/post/:id',
           name: 'post',
           component: Posts
       }
   ],
    mode: 'history'
});
