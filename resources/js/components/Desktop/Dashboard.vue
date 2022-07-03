<template>
  <v-layout class="ma-2" >
    <v-card class="ma-5" height="200px" width="30%">
      <v-row class="ma-1" align="center" justify="center">
        Users
        <v-spacer></v-spacer>
        <Link href="/"> <v-btn>back to home </v-btn> </Link>
      </v-row>
    </v-card>
    <v-card class="ma-5" height="200px" width="30%">
      <v-spacer></v-spacer>
      <Link href="/"> <v-btn>back to home </v-btn> </Link>
    </v-card>
  </v-layout>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";

export default {
  components: {
    Link,
  },
};
</script>

<style>
</style>