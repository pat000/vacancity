import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueCookie from 'vue-cookie'
import App from './App.vue';
import Dashboard from './components/Dashboard.vue';
import Home from './components/Home.vue';
import Register from './components/Register.vue';
import Login from './components/Login.vue';
import Profile from './components/Profile.vue';
import Messages from './components/Messages.vue';
import Error from './components/Error.vue';
import Job_Post from './components/Job_Post.vue';
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueCookie);
// axios.defaults.baseURL = 'http://localhost/vacancity/public/api';
axios.defaults.baseURL = 'http://localhost:8000/api';

const router = new VueRouter({
    routes: [{
        path: '/',
        name: 'home',
        component: Home,
        meta: {
            title: 'Vacancity',
            auth: true
        }
    },{
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            title: 'Register | Vacancity',
            auth: false
        }
    },{
        path: '/404',
        name: 'error',
        redirect: Error,
        meta: {
            auth: false
        }
    },{
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            title: 'Login | Vacancity',
            auth: false
        }
    },{
        path: '/vc/:slug',
        name: 'profile',
        component: Profile,
        meta: {
            title:  'Profile | Vacancity',
            auth: true
        }
        
    },{
        path: '/messages',
        name: 'messages',
        component: Messages,
        meta: {
            title: 'Messages | Vacancity',
            auth: true
        }
        
    },{
        path: '/job-post',
        name: 'job-posting',
        component: Job_Post,
        meta: {
            title: 'Job Posting | Vacancity',
            auth: true
        }
        
    }]
});
Vue.router = router
Vue.use(require('@websanova/vue-auth'), {
    auth: {
        request: function (req, token) {
          req.headers.set('Authorization', token)
        },
        response: function (res) {
          return (res.data || {}).token
        }
      },
   auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
   http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
   router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
   rolesVar: 'role',
   tokenName: 'jwt_auth_token',
   facebookOauth2Data: {
        redirect: function () {
             return this.options.getUrl() + '/api/auth/facebook/callback' 
            },
        clientId: '385539691933412'
    },
});

Vue.component('navbar', require('./components/Navbar.vue'));
Vue.component('sidebar', require('./components/Sidebar.vue'));
Vue.component('modal', {
  template: '#modal-template'
})

App.router = Vue.router
router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    next()
})
const app = new Vue({
    el: '#app',
    components: { Login },
    router,
   render: app => app(App)
});