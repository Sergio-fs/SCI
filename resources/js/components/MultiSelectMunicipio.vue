<template>
  <div>
    <basic-select :options="options"
                  :selected-option="item"
                  placeholder="Seleccione un municipio"
                  @select="onSelect">
    </basic-select>
    <input type="text" name="municipio" :value="item.value" hidden="true">
  </div>
</template>
 
<script>
  import { BasicSelect } from 'vue-search-select';
  import axios from 'axios';
  import VueAxios from 'vue-axios';
  Vue.use(VueAxios, axios);
 
  export default {
    mounted(){
      Vue.axios.get('https://SCI.test/GetMunicipios')
      .then((response)=>{
        this.options= response.data;
      })
    },
    data () {
      return {
        options:[],
        searchText: '', 
        item: {
          value: '',
          text: ''
        }
      }
    },
    methods: {
      onSelect (item) {
        this.item = item
      },
      reset () {
        this.item = {}
      },
      selectOption () {
        // select option from parent component
        this.item = this.options[0]
      }
    },
    components: {
      BasicSelect
    }
  }
</script> 