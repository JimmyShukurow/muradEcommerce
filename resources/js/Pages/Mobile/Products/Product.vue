<template>
  <MobileLayout>
    {{ product.name }}
  </MobileLayout>
</template>

<script>
import MobileLayout from "../../../Layouts/mobile/MobileLayout.vue";
export default {
  components: {
    MobileLayout,
  },
  props:['product']
};
</script>

<style>
</style>