<template>
  <div class="hello">    
    <picture-input 
      ref="pictureInput" 
      @change="onChange" 
      width="150" 
      height="200" 
      margin="16" 
      accept="image/jpeg,image/png" 
      size="8"
      name="foto" 
      buttonClass="btn"
      :customStrings="{
        upload: '<h1>Bummer!</h1>',
        drag: 'Arrastra un archivo o haz click para seleccionar'
      }">
    </picture-input>
  </div>
</template>

<script>
  import PictureInput from 'vue-picture-input'
   
  export default {
    name: 'app',
    data () {
      return {
      }
    },
    components: {
      PictureInput
    },
    methods: {
      onChange (image) {
        console.log('Nueva imagen seleccionada')
        if (image) {
          console.log('Imagen cargada')
          this.image = image
        } else {
          console.log('FileReader API not supported: use the <form>, Luke!')
        }
      }
    }
  }
</script>