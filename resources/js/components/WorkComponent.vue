<template>
        <div class="w3-row-padding w3-center">
            <div class="w3-col m3"  v-for="item in work_data" :key="item.id">
            <img :src="item.image" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" :alt="item.name">
            </div>
        </div>
</template>

<script>

export default {
      data(){
        return{
          url_base: "http://localhost/laravel/laravel7/blog2/public/",
          work_data:[]
        }
      },
      created() {
        const headers = { "Content-Type": "application/json" };
        fetch(this.url_base+"api/work", { headers })
           .then(response => response.json())
           .then(data => (this.work_data=data));
        }
    }
</script>

<style>
.w3-col{margin:10px;}
.w3-row-padding{margin-left:150px;}
</style>