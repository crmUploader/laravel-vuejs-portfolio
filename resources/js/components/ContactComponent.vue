<template>
  <div>
        <form class="conetact-form" id="contact-form" >
        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
          <div class="w3-half">
            <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name" v-model="form.name">
            <span>{{name}}</span>
          </div>
          <div class="w3-half">
            <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email" v-model="form.email">
            <span>{{email}}</span>
          </div>
        </div>
       <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
          <div class="w3-half">
            <input class="w3-input w3-border" type="text" placeholder="Mobile No" required name="Mobile_no" v-model="form.mobile_no">
            <span>{{mobile_no}}</span>
          </div>
        </div>
        <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message" v-model="form.message">
        <span>{{message}}</span>
        <button class="w3-button w3-black w3-right w3-section" type="button" v-on:click="submitDetails()">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE</button>
      </form>
  </div>
</template>

<script>
import axios from 'axios';
export default {
 data(){
       return{
            url_base: "http://localhost/laravel/laravel7/blog2/public/",
            form: {
                name: '',
                email: '',
                mobile_no: '',
                message: ''
            },
           name: '',
           email: '',
           mobile_no:'',
           message: '',
           success: ''
          }
    },
  
      methods:{
        responseMethods(response){
                  if(response.data.success==0){
                    this.name = response.data.message.name[0];
                    this.email = response.data.message.email[0];
                    this.mobile_no = response.data.message.mobile_no[0];
                    this.message = response.data.message.message[0];
                  }else{
                    this.name = "";
                    this.form.name = this.name;
                    this.email = "";
                    this.form.email = this.email;
                    this.mobile_no = "";
                    this.form.mobile_no = this.mobile_no;
                    this.message = "";
                    this.form.message = this.message;
                    //  flash('Post Request Added Created.', 'success');
                  }
        },
        submitDetails(){
            axios.post(this.url_base+'api/contact', this.form)
                  .then( 
                  function( response ){
                    this.responseMethods( response );
                }.bind(this)
                );
        }
    }
}
</script>

<style>

</style>