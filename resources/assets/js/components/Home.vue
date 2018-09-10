<template>
     <div class=""  v-if="$auth.check()" >  
            <div class="row" v-if="divHome">
                <div class=" col l12">
                    <div class="verified-banner bg-red"  v-if="$auth.user().verified == 0">
                        You're account is not still verified! Click the link to send verifications.
                        <a class="btn waves-effect btn-small white blue-text"  @click.prevent="resendEmail()">SEND VERIFICATIONS</a>
                    </div>
                </div>
               
                <div class="col s3  hide-on-med-and-down" >
                    <div class="card small">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="https://materializecss.com/images/sample-1.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title  grey-text text-darken-4 text-center"><router-link  :to="{ name: 'profile', params: { slug: $auth.user().slug_name } }" >{{$auth.user().name}} {{$auth.user().lastname}}</router-link></span>
                                <p class="text-center mb-1"><a href="#" >Web developer</a></p>
                                <div class="divider"></div>
                                <p class="grey-text text-darken-4 text-center">78</p>
                                <p class=" grey-text text-darken-1 text-center"><span><i class="fa fa-link"></i></span> Networks</p>
                                <div class="divider"></div>
                                <p class="grey-text text-darken-4 text-center">90</p>
                                <p class=" grey-text text-darken-1 text-center"><span><i class="fa fa-link"></i></span> Connections</p>
                               
                            </div>
                            <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">{{$auth.user().name}} {{$auth.user().lastname}}<i class="material-icons right">close</i></span>
                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
                        </div>
                    </div>
                    <div class="" hidden>
                        <div class="collection">
                            <a href="#!" class="collection-item"> Basic information</a>
                            <a href="#!" class="collection-item active">Educational Background</a>
                            <a href="#!" class="collection-item">Employment</a>
                            <a href="#!" class="collection-item">Skills</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 l6 m12 ">
                    <div class="card hoverable">
                        <form class="">
                        <div class="row">
                            <div class="input-field col s12">
                                <div class="form-group input-field wall-textbox">
                                    <label for="post">Post a ideas or feeds</label>
                                    <input type="text" class="form-control " name="post" >

                                </div>
                                <div class="float-right wall-btn-div">
                                    
                                    <router-link class="btn waves-effect waves-light white btn-small black-text"  :to="{ name: 'job-posting' }" >
                                        <i class="fa fa-building"></i> Post job
                                    </router-link>
                                    <button class="btn waves-effect waves-light white btn-small black-text" type="submit" name="action">
                                        <i class="fa fa-comment"></i> Write a feed
                                    </button>
                                    <button class="btn waves-effect waves-light light-blue darken-4 btn-small text-right" disabled type="submit" name="action">
                                        Post
                                    </button>
                                </div>
                                    
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
                <div class="col s3 hide-on-med-and-down">
                    
                       <div class="collection">
                            <p class="collection-item active">Available Jobs</p>
                            <a href="#!" class="collection-item"><i class="fa fa-building"></i> IT Manager <br> 
                                 <small>Basic description</small>
                            </a>
                           
                            <a href="#!" class="collection-item "><i class="fa fa-building"></i> HR Manager</a>
                            <a href="#!" class="collection-item"><i class="fa fa-building"></i> Software Manager</a>
                            <a href="#!" class="collection-item"><i class="fa fa-building"></i> Lodi Manager</a>
                        </div>
                       
                </div>

            </div>
            <!-- end of main row -->
            <div class="card" v-if="divInfo">
                <div class="container">
                    <div class="row ">
                        <div class="col l12">
                            <br>
                            <span class="info-title"> Please input your current work informations</span>
                        </div>
                        <div class="divider"></div>
                        <form @submit.prevent="SaveWork">
                                <div class="col l12">
                                        <div class="form-group">
                                            <label for="position">* Position</label>
                                            <input type="text" class="form-control custom-input" name="position" placeholder="Position" v-model="work.title"  required>
                                        </div>
                                </div>
                                <div class="col l12">
                                        <div class="form-group">
                                            <label for="company">* Company</label>
                                            <input type="text" class="form-control custom-input" name="company" placeholder="Company" v-model="work.company" required>
                                        </div>
                                </div>
                                <div class="col l12">
                                        <div class="form-group">
                                            <label for="location">* Location</label>
                                            <input type="text" class="form-control custom-input" name="location" placeholder="Location" v-model="work.location" required>
                                        </div>
                                </div>
                                <div class="col l6">
                                    <div class="form-group">
                                        <label for="from_month">* From </label>
                                        <select name="from_month" v-model="work.from_month" class="form-control custom-input" required>
                                            <option >January</option>
                                            <option >February</option>
                                            <option >March</option>
                                            <option >April</option>
                                            <option >May</option>
                                            <option >June</option>
                                            <option >July</option>
                                            <option >August</option>
                                            <option >September</option>
                                            <option >October</option>
                                            <option >November</option>
                                            <option >December</option>
                                        </select>
                                        <select name="from_year" v-model="work.from_year" class="form-control custom-input" required>
                                                <option value="">Year</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                        </select>
                                    </div>
                            </div>
                                <div class="col l6">
                                    <div class="form-group">
                                        <label for="to_month">* To </label>
                                        <select name="to_month" v-model="work.to_month" class="form-control custom-input" required>
                                            <option >January</option>
                                            <option >February</option>
                                            <option >March</option>
                                            <option >April</option>
                                            <option >May</option>
                                            <option >June</option>
                                            <option >July</option>
                                            <option >August</option>
                                            <option >September</option>
                                            <option >October</option>
                                            <option >November</option>
                                            <option >December</option>
                                        </select>
                                        <select name="to_year" v-model="work.to_year" class="form-control custom-input" required>
                                                <option value="">Year</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="col l12">
                                <label>
                                    <input type="checkbox" class="filled-in" />
                                    <span>Present Work</span>
                                </label>
                            </div>
                            
                            <div class="col l12">
                                    <div class="form-group">
                                        <label for="lname">Industry</label>
                                        <select name="industry" required v-model="work.industry" class="form-control custom-input"  >
                                            <option value="" disabled selected>Select Industry</option>
                                            <option v-for="industry in industries" v-bind:value="industry.ind_id" v-bind:key="industry.ind_id">
                                                {{industry.ind_name}}
                                            </option>
                                        </select>
                                    </div>
                            </div>
                            <div class="col l12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="" v-model="work.description"  rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col l12 form-group">
                                <button type="submit" class="waves-effect waves-green btn-flat blue white-text  float-right btn-block">Save work information</button>
                            </div>
                        </form>
                    </div>
                    <!-- end of row -->
                </div>
            </div>
            <!-- end work div -->
            <!-- start of basic info -->
            <div class="card" v-if="divBasic">
                    <div class="container">
                        <div class="row">
                           <div class="col l12">
                               <br>
                                <span class="info-title"> Please update your basic informations</span>
                            </div> 

                            <form @submit.prevent="SaveInfo">
                                        <div class="">
                                            <div class="row" >
                                                
                                                <div class="col l12">
                                                        <div class="form-group">
                                                            <label for="headline">Basic headline</label>
                                                            <textarea name="headline" id="" v-model="user_info.headline" rows="5" class="form-control"></textarea>
                                                        </div>
                                                </div>
                                                <div class="col l12">
                                                        <div class="form-group">
                                                            <label for="position">Current Position</label>
                                                        
                                                        <select name="position" required v-model="user_info.position" class="form-control custom-input"  >
                                                                <option value="" disabled selected>Select Position</option>
                                                                <option v-for="work in works" v-bind:value="work.work_id" v-bind:key="work.work_id" >
                                                                    {{work.title}} at {{work.company}}
                                                                </option>
                                                        </select>
                                                        </div>
                                                </div>
                                              
                                                <div class="divider"></div>
                                                <div class="col l6">
                                                        <div class="form-group">
                                                            <label for="loc">Location</label>
                                                            <input type="text" class="form-control custom-input" v-model="user_info.loc_id">
                                                        </div>
                                                </div>
                                                <div class="col l6">
                                                        <div class="form-group">
                                                            <label for="zip">Zip Code</label>
                                                            <input type="text" v-model="user_info.zipcode" class="form-control custom-input" name="zip" placeholder="Zip Code" required>
                                                        </div>
                                                </div>
                                                <div class="col l12">
                                                        <div class="form-group">
                                                            <label for="lname">Industry</label>
                                                        <select name="industry" required v-model="user_info.industry_id" class="form-control custom-input"  >
                                                                <option value="" disabled selected>Select Industry</option>
                                                                <option v-for="industry in industries" v-bind:value="industry.ind_id" v-bind:key="industry.ind_id">
                                                                    {{industry.ind_name}}
                                                                </option>
                                                        </select>
                                                        </div>
                                                </div>
                                                <div class="col l12">
                                                        <div class="form-group">
                                                            <label for="telno">Contact Number</label>
                                                            <input type="text" v-model="user_info.tel_no" class="form-control custom-input" name="telno" placeholder="Contact Number" required>
                                                        </div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="col l12">
                                                        <div class="form-group">
                                                            <label for="media">Youtube profile link </label>
                                                            <img src="img/youtube.PNG" alt="">
                                                            <input type="text" v-model="user_info.medialink" class="form-control custom-input" name="media" placeholder="Youtube.com" required>
                                                        </div>
                                                </div>
                                            </div>
                                            <!-- end or row -->
                                        
                                        </div>
                                        <div class="col l12 form-group">
                                            <button type="submit" class="waves-effect waves-green btn-flat blue white-text  float-right btn-block">Save basic information</button>
                                        </div>
                                </form>
                        </div>
                        
                    </div>
            </div>
            <!-- end of basic info -->
        </div>
        <!-- end of main div -->
