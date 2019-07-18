<template>
  <div class="row"> 
    <div class="col">
      <a href="#" class="btn btn-alert" v-on:click="isHidden = !isHidden">Cambiar Municipio-Region / solo Region</a>
    </div>
    <div class="col" v-if="isHidden">
      <label class="col-form-label">Municipio - Cabecera Municipal - Region</label>
      <select-municipio-component></select-municipio-component> 
    </div>
    <div class="col"v-if="!isHidden">
      <label class="col-form-label">Region</label>
      <select-region-component></select-region-component> 
    </div>
  </div>
</template>
 
<script>
  export default {
    mounted(){
    },
    data:  function() {
      return{
        isHidden: false,
      }
    },
    methods: {
    }
  }
</script> 