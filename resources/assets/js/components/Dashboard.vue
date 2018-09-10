<template>
   
     <div class="container" v-if="$auth.ready()" >
            <div class="verified-banner"  v-if="$auth.user().verified == 0">
                You're account is not still verified! Click the link to send verifications.
                <a class="btn waves-effect btn-small white blue-text">SEND VERIFICATIONS</a>
            </div>
            <div class="row">
                <div class="col-3" >
                    <div class="card small">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="https://materializecss.com/images/sample-1.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4 text-center">{{$auth.user().name}} {{$auth.user().lastname}}</span>
                                <p class="text-center mb-1"><a href="#" >Web developer</a></p>
                                <hr>
                                <p class="grey-text text-darken-4 text-center">78</p>
                                <p class=" grey-text text-darken-1 text-center"><span><i class="fa fa-link"></i></span> Networks</p>
                                <hr>
                                <p class="grey-text text-darken-4 text-center">90</p>
                                <p class=" grey-text text-darken-1 text-center"><span><i class="fa fa-link"></i></span> Connections</p>
                               
                            </div>
                            <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">{{$auth.user().name}} {{$auth.user().lastname}}<i class="material-icons right">close</i></span>
                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
                        </div>
                    </div>
                    <div class="">
                        <div class="collection">
                            <a href="#!" class="collection-item"> Basic information</a>
                            <a href="#!" class="collection-item active">Educational Background</a>
                            <a href="#!" class="collection-item">Employment</a>
                            <a href="#!" class="collection-item">Skills</a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <form class="">
                        <div class="row">
                            <div class="input-field col s12">
                                <div class="form-group input-field">
                                    <label for="post">Post a job, ideas and feeds</label>
                                    <input type="text" class="form-control" name="post" required>

                                </div>
                               
                             <button class="btn waves-effect waves-light white btn-small black-text" type="submit" name="action">
                                 <i class="fa fa-building"></i> Post job
                            </button>
                             <button class="btn waves-effect waves-light white btn-small black-text" type="submit" name="action">
                                  <i class="fa fa-comment"></i> Write an idea
                               
                            </button>

                            <button class="btn waves-effect waves-light light-blue darken-4 btn-small pull-right" type="submit" name="action">
                                  Post
                            </button>
                            </div>
                            
                        </div>
                        </form>
                    </div>
                    <!-- end of post bar -->
                    <div class="feed-option"><small class="grey-text">My feed</small> </div>
                    <!-- post started -->

                        <div class="card">
                            <div class="post-pane">
                                <!-- Post -->
                                <div class="post">
                                    <div class="user-block">
                                        <img class="circle img-bordered-sm" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                            <a href="#">Jonathan Burke Jr.</a>
                                            </span>
                                        <span class="description">Shared publicly - 7:30 PM today</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore the hate as they create awesome
                                        tools to help create filler text for everyone from bacon lovers
                                        to Charlie Sheen fans.
                                    </p>
                                    <span class="pull-left">
                                        <a href="#" class="link-black text-sm post-btn"><i class="fa fa-share margin-r-15"></i> Share</a>
                                        <a href="#" class="link-black text-sm post-btn"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                       
                                    </span>
                                    <span class="pull-right">
                                         <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                        (5)</a>
                                    </span>
                                    <div class="form-group">
                                         <input class="form-control custom-input" type="text" placeholder="Type a comment">
                                    </div>
                                   
                                </div>
                                <!-- /.post -->

                                
                            </div>
                            <!-- /.post-pane -->
                        </div>

                         <div class="card">
                            <div class="post-pane">
                                <!-- Post -->
                                <div class="post">
                                    <div class="user-block">
                                        <img class="circle img-bordered-sm" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                            <a href="#">Jonathan Burke Jr.</a>
                                            </span>
                                        <span class="description">Shared publicly - 7:30 PM today</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore the hate as they create awesome
                                        tools to help create filler text for everyone from bacon lovers
                                        to Charlie Sheen fans.
                                    </p>
                                    <span class="pull-left">
                                        <a href="#" class="link-black text-sm post-btn"><i class="fa fa-share margin-r-15"></i> Share</a>
                                        <a href="#" class="link-black text-sm post-btn"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                       
                                    </span>
                                    <span class="pull-right">
                                         <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                        (5)</a>
                                    </span>
                                    <div class="form-group">
                                         <input class="form-control custom-input" type="text" placeholder="Type a comment">
                                    </div>
                                   
                                </div>
                                <!-- /.post -->

                                
                            </div>
                            <!-- /.post-pane -->
                        </div>


                        <!-- end of post -->
          
                </div>
                <div class="col-3">
                    
                       <div class="collection">
                            <p class="collection-item active">Available Jobs</p>
                            <a href="#!" class="collection-item"><i class="fa fa-building"></i> IT Manager <br> 
                                 <small>Basic description</small>
                            </a>
                           
                            <a href="#!" class="collection-item "><i class="fa fa-building"></i> HR Manager</a>
                            <a href="#!" class="collection-item"><i class="fa fa-building"></i> Software Manager</a>
                            <a href="#!" class="collection-item"><i class="fa fa-building"></i> Lodi Manager</a>
                        </div>
                        <div class="card">
                            <br>
                            
                        </div>
                        
                </div>

            </div>
        </div>
        
</template>

<script>
     export default{
         
        data(){
            return{
                user: {}
            }
        },
        route: {
            data: function (transition) {
                this.getUserDetails(transition);
            }
        },

        methods: {

            getUserDetails(transition)
            {
                this.$auth.get('/users/' + this.$route.params.name)
                    .then(function (response) {
                        this.user = response.data;
                        transition.next();
                    });

            }
        }
    }
</script>
