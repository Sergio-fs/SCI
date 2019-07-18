<template>
    <div class="row"> 
        <div class="col">
            <button class="btn btn-primary" v-on:click="isHidden = !isHidden">Toggle hide and show</button>   
        </div>
        <div class="col"v-if="isHidden">
          <label class="col-form-label">'Region</label>
          <select-region-component></select-region-component> 
        </div>
        <div class="col" v-if="!isHidden">
          <label class="col-form-label">Municipio - Cabecera Municipal - Region</label>
          <select-municipio-component></select-municipio-component> 
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            isHidden: false
        }
    }
</script>