<template>
    <div class="">
            <div class="row">
                    <div class="col l8">
                        <div class="card">
                                <div class="card-content">
                                        <div class="user-block">
                                            <div class="" >
                                                <div class="">
                                                     <img src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="user image" class="img-profile img-bordered-sm">
                                                </div>
                                                <span class="float-right">
                                                        <button class="btn-floating  waves-effect waves-light white darken-2 btn-small tooltipped" data-position="bottom" data-tooltip="Edit Profile" v-on:click="editInfoModal">
                                                        <i class="material-icons blue-text">edit</i>
                                                        </button> 
                                                    </span>
                                                <div class="div-profile">
                                                    <h3 class="title-work"><a  class="job-title" v-on:click="editInfoModal">{{show_info.name}} {{show_info.lastname}}</a></h3> 
                                                    <h4 class="work-info">{{show_info.position}} at {{show_info.company}}</h4>
                                                </div>
                                            </div>

                                            <span class="float-left navbar-nav">
                                                <div class="">   
                                                    <div class="nav-item dropdown" >
                                                        <a class="nav-item nav-link mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span>
                                                                <button class="btn waves-effect waves-light blue darken-2 btn-small tooltipped" data-position="right" data-tooltip="Click to add credentials">
                                                                    <i class="fa fa-plus"></i> Add credentials
                                                                </button> 
                                                            </span> 
                                                        </a>
                                                        <div class="dropdown-menu  collection user-dropdown" aria-labelledby="navbarDropdown">
                                                            <div class="">
                                                                <a  class="collection-item">
                                                                    <button class="btn-floating  waves-effect waves-light blue darken-2 btn-small"  v-on:click="showModalWork('add')">
                                                                        <i class="material-icons">add</i>
                                                                    </button> 
                                                                    <span> Work Experience</span>
                                                                </a>
                                                                <a  class="collection-item">
                                                                    <button class="btn-floating  waves-effect waves-light blue darken-2 btn-small" v-on:click="showModalEduc('add')">
                                                                        <i class="material-icons">add</i>
                                                                    </button> 
                                                                    <span>Education</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </span>
                                        </div>
                                        <div class="divider"></div>   
                                         <span class="md-2">{{show_info.headline}} </span>
                                        <div class="divider"></div>

                                        <div >
                                            <div class="section-header">
                                                    <span class="info-title"> Work Experience</span>
                                                    <span class="float-right">
                                                        <button class="btn-floating  waves-effect waves-light white darken-2 btn-small tooltipped" data-position="bottom" data-tooltip="Add Work Experience" v-on:click="showModalWork('add')">
                                                        <i class="material-icons black-text">add</i>
                                                        </button> 
                                                    </span>
                                            </div>
                                            <div v-if="divWork">
                                                <h6 class="text-center">No data recorded. Add some more work information</h6>
                                                <div class="divider"></div>
                                            </div>
                                           <div class="div-work-main" v-for="work in works"  v-bind:key="work.work_id">
                                                <div class="work-logo">
                                                    <i class="material-icons medium blue-text">work</i>
                                                </div>
                                                <span class="float-right">
                                                        <button class="btn-floating  waves-effect waves-light white darken-2 btn-small tooltipped" data-position="bottom" data-tooltip="Edit Work" v-on:click="showModalWork(work)">
                                                        <i class="material-icons blue-text">edit</i>
                                                        </button> 
                                                    </span>
                                                <div class="div-work">
                                                    <h3 class="title-work"><a v-on:click="showModalWork(work)" class="">{{work.title}}</a></h3> 
                                                    <h4 class="work-info">{{work.company}}</h4>
                                                    <h4 class="work-info">{{work.from_month}} {{work.from_year}} - <span>{{work.to_month}} {{work.to_year}}</span></h4>
                                                    <div class="work-desc">
                                                        <span>{{work.description}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <!-- end work div -->
                                        <!-- educ div -->
                                        <div >
                                            <div class="section-header">
                                                    <span class="info-title"> Education</span>
                                                    <span class="float-right">
                                                        <button class="btn-floating  waves-effect waves-light white darken-2 btn-small tooltipped" data-position="bottom" data-tooltip="Add Educations" v-on:click="showModalEduc('add')">
                                                        <i class="material-icons black-text">add</i>
                                                        </button> 
                                                    </span>
                                            </div>
                                            <div v-if="divEduc">
                                                <h6 class="text-center">No data recorded. Add some more education information</h6>
                                                <div class="divider"></div>
                                            </div>
                                             <div class="div-work-main" v-for="education in educations"  v-bind:key="education.educ_id">
                                                <div class="work-logo">
                                                    <i class="material-icons medium grey-text">school</i>
                                                </div>
                                                <span class="float-right">
                                                        <button class="btn-floating  waves-effect waves-light white darken-2 btn-small tooltipped" data-position="bottom" data-tooltip="Edit Work" v-on:click="showModalEduc(education)">
                                                        <i class="material-icons blue-text">edit</i>
                                                        </button> 
                                                    </span>
                                                <div class="div-work">
                                                    <h3 class="title-work"><a  v-on:click="showModalEduc(education)">{{education.school_name}}</a></h3> 
                                                    <h4 class="work-info">{{education.degree}} , {{education.field_of_study}}</h4>
                                                    <h4 class="work-info"><span>{{education.from_year}} -  {{education.to_year}}</span></h4>
                                                    <div class="work-desc">
                                                        <span>{{education.description}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end educ div -->
                                </div>     
                        </div>
                    </div>
                    <div class="col l4">
                         <div class="collection">
                            <p class="collection-item active">
                                <span><button class="btn-floating  waves-effect waves-light blue darken-2 btn-small modal-trigger tooltipped"><i class="material-icons ">personal_video</i></button></span> 
                                <span >Personal Introduction</span>   
                                 
                            </p>
                            <div class="video-container">
                                <iframe width="853" height="480" :src="show_info.medialink" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <!-- <a href="">Update video setup</a> -->
                        </div>              
                    </div>

            </div>

            <!-- loader for function -->
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
            <!-- modals -->
                <div id="modProfile" class="modal modal-fixed-footer">
                    
                    <form @submit.prevent="SaveInfo">
                    <div class="modal-content">
                        <h5 class="modal-header-cus">Edit Info</h5>
                        <div class="divider"></div>
                            <div class="">
                                <div class="row" >
                                    <div class="col l6">
                                            <div class="form-group">
                                                <label for="fname">* First name</label>
                                                <input type="text" class="form-control custom-input" name="fname" placeholder="First name" v-model="user_info.name"  required>
                                            </div>
                                    </div>
                                    <div class="col l6">
                                            <div class="form-group">
                                                <label for="lname">* Last Name</label>
                                                <input type="text" class="form-control custom-input" name="lname" placeholder="Last name" v-model="user_info.lastname" required>
                                            </div>
                                    </div>
                                    <div class="col l12">
                                            <div class="form-group">
                                                <label for="headline">Basic Info</label>
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
                                    <div class="col l12">
                                            <div class="form-group">
                                                <label for="educ">Education</label>
                                               <select name="educ" required v-model="user_info.educ_id" class="form-control custom-input"  >
                                                    <option value="" disabled selected>Select Education</option>
                                                    <option v-for="education in educations" v-bind:value="education.educ_id" v-bind:key="education.educ_id">
                                                        {{education.school_name}}
                                                    </option>
                                               </select>
                                            </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="col l6">
                                            <div class="form-group">
                                                <label for="loc">Location</label>
                                                <input type="text" class="form-control custom-input"  v-model="user_info.loc_id">
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
                            

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="waves-effect waves-green btn-flat blue white-text ">Save</button>
                        <div  class=" modal-close waves-effect waves-green btn-flat  ">Close</div>
                    </div>
                    </form>
                </div>
                <!-- end of profile modal -->

                <!-- start of expi modal -->
                <div id="modExpi" class="modal modal-fixed-footer">
                    <form @submit.prevent="SaveWork">
                    <div class="modal-content">
                        <h5 class="modal-header-cus">Work Experience</h5>
                        <div class="divider"></div>
                            <div class="">
                                <div class="row" >
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
                                     
                                </div>
                                <!-- end or row -->
                             
                            </div>
                            

                    </div>
                    
                     <div class="modal-footer">
                        <div v-if="edit" class="waves-effect waves-green btn-flat black-text" @click="deleteWork(work.work_id)">Delete</div> 
                        <button type="submit" class="waves-effect waves-green btn-flat blue white-text ">Save</button>
                        <div  class=" modal-close waves-effect waves-green btn-flat  ">Close</div>
                    </div>
                    </form>
                </div>
                <!-- end of expi modal -->
                <!-- start of educ modal -->
                <div id="modEduc" class="modal modal-fixed-footer">
                    <form @submit.prevent="SaveEduc">
                    <div class="modal-content">
                        <h5 class="modal-header-cus">Education</h5>
                        <div class="divider"></div>
                            <div class="">
                                <div class="row" >
                                    <div class="col l12">
                                            <div class="form-group">
                                                <label for="school">* School</label>
                                                <input type="text" class="form-control custom-input" name="school" placeholder="Ex. La Salle" v-model="education.school_name"  required>
                                            </div>
                                    </div>
                                    <div class="col l12">
                                            <div class="form-group">
                                                <label for="Degree">* Degree</label>
                                                <input type="text" class="form-control custom-input" name="Degree" placeholder="Ex. Bachelor's" v-model="education.degree" required>
                                            </div>
                                    </div>
                                    <div class="col l12">
                                            <div class="form-group">
                                                <label for="study">* Field of Study</label>
                                                <input type="text" class="form-control custom-input" name="study" placeholder="Ex. Information Technology" v-model="education.field_of_study" required>
                                            </div>
                                    </div>
                                    <div class="col l6">
                                            <div class="form-group">
                                                <label for="from_month">* From </label>
                                               
                                               <select name="from_year" v-model="education.from_year" class="form-control custom-input" required>
                                                     <option value="" selected>Year</option>
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
                                               
                                               <select name="to_year" v-model="education.to_year" class="form-control custom-input" required>
                                                     <option value="" selected>Year</option>
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
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="" v-model="education.description"  rows="5" class="form-control"></textarea>
                                            </div>
                                    </div>
                                     
                                </div>
                                <!-- end or row -->
                             
                            </div>
                            

                    </div>
                    
                     <div class="modal-footer">
                        <div v-if="edit" class="waves-effect waves-green btn-flat black-text" @click="deleteEduc(education.educ_id)">Delete</div> 
                        <button type="submit" class="waves-effect waves-green btn-flat blue white-text ">Save</button>
                        <div  class=" modal-close waves-effect waves-green btn-flat  ">Close</div>
                    </div>
                    </form>
                </div>
                <!-- end of educ modal -->

            <!-- end of modal -->
    </div>
</template>
<script>
    export default {
         data(){
            return {
             
             showModal: false,
             divload: false,
             divEduc:false,
             divWork:false,
                user_info :{
                    info_id: '',
                    headline: '',
                },
                show_info:{
                    name : '',
                    lastname :'',
                    headline :'',
                    medialink : '',
                    position :'',
                    company : ''
                },
                work :{
                    work_id: '',
                    title: '',
                    company:''
                },
                education :{
                    title: '',
                    company:''
                },
                industries: [],
                works: [],
                educations:[],

                edit:false
            }
        },
        created(){
           this.getWork();
           this.showInfo_basic();
           this.getEducations();
          //alert(this.$route.params.slug);
        },
        mounted: function(){
            // console.log('Instance mounted');
            $('.modal').modal();
            $('.tooltipped').tooltip();
        },
         methods: {
                SaveInfo(){
                    var app = this
                    app.divload = true
                    this.$http.put('/users_info/'+this.user_info.info_id , this.user_info )
                    .then(response => {
                        app.divload = false
                        $('#modProfile').modal('close');
                        this.showInfo_basic();
                        M.toast({html: 'Data Successfully saved.', classes: 'rounded blue'})
                    }, response => {
                    })
                },
                editInfoModal: function(){
                    $('.modal').modal({dismissible:false});
                    $('#modProfile').modal('open');
                    
                    this.getInfo();
                    this.getIndustry();
                },
                getInfo(){
                    var app = this
                    this.$http.get('/users_infos/'+this.$route.params.slug)
                    .then(response => {
                        this.user_info.info_id =   response.data.data[0].id;
                        this.user_info.headline = response.data.data[0].headline;
                        this.user_info.position = response.data.data[0].position_id;
                        this.user_info.educ_id = response.data.data[0].educ_id;
                        this.user_info.loc_id = response.data.data[0].loc_id;
                        this.user_info.lastname = response.data.data[0].lastname;
                        this.user_info.name = response.data.data[0].name;
                        this.user_info.zipcode = response.data.data[0].zipcode;
                        this.user_info.tel_no = response.data.data[0].tel_no;
                        this.user_info.industry_id = response.data.data[0].industry_id;
                        this.user_info.medialink = response.data.data[0].medialink;
                    }, response => {
                    })
                },
                showInfo_basic(){
                    var app = this
                    this.$http.get('/users_infos/'+this.$route.params.slug)
                    .then(response => {
                        this.show_info.headline = response.data.data[0].headline;
                        this.show_info.lastname = response.data.data[0].lastname;
                        this.show_info.name = response.data.data[0].name;
                        this.show_info.medialink = "//www.youtube.com/embed/"+response.data.data[0].medialink+"?rel=0";
                        this.show_info.position = response.data.data[0].position;
                        this.show_info.company = response.data.data[0].company;
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
                getWork(){
                    var app = this
                    this.$http.get('/works/'+this.$route.params.slug)
                    .then(response => {
                        if (response.data.data.length ===  0){
                           this.divWork = true
                        }else {
                            this.divWork = false
                        }
                        this.works = response.data.data;
                    }, response => {
                    })
                },
                getEducations(){
                    var app = this
                    this.$http.get('/educations/'+this.$route.params.slug)
                    .then(response => {
                        if (response.data.data.length ===  0){
                           this.divEduc = true
                        }else {
                            this.divEduc = false
                        }
                        this.educations = response.data.data;
                    }, response => {
                    })
                },
                showModalWork: function(event){
                    if (event === "add"){
                        $('.modal').modal({dismissible:false});
                        $('#modExpi').modal('open');
                        this.getIndustry();
                        this.edit = false
                    }else {

                        $('.modal').modal({dismissible:false});
                        $('#modExpi').modal('open');
                        this.getIndustry();
                        this.edit =true;
                        this.work.work_id = event.work_id;
                        this.work.title = event.title;
                        this.work.company = event.company;
                        this.work.location = event.location;
                        this.work.from_year = event.from_year;
                        this.work.from_month = event.from_month;
                        this.work.to_month = event.to_month;
                        this.work.to_year = event.to_year;
                        this.work.industry = event.industry;
                        this.work.description = event.description;
                    }
                },
                 showModalEduc: function(event){
                    if (event === "add"){
                        $('.modal').modal({dismissible:false});
                        $('#modEduc').modal('open');
                        this.edit = false
                    }else {

                        $('.modal').modal({dismissible:false});
                        $('#modEduc').modal('open');
                        this.edit =true;

                        this.education.educ_id = event.educ_id;
                        this.education.school_name = event.school_name;
                        this.education.degree = event.degree;
                        this.education.field_of_study = event.field_of_study;
                        this.education.from_year = event.from_year;
                        this.education.to_year = event.to_year;
                        this.education.description = event.description;
                    }
                },
                deleteWork(id){
                    var app = this
                    app.divload = true
                    this.$http.delete('/work/'+id )
                    .then(response => {
                        app.divload = false
                        $('#modExpi').modal('close');
                        M.toast({html: 'Work Experience deleted.', classes: 'rounded red'})
                        this.getWork();
                    }, response => {
                    })
                },
                deleteEduc(id){
                    var app = this
                    app.divload = true
                    this.$http.delete('/education/'+id )
                    .then(response => {
                        app.divload = false
                        $('#modEduc').modal('close');
                        M.toast({html: 'Education Experience deleted.', classes: 'rounded red'})
                        this.getEducations();
                    }, response => {
                    })
                },
                SaveWork(){
                    var app = this
                    app.divload = true
                    if (this.edit === false){

                        this.$http.post('/work/', this.work )
                        .then(response => {
                            app.divload = false
                            $('#modExpi').modal('close');
                            M.toast({html: 'Work Experience Successfully added.', classes: 'rounded green'})
                            this.getWork();
                        }, response => {
                        })

                    }else{

                        this.$http.put('/work/'+this.work.work_id , this.work )
                        .then(response => {
                            app.divload = false
                            $('#modExpi').modal('close');
                            M.toast({html: 'Work Experience Successfully saved.', classes: 'rounded blue'})
                            this.getWork();
                        }, response => {
                        })
                    }
                    
                },
                SaveEduc(){
                    var app = this
                    app.divload = true
                    if (this.edit === false){

                        this.$http.post('/education/', this.education )
                        .then(response => {
                            app.divload = false
                            $('#modEduc').modal('close');
                            M.toast({html: 'Education Successfully added.', classes: 'rounded green'})
                            this.getEducations();
                        }, response => {
                        })

                    }else{

                        this.$http.put('/education/'+this.education.educ_id , this.education )
                        .then(response => {
                            app.divload = false
                            $('#modEduc').modal('close');
                            M.toast({html: 'Education Successfully saved.', classes: 'rounded blue'})
                            this.getEducations();
                        }, response => {
                        })
                    }
                    
                },
                getPosition(){
                    var app = this
                    this.$http.get('/users_infos')
                    .then(response => {
                        
                    }, response => {
                    })
                },
        },
    }
</script>
