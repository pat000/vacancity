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
        <div class="alert alert-danger" v-if="error && !success">
            <span>There was an error, unable to complete registration.</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="alert alert-success" v-if="success">
            <span>Registration completed. You can now <router-link :to="{name:'login'}">sign in.</router-link></span>
            <span>Please verify also your email to confirm your account in Vacancity</span>
        </div>
        <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
            <div class="">
                <p>Register and apply available jobs</p>
                <hr>
            </div>
            <div class="form-group  input-field" v-bind:class="{ 'has-error': error && errors.name }">
                <label for="name">First name</label>
                <input type="text" id="name" class="form-control" v-model="name"  required>
                <small class="help-block text-danger" v-if="error && errors.name">{{ errors.name }}</small>
            </div>
            <div class="form-group  input-field" v-bind:class="{ 'has-error': error && errors.lastname }">
                <label for="lastname">Last name</label>
                <input type="text" id="lastname" class="form-control" v-model="lastname" required>
                <small class="help-block text-danger" v-if="error && errors.lastname">{{ errors.lastname }}</small>
            </div>
            <div class="form-group  input-field" v-bind:class="{ 'has-error': error && errors.email }">
                <label for="email">E-mail address</label>
                <input type="email" id="email" class="form-control" v-model="email" required>
                <small class="help-block text-danger" v-if="error && errors.email">{{ errors.email }}</small>
            </div>
            <div class="form-group  input-field" v-bind:class="{ 'has-error': error && errors.password }">
                <label for="password">Password (6 or more characters)</label>
                <input type="password" id="password" class="form-control" v-model="password" required>
                <small class="help-block text-danger" v-if="error && errors.password">{{ errors.password }}</small>
            </div>
             <button type="submit" class="btn-small waves-effect waves-light  blue darken-1 btn-block mb-1"><span><i class="fa fa-user-circle google-svg"></i></span> Join now</button>
            <div class="text-center mb-2">
                <span>Already have an account?  <router-link :to="{ name: 'login' }"  class="">Sign up</router-link></span><br>
                <small>View our Privacy Policy and agreement <router-link :to="{ name: 'home' }"  class="">Terms and Condition</router-link></small>
            </div>
        </form>
    </div>
</div>
</template>


<script> 
    export default {
        
        data(){
            return {
                name: '',
                lastname: '',
                email: '',
                password: '',
                error: false,
                errors: {},
                success: false,
                divload: false,
            };
        },
        methods: {
            register(){
                var app = this
                app.divload = true
                this.$auth.register({
                    params: {
                        name: app.name,
                        lastname: app.lastname,
                        email: app.email,
                        password: app.password
                    }, 
                    success: function () {
                        app.success = true;
                        app.divload= false;
                    },
                    error: function (resp) {
                        app.divload= false;
                        app.error = true;
                        app.errors = resp.response.data.errors;
                    },
                    redirect: null
                });                
            }
        }
    }
</script>