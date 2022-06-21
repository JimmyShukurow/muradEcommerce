<template>
  <v-layout>
    <v-bottom-navigation v-model="value" app class="textspacescloser">
      <v-btn value="home">
        <span class="textspacescloser">Home</span>

        <v-icon>mdi-home</v-icon>
      </v-btn>

      <v-btn value="fast">
        <span class="textspacescloser">Hemen Gelsin</span>

        <v-icon>mdi-moped</v-icon>
      </v-btn>

      <v-btn value="favorites">
        <span class="textspacescloser">Favorilerim</span>

        <v-icon>mdi-heart</v-icon>
      </v-btn>
      <v-btn value="basket">
        <span class="textspacescloser">Sepetim</span>

        <v-icon>mdi-cart</v-icon>
      </v-btn>
      <Link as="v-btn" href="/profile" value="account">
        <span class="textspacescloser">Hesabim</span>

        <v-icon>mdi-account</v-icon>
      </Link>
    </v-bottom-navigation>
  </v-layout>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
    components: {
        Link
    },
  data: () => ({
    value: "home"
  })
};
</script>

<style>
</style>