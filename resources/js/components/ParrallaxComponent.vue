<template>
<div>
  <!-- First Parallax Image with Logo Text -->
   <!-- style="background-image: url('https://www.w3schools.com/w3images/parallax1.jpg');" -->
        <div v-bind:style="{backgroundImage:'url('+site_data.header_img+')'}" class="bgimg-1 w3-display-container w3-opacity-min" id="home">
        <div class="w3-display-middle" style="white-space:nowrap;">
          <img :src="site_data.website_logo" class="logo_image">
        </div>
        </div>
</div>
</template>
<script>
    export default {
      data(){
        return{
          url_base: "http://localhost/laravel/laravel7/blog2/public/",
          site_data:{}
        }
      },
      created() {
        const headers = { "Content-Type": "application/json" };
        fetch(this.url_base+"api/web", { headers })
           .then(response => response.json())
           .then(data => (this.site_data=data));
        }
    }
    
</script>


<style>
.logo_image{width:200px;}
</style>