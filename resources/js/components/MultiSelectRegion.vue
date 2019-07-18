<template>
  <div>
    <basic-select :options="options"
                  :selected-option="item"
                  placeholder="Seleccione una region"
                  @select="onSelect">
    </basic-select>
    <input type="text" name="region" :value="item.value" hidden="true">
  </div>
</template>
 
<script>
  import { BasicSelect } from 'vue-search-select';
  import axios from 'axios';
  import VueAxios from 'vue-axios';
  Vue.use(VueAxios, axios);
 
  export default {
    mounted(){
      Vue.axios.get('https://SCI.test/GetRegiones')
      .then((response)=>{
        this.options= response.data;
      })
    },
    data () {
      return {
        options:[],
        searchText: '', // If value is falsy, reset searchText & searchItem
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