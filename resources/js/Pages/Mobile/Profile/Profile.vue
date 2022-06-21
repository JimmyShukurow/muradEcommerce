<template>
  <MobileLayout >
    <v-layout class="orange">
      <span class="text--orange"> {{ $page.props.user.name}}</span>
    </v-layout>
  </MobileLayout>
</template>

<script>
import MobileLayout from '../../../Layouts/mobile/MobileLayout.vue'
export default {
  components: {
    MobileLayout
  }

}
</script>

<style>

</style>