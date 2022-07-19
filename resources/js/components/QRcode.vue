<template>
  <div>
    <qrcode-vue :value="url" :size="size" level="H"></qrcode-vue>
  </div>
</template>
<script>
  import QrcodeVue from 'qrcode.vue'
 
  export default {
    props:["url"],
    data() {
      return {
        size: 250,
      }
    },
    components: {
      QrcodeVue,
    },
  }
</script> 