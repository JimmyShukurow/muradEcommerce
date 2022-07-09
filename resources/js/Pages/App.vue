<template>
  <v-app>
    <div v-if="isMobile()">
      <HomeMobile :user = "user" :topmenus = "topmenus" :slides = "slides"/>
    </div>
    <div v-else>
      <Home :user = "user" :topmenus = "topmenus" />
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
  props: ['user', 'topmenus', 'slides'],

  methods: {
    isMobile() {
      let width = document.documentElement.clientWidth;
      if (width < 768) return true;
      return false;
    },
  },
};
</script>

<style>
</style>