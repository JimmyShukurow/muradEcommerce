<template>
  <v-app>
    <v-layout>
      <v-main>
        <slot></slot>
      </v-main>
    </v-layout>
    <MobileLanguage  class="lang"/>
    <FooterMobile />
  </v-app>
</template>

<script>
import FooterMobile from "../../components/Mobile/FooterMobile.vue";
import MobileLanguage from "../../components/MobileLanguage.vue";
export default {
  components: {
    FooterMobile,
    MobileLanguage,
  },
  data: () => ({})
};
</script>

<style scoped>
.lang {
  position: fixed;
  bottom: 80px;
  right: 15px;
  z-index: 10;
}
main {
  max-width: 100vw;
}
</style>