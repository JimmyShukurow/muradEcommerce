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
import FooterMobile from "../../components/Mobile/FooterMobile.vue";
export default {
  components: {
    FooterMobile
  },
  data: () => ({})
};
</script>

<style scoped>

</style>