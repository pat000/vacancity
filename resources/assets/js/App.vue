<template>
    
    <div  class="container-fluid">
        <header class="navbar navbar-expand-lg  navbar-dark  bg-dark nav-less fixed-top">
            <div class="logo-con">
                <button class="logo-btn"><b>V</b></button>
            </div>
            <div class="navbar-nav flex-row ml-md-auto d-none d-md-flex" v-if="$auth.check()">
                <ul class="navbar-nav mr-auto">
                    <input type="text" class="form-control text-search" placeholder="Search item">
                </ul>
            </div>
            <!-- <nav>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger "  v-if="$auth.check()"><i class="material-icons">menu</i></a>
            </nav> -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent" v-if="$auth.check()">
                <ul class="navbar-nav mr-auto" >
                        <li class="nav-item active logo-con">
                        <router-link class="nav-link " :to="{ name: 'home' }"></router-link>
                        </li>
                    </ul>
            </div>
            
             <div class="navbar-nav flex-row ml-md-auto d-none d-md-flex" v-if="$auth.check()">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item menu-pad"  v-if="$auth.check()" >
                        <router-link class="nav-link mr-md-2" :to="{ name: 'home' }" >
                                <span> <i class="fa fa-home"></i></span> <span class="menu-block"> Home</span> 
                        </router-link>
                    </li>
                     <li class="nav-item menu-pad"  v-if="$auth.check()" >
                        <router-link class="nav-link mr-md-2" :to="{ name: 'messages' }" >
                            <span> <i class="fa fa-inbox"></i></span> <span  class="menu-block"> Messages</span> 
                        </router-link>
                    </li>
                     <li class="nav-item menu-pad"  v-if="$auth.check()" >
                        <router-link class="nav-link mr-md-2" :to="{ name: 'job-posting' }" >
                            <span> <i class="fa fa-suitcase"></i></span> <span  class="menu-block"> Post Job</span> 
                        </router-link>
                    </li>
                </ul>
            </div>

            <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                <li class="nav-item dropdown user-line" v-if="$auth.check()"  >
                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <span> <i class="fa fa-user-circle"></i></span> <span class="menu-block"> Me</span> 
                    </a>
                    <div class="dropdown-menu  user-dropdown" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-center"  href="#!">{{ $auth.user().name }} {{ $auth.user().lastname }}</a>
                        <div class="dropdown-divider"></div>
                        <router-link class="dropdown-item " :to="{ name: 'profile' , params: { slug: $auth.user().slug_name } }" > View Profile</router-link>
                        <div class="dropdown-divider"></div>
                         <a href="#" @click.prevent="$auth.logout()"  class="dropdown-item mb-2">Logout</a>
                    </div>
                </li>
            </ul>
        </header>
      
        <div class="" v-if="$auth.ready()">
            <router-view ></router-view>
        </div>
         <div  class="container"  v-if="!$auth.ready()">
            <div class="preloader-background">
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
        </div>

        <div class="preloader-background" v-if="divload" >
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
        <div class="hide-on-large-only">
            <footer>
                <ul class="nav-main nav-container display-flex full-height">
                    <li class="nav-item nav-item--feed nav-item__link--underline"> 
                            <router-link class="nav-item__link  js-nav-item-link active " :to="{ name: 'home' }" >
                                <span class="nav-item__icon"> <i class="fa fa-home"></i></span>
                                    <span  class="nav-item__title"> Home</span> 
                        </router-link>
                    </li>
                    <li  class="nav-item nav-item--feed">
                            <router-link class=" nav-item__link nav-item__link--underline js-nav-item-link  " :to="{ name: 'messages' }" >
                                <span class="nav-item__icon"> <i class="fa fa-inbox "></i></span> 
                                <span class="nav-item__title" > Messages</span> 
                        </router-link>
                    </li>
                    <li  class="nav-item nav-item--feed">
                            <router-link class=" nav-item__link nav-item__link--underline js-nav-item-link  " :to="{ name: 'profile', params: { slug: $auth.user().slug_name }  }" >
                                <span class="nav-item__icon"> <i class="fa fa-user "></i></span> 
                                <span class="nav-item__title" > Profile</span> 
                        </router-link>
                    </li>
                </ul>
            </footer> 
        </div>
        
    </div>
    
</template>
<script>
    import Auth from './store/auth'
    import {post} from './helpers/api'
    export default{
        created(){
            Auth.initialize(this.$cookie.get('authentication'));
            this.$cookie.delete('authentication');
            if(Auth.state.redirect){
                this.$router.push(Auth.state.redirect);
            }
        },
        computed: {
            checkAuthStatus(){
                if(this.auth.api_token && this.auth.user_id){
                    return true
                }
                return false
            }
        },
        data(){
            return{
                divload: false,
                user: {},
                 auth: Auth.state
            }
        },
        methods: {
             resendEmail(){
                 var app = this
                 app.divload = true
                 this.$http.get(
                    'auth/resendEmail'
                ).then(response => {
                    app.divload = false
                }, response => {
                })
            },
           
        } // end of method
    }
</script>

