<template>
  <v-layout>
    <v-bottom-navigation app grow>
      <InertiaLink as="v-btn" :class="{'orange white': $page.url === '/'}" href="/">
        <span class="textspacescloser" value="home">{{$t('Home')}}</span>

        <v-icon>mdi-home</v-icon>
      </InertiaLink>

      <InertiaLink as="v-btn">
        <span class="textspacescloser">{{$t('Fast Delivery')}}</span>

        <v-icon>mdi-moped</v-icon>
      </InertiaLink>

      <InertiaLink as="v-btn" href="/favorites" :class="{ 'orange': $page.url === '/favorites' }">
        <span class="textspacescloser">{{$t('Favorites')}}</span>

        <v-icon>mdi-heart</v-icon>
      </InertiaLink>
      <InertiaLink as="v-btn" href="/basket" :class="{ 'orange': $page.url === '/basket' }" >
        <span class="textspacescloser">{{$t('My Basket')}}</span>

        <v-icon>mdi-cart</v-icon>
      </InertiaLink>
      <InertiaLink
        as="v-btn"
        :href="profile"
        :class="{ 'orange': $page.url === profile }"
      >
        <span class="textspacescloser">{{$t('Profile')}}</span>

        <v-icon>mdi-account</v-icon>
      </InertiaLink>
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
    profile() {
      if (this.$page.props.user) return "/profile";
      else return "/mobileLogin";
    }
  },
  methods: {
   
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
  text-decoration-color: aliceblue !important;
}
</style>