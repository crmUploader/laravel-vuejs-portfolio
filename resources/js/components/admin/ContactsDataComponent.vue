<template>
    <div> 
    <table border>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <tr v-for="item in contactsResult" :key="item.id">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.email}}</td>
                <td>{{item.mobile_no}}</td>
                <td>{{item.message}}</td>
                <td>
                    <button v-on:click="edit_item(item.id)">Edit</button>
                    <button v-on:click="delete_item(item.id)">Delete</button>
                </td>
        </tr>
        </tbody>
        <tfoot>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Mobile</td>
                <td>Message</td>
                <td>Action</td>
            </tr>
        </tfoot>
    </table>
    
<div v-if="showModal">
    <transition name="modal">
        
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" @click="showModal=false">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Modal title</h4>
              </div>
              <div class="modal-body">
                   <div class="form-group">
                    <label class="control-label col-sm-2" for="name">name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  placeholder="Enter name" :value="form.name" @change="onChangeName">
                        {{name}}
                    </div>
                    </div>
                 
                   <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter email" :value="form.email" @change="onChangeEmail">
                       {{email}}
                    </div>
                    </div>
                 
                   <div class="form-group">
                    <label class="control-label col-sm-2" for="mobile_no">mobile_no:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter mobile_no" :value="form.mobile_no" @change="onChangeMobile">
                       {{mobile_no}}
                    </div>
                    </div>
                 
                   <div class="form-group">
                    <label class="control-label col-sm-2" for="message">message:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  placeholder="Enter message" name="message" :value="form.message" @change="onChangeMessage">
                        {{message}}
                    </div>
                    </div>

                 
                    <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button v-on:click="updateContact(form.id)" class="btn btn-default">Submit</button>
                    </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>


  
    </div>
</template>

<script>
import axios from 'axios';
export default {

    data(){
        return {
            url_base: "http://localhost/laravel/laravel7/blog2/public/",
            contactsResult: [],
            showModal: false,
            contactResult: [],
            form:{
                name : "",
                email : "",
                mobile_no : "",
                message : ""
            },
                name : '',
                email : '',
                mobile_no : '',
                message : '',
       
        }  
    },
    created(){
    //    this.get_fetch_method();
            var my_url = this.url_base+"api/contact/get_contacts/";
            const headers = {"Content-Type":"application/json"};
            fetch(my_url,{headers})
            .then(response=>response.json())
            .then(data=>(this.contactsResult=data));
     },
     methods:{
         onChangeName (e) {
            this.form.name = e.target.value
         },
         onChangeEmail (e) {
            this.form.email = e.target.value
         },
         onChangeMobile (e) {
            this.form.mobile_no = e.target.value
         },
         onChangeMessage (e) {
            this.form.message = e.target.value
         },
         edit_item: function(ele){
            var my_url = this.url_base+"api/contact/get_contacts/"+ele;
            const self = this;
            axios.get(my_url).then(res=>{
              this.form = res.data
            });
                // .then(data=>(this.contactResult=data));
                this.showModal = true;
         },
         updateContact: function(ele){
               const self = this;
            axios.post(this.url_base+"api/contact/"+ele,this.form)
                 .then(function(response){
                    if(response.data.success == 1){
                        // this.phones.splice(ele, 1, updatedPhone)
                        self.showModal = false;
                        location.reload();
                    }  else if(response.data.success == 0){
                        self.name       = response.data.message.name[0];
                        self.email      = response.data.message.email[0];
                        self.mobile_no  = response.data.message.mobile_no[0];
                        self.message    = response.data.message.message[0];
                    }
                 })
         },
         delete_item: function(ele){
            if(confirm('are you sure to delete this record')){
                   const self = this;
            axios.delete(this.url_base+"api/contact/delete/"+ele,this.form)
                 .then(function(response){
                    if(response.data == 1){
                       location.reload();
                    }  
                 })
            }
         }
     }
}

</script>

<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}
/* 
.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
} */
.modal-body{
    height: 300px;
}
.modal-body .form-group{
    margin-top:10px;
}
</style>