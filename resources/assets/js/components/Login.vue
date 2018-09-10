<template>
    <div class="row justify-content-center">
         <!-- loading -->
        <div class="preloader-background" v-if="divload">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 login-box">
                <div class="">
                    <p>Sign in to view jobs</p>
                </div>
                <hr>
                  <router-link :to="{ name: 'login' }" class="btn-small waves-effect waves-light red darken-1 white-text btn-block mb-1">
                    <span ><i class="fa fa-google google-svg"></i></span>
                          Use Google Account
                  </router-link>
                   <!-- v-on:click='fblog'  -->
                   <!-- href="api/login/facebook" -->
                   <a v-on:click="socialLogin('facebook')"  class="btn-small waves-effect waves-light  blue darken-4 white-text btn-block mb-1">
                    
                      <span ><i class="fa fa-facebook google-svg"></i></span>
                          Login with Facebook
                   </a>
                <div class="form-option">or</div>
                <div class="alert alert-danger" v-if="error && !success">
                    <span>There was an error, unable to sign in with those credentials.</span>
                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
               
                <form autocomplete="off" @submit.prevent="login" method="post">
                    <div class="form-group input-field">
                        <label for="email">E-mail address</label>
                        <input type="email" id="email" class="form-control" v-model="email" required>
                    </div>
                    <div class="form-group input-field">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" v-model="password" required>
                    </div>
                    <button type="submit" class="btn-small waves-effect waves-light  blue darken-1 btn-block mb-1"><span><i class="fa fa-lock google-svg"></i></span> Sign in</button>
                    <div class="text-center mb-1">
                      <!-- <router-link :to="{ name: 'forgot' }">Forgot password?</router-link> -->
                    </div>
                    <div class="text-center mb-2">
                       <span>Don't have an account?  <router-link :to="{ name: 'register' }"  class="">Register</router-link></span>
                    </div>
                   
                </form>
        </div>
    </div>
</template>

<script>
    import Auth from '../store/auth'
    import {get,post} from '../helpers/api'
    import Status from '../helpers/status'
    
  export default {
    created(){
        if(Auth.state.error){
            this.error = Auth.state.error.includes('+')
                ? Auth.state.error.replace(/\+/gi,' ') : Auth.state.error;
        }
    },
    data(){
      return {
        email: null,
        password: null,
        error: false,
        show: false,
        divload: false,
        form: {
            email: '',
            password: ''
        },
        isProcessing: false,
        auth: null,
        status: null,
        context: 'oauth2 context',
        code: this.$route.query.code,
        type: this.$route.params.type,
      }
    },
    mounted() {
        if (this.code) {
            this.$auth.oauth2({
                code: true,
                provider: this.type,
                params: {
                     code: this.code,
                },
                success: function(res) {
                    console.log('success ' + this.context);
                },
                error: function (res) {
                    console.log('error ' + this.context);
                },
            });
        }
    },
    methods: {
      login(){
        var redirect = this.$auth.redirect();

        var app = this
        app.divload = true
        this.$auth.login({
            params: {
              email: app.email,
              password: app.password
            }, 
            auth: null,
            status: null,
            success: function () {
               app.divload= false;
            },
            error: function (resp) {
                app.divload= false;
                app.error = true;
                app.errors = resp.response.data.errors;
            },
            rememberMe: true,
            redirect: '/',
            fetchUser: true,
        });       
      },fblog(){
          var data = {
                appId: '385539691933412',
                scope: 'email'
            };

            var callbacks = {
                success: function () {},
                error: function () {}
            };

            this.auth.facebookUrl(data, null, null, callbacks);
      },
      social(type) {
          
            this.$auth.oauth2({
                provider: type || this.type
            });
        },
        socialLogin(){
                 var app = this
                 app.divload = true
                 this.$http.get(
                    '/auth/facebook'
                ).then(response => {
                    //console.log(response.data.redirectUrl)
                   window.location.href= response.data.redirectUrl;
                }, response => {
                })
        },
       openFbLoginDialog () {
          FB.login(this.checkLoginState, { scope: 'email' })
        },
        checkLoginState: function (response) {
          if (response.status === 'connected') {
            FB.api('/me', { fields: 'name,email' }, function(profile) {
              console.log('Good to see you, ' + profile.name + '.');
             
             // this.login();
            });
          } else if (response.status === 'not_authorized') {
            // the user is logged in to Facebook, 
            // but has not authenticated your app
          } else {
            // the user isn't logged in to Facebook.
          }
        },

    }
  } 
</script>