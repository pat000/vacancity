<template>
    <div >
        <div class="row">
            <div class="col l3">
                <div class="card">
                    <span class="msg-title"> Messaging
                         <span class="float-right">
                            <button class="btn-floating  waves-effect waves-light white darken-2 btn-small tooltipped" data-position="bottom" data-tooltip="Add Educations" v-on:click="showModalWork('add')">
                            <i class="material-icons black-text">add</i>
                            </button> 
                        </span>
                    </span>
                    <div class="msg-divsearch">
                        <input type="text" class="form-control custom-input msg-search" placeholder="Search">
                    </div>
                    <div class="user-block msg-main">
                        <div class="msg-prof-img">
                            <img class="circle img-bordered-sm msg-prof-img_main" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="user image">
                        </div>
                        <div class="msg-content">
                            <span class="username">
                                <a href="#">Jonathan Burke Jr.</a>
                                <span class="msg-time pull-right"> June 14</span>
                            </span>
                            <span class="msg-text">
                                asdasd
                            </span>
                        </div>
                            
                    </div>

                    <div class="user-block msg-main">
                        <div class="msg-prof-img">
                            <img class="circle img-bordered-sm msg-prof-img_main" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="user image">
                        </div>
                        <div class="msg-content">
                            <span class="username">
                                <a href="#">Jonathan Burke Jr.</a>
                                <span class="msg-time pull-right"> June 14</span>
                            </span>
                            <span class="msg-text">
                                asdasd
                            </span>
                        </div>
                            
                    </div>
                   
                </div>
            </div>
            <div class="col l6">
                <div class="card">

                </div>
            </div>
            <div class="col l3">
                <div class="card">

                </div>
            </div>
        </div>
    </div>
</template>
