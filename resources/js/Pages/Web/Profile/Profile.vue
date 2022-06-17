<template>
  <app-layout>
    <v-container fluid class="orange pa-5">
      <v-row>
        <span class="orange--text text--lighten-5">
          <!-- <b>{{ $page.props.user.name }}</b> -->
        </span>
        <v-spacer></v-spacer>
        <v-icon  dark >mdi-bell-circle-outline</v-icon>
      </v-row>
    </v-container>
  </app-layout>
</template>

<script>
import AppLayout from "../../../Layouts/mobile/MobileLayout.vue";
export default {
  components: {
    AppLayout
  }
};
</script>

<style>
</style>