<template>
  <v-app>
    <v-layout>
      <v-main>
        <slot></slot>
      </v-main>
    </v-layout>
    <FooterMobile/>
  </v-app>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
import FooterMobile from "../../components/Mobile/FooterMobile.vue";
export default {
  components: {
    Link,
    FooterMobile
  },
  data: () => ({})
};
</script>

<style scoped>

</style>