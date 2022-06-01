<template>
  <v-app>
    <div v-if="isMobile()">
      <HomeMobile />
    </div>
    <div v-else>
      <Home />
    </div>
  </v-app>
</template>

<script>
import Home from "../components/Desktop/Home.vue";
import HomeMobile from "../components/Mobile/HomeMobile.vue";

export default {
  components: {
    Home,
    HomeMobile,
  },
  methods: {
    isMobile() {
      let width = document.documentElement.clientWidth;
      if (width < 480) return true;
      return false;
    },
  },
};
</script>

<style>
</style>