</template>
<script>
    // document.title = 'Home | Vacancity';
     export default {
         data(){
            return {
                divInfo: false,
                divHome: false,
                work: {},
                industries: [],
                user_info :{},
                divBasic: false,
            }
        },
        created(){
           this.getInfo_basic();
        },
        methods :{
            getInfo_basic(){
                var app = this
                this.divload = true
                this.$http.get('/users_infos/'+this.$auth.user().slug_name)
                .then(response => {
                    if (response.data.data.length ===  0){
                        this.getWork();
                       // alert();
                    }else {
                        this.divBasic = false
                        this.divHome = true
                    }
                }, response => {
                })
            },
            getWork(){
                var app = this
                this.$http.get('/works/'+this.$auth.user().slug_name)
                .then(response => {
                    if (response.data.data.length ===  0){
                        this.divInfo = true
                        this.divHome = false
                        this.getIndustry();
                    }else {
                        this.divInfo = false
                        this.getIndustry();
                        //this.getInfo_basic();
                        this.divBasic = true
                    }
                    this.works = response.data.data;
                }, response => {
                })
            },
            getIndustry(){
                    var app = this
                    this.$http.get('/industries')
                    .then(response => {
                        this.industries = response.data.data;
                    }, response => {
                    })
                }, 
            SaveWork(){
                var app = this
                app.divload = true
                this.$http.post('/work/', this.work )
                .then(response => {
                    app.divload = false
                    M.toast({html: 'Work Experience Successfully added.', classes: 'rounded green'})
                    this.getWork();
                    this.getInfo_basic();
                }, response => {
                })
            },
            SaveInfo(){
                var app = this
                app.divload = true
                this.$http.post('/users_info' , this.user_info )
                .then(response => {
                    app.divload = false
                    this.getInfo_basic();
                    M.toast({html: 'Data Successfully saved.', classes: 'rounded blue'})
                }, response => {
                })
            },
        }
    }
</script>

