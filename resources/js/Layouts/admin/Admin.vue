<template>
  <v-app>
    <v-layout>
      <v-navigation-drawer class="deep-purple accent-4" dark permanent>
        <v-layout>
          <Link href="/" as="span" class="white--text"> TurkmenYOL </Link>
        </v-layout>
        <v-list>
          <v-list-item v-for="item in items" :key="item.title" link>
            <Link as="v-list-item" :href="item.route">
              <v-list-item-icon>
                <v-icon>{{ item.icon }}</v-icon>
              </v-list-item-icon>

              <v-list-item-content>
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item-content>
            </Link>
          </v-list-item>
        </v-list>

        <template v-slot:append>
          <div class="pa-2">
            <v-btn block> Logout </v-btn>
          </div>
        </template>
      </v-navigation-drawer>
      <v-container fluid class="mt-5" >
        <v-card>
          <slot></slot>
        </v-card>
      </v-container>
    </v-layout>
  </v-app>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
  components: {
    Link,
  },
  data: () => ({
    items: [
      { title: "Dashboard", icon: "mdi-view-dashboard", route: "/admin" },
      { title: "Menus", icon: "mdi-book-open", route: "/menus" },
      { title: "Slides", icon: "mdi-image", route: "/slides" },
      { title: "Users", icon: "mdi-account", route: "/users" },
      { title: "Products", icon: "mdi-inbox-multiple", route: "/products" },

    ],
    right: null,
  }),
};
</script>

<style>
</style>