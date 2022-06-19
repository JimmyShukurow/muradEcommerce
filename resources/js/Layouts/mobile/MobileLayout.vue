<template>
  <v-app>
    <v-layout>
      <v-main>
        <slot></slot>
      </v-main>
    </v-layout>
    <v-layout>
      <v-bottom-navigation v-model="value" app class="textspacescloser">
        <Link as="v-btn" href="/" value="home">
          <span class="textspacescloser">Home</span>

          <v-icon>mdi-home</v-icon>
        </Link>

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
        <Link as="v-btn" :class="{'orange white--text': $page.url === '/profile'}"  href="/profile" value="account">
          <span class="textspacescloser">Hesabim</span>

          <v-icon>mdi-account</v-icon>
        </Link>
      </v-bottom-navigation>
    </v-layout>
  </v-app>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
  components: {
    Link
  },
  data: () => ({
    items: [
      { title: "Dashboard", icon: "mdi-view-dashboard", route: "/admin" },
      { title: "Menus", icon: "mdi-book-open", route: "/menus" },
      { title: "Slides", icon: "mdi-image", route: "/slides" },
      { title: "Users", icon: "mdi-account", route: "/users" }
    ],
    right: null,
    value: 'account',
  })
};
</script>

<style>
.textspacescloser {
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 600;
    font-size: 0.75rem;
    letter-spacing: -0.5px;
}
</style>