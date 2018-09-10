<template>
    <div class="row">
           
            <div class="card col s12">
                <div class="container-fluid pad-2">

                    <div class="text-center">
                        <span class="info-title text-center">Post a job: create a oppurtunity to the people</span>
                    </div>
                    <div class="row">
                        <form @submit.prevent="SaveJob" class="">
                            <div class="col s12 l6">
                                <div class=" form-group col s12">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control custom-input" placeholder="Company Name" v-model="job.company" required>
                                </div>

                                <div class=" form-group col s12">
                                    <label for="Postion">Postion</label>
                                    <input type="text" class="form-control custom-input" placeholder="Postion Desired"  v-model="job.position" required>
                                </div>
                                <div class=" form-group col s12">
                                    <label for="Industry">Company industry</label>
                                    <input type="text" class="form-control custom-input" placeholder="Industry"  v-model="job.company_industry" required>
                                </div>
                                 <div class=" form-group col s12">
                                    <label for="Function">Job Function</label>
                                    <input type="text" class="form-control custom-input" placeholder="Function "  v-model="job.job_function" required>
                                </div>
                                

                                <div class=" form-group col s12">
                                    <label for="Location">Location</label>
                                    <input type="text" class="form-control custom-input" placeholder="Location "  v-model="job.location" required>
                                </div>
                               
                            </div>
                            <div class="col s12 l6">
                                <div class=" form-group col s6">
                                    <label for="Location">Employment type</label>
                                    <select name="" id="" class="form-control custom-input"  v-model="job.employment_type">
                                        <option value="">Choose one option...</option>
                                        <option selected="">Full-time</option>
                                        <option>Part-time</option>
                                        <option>Contract</option>
                                        <option>Temporary</option>
                                        <option>Volunteer</option>
                                        <option>Internship</option>
                                    </select>
                                    
                                </div>
                                 <div class=" form-group col s6">
                                    <label for="Location">Experience level</label>
                                    <select name="" id="" class="form-control custom-input"  v-model="job.senority_level">
                                        <option value="">Choose one option...</option>
                                        <option >Internship</option>
                                        <option>Entry level</option>
                                        <option>Associate</option>
                                        <option>Mid-Senior level</option>
                                        <option>Director</option>
                                        <option selected="">Executive</option>
                                    </select>
                                </div>
                                <div class=" form-group col s6">
                                    <label for="">Degree </label>
                                    <select name="" id="" class="form-control custom-input" required  v-model="job.degree">
                                        <option value="">Choose one option...</option>
                                        <option >Bachelors</option>
                                        <option>Masters</option>
                                    </select>
                                </div>

                                <div class=" form-group col s6">
                                    <label for="">Year of Experience </label>
                                    <input type="number" class="form-control custom-input" min="1" max="30" required   v-model="job.expi_level" >
                                </div>
                                <div class=" form-group col s12 ">
                                    <label for="">Job Description</label>
                                    <textarea name="description"  rows="6" class="form-control" required  v-model="job.job_description"></textarea>
                                </div>
                                <div class="col s12">
                                    <div class="nav-item dropdown float-left" >
                                        <a class="nav-item" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span>
                                                <button class="btn waves-effect waves-light blue darken-2 btn-small tooltipped" data-position="right" data-tooltip="Click to add credentials">
                                                  Job Settings  <i class="fa fa-angle-down"></i>
                                                </button> 
                                            </span> 
                                        </a>
                                        <div class="dropdown-menu  collection user-dropdown" aria-labelledby="navbarDropdown">
                                            <div class="">
                                                <a  class="collection-item">
                                                    <div class="btn-job-setting">
                                                        <button class="btn-floating  waves-effect waves-light blue darken-2 btn-small" >
                                                            <i class="fa fa-globe"></i>
                                                        </button> 
                                                    </div>
                                                    <div>
                                                        <span> Public post</span>
                                                        <br>
                                                        <small>Everyone will see this posting</small> 
                                                    </div>
                                                    
                                                </a>
                                                <a  class="collection-item">
                                                   <div class="btn-job-setting">
                                                        <button class="btn-floating  waves-effect waves-light blue darken-2 btn-small" >
                                                            <i class="fa fa-lock"></i>
                                                        </button> 
                                                    </div>
                                                    <div>
                                                        <span> Private post</span>
                                                        <br>
                                                        <small>Only your network will see this posting</small> 
                                                    </div>
                                                    
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="float-right btn waves-effect waves-light light-blue darken-4">
                                        Proceed
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- end of col 12 -->
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
    </div>
    
</template>
<script>
     export default {
        data(){
            return {    
                job:{},
                edit:false,
                divload:false,
            }
        },
        mounted: function(){
           // alert();
        },
        methods:{
                 SaveJob(){
                    var app = this
                    app.divload = true
                    if (this.edit === false){
                        this.$http.post('/job/', this.job )
                        .then(response => {
                            app.divload = false
                            M.toast({html: 'Job Successfully posted.', classes: 'rounded green'})
                        }, response => {
                        })

                    }else{

                    }
                    
                },
        }

     }
</script>
