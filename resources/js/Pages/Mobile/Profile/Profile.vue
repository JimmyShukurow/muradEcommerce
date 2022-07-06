<template>
  <MobileLayout>
    <v-container>
      <v-sheet class="mb-2">
        <h1>Hesabim</h1>
        <v-divider></v-divider>
      </v-sheet>
      <v-layout class="orange">
        <span class="text--orange">{{ $page.props.user.name}}</span>
      </v-layout>
    </v-container>
  </MobileLayout>
</template>

<script>
import MobileLayout from "../../../Layouts/mobile/MobileLayout.vue";
export default {
  components: {
    MobileLayout
  }
};
</script>

<style>
</style>