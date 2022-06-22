<template>
  <v-layout>
    <v-bottom-navigation app class="textspacescloser">
      <inertia-link as="v-btn" href="/" :class="{ 'orange white--text': $page.url === '/' }" >
        <span class="textspacescloser">Home</span>

        <v-icon>mdi-home</v-icon>
      </inertia-link>

      <inertia-link as="v-btn" >
        <span class="textspacescloser">Hemen Gelsin</span>

        <v-icon>mdi-moped</v-icon>
      </inertia-link>

      <inertia-link as="v-btn">
        <span class="textspacescloser">Favorilerim</span>

        <v-icon>mdi-heart</v-icon>
      </inertia-link>
      <inertia-link as="v-btn">
        <span class="textspacescloser">Sepetim</span>

        <v-icon>mdi-cart</v-icon>
      </inertia-link>
      <inertia-link as="v-btn" :href="profile"  :class="{ 'orange white--text': $page.url === profile }">
        <span class="textspacescloser">Hesabim</span>

        <v-icon>mdi-account</v-icon>
      </inertia-link>
    </v-bottom-navigation>
  </v-layout>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue";
export default {
    components: {
        InertiaLink
    },
  data: () => ({

  }),
  computed: {
    profile(){
      if(this.$page.props.user) return '/profile';
      else return '/mobileLogin';
    }
  }
};
</script>

<style scoped>
.textspacescloser {
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 600;
    font-size: 0.75rem;
    letter-spacing: -0.5px;
}
  .white {
    color:aliceblue
  }
</style>