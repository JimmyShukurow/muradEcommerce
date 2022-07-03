<template>
  <v-app class="admin-layout">
    <v-layout>
      <v-navigation-drawer class="deep-purple accent-4" dark permanent>
        <v-layout>
          <inertia-link href="/" as="a" class="white--text mx-auto my-5">TurkmenYOL</inertia-link>
        </v-layout>
        <v-list>
          <v-list-item v-for="item in items" :key="item.title" link>
            <inertia-link as="v-list-item" :href="item.route">
              <v-list-item-icon>
                <v-icon>{{ item.icon }}</v-icon>
              </v-list-item-icon>

              <v-list-item-content>
                <v-list-item-title>{{ $t(item.title) }}</v-list-item-title>
              </v-list-item-content>
            </inertia-link>
          </v-list-item>
        </v-list>

        <template v-slot:append>
          <div class="pa-2">
            <v-btn  @click="logout()" block>Logout</v-btn>
          </div>
        </template>
      </v-navigation-drawer>
      <v-container fluid class="mt-5">
        <v-app-bar
          color="deep-purple accent-4"
          dark
          prominent
          outlined
          rounded
        >
          <v-toolbar-title>Admin Panel</v-toolbar-title>

          <v-spacer></v-spacer>
          <Language/>
        </v-app-bar>
        <v-card class="mx-2">
          <slot></slot>
        </v-card>
      </v-container>
    </v-layout>
  </v-app>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue";
import Language from "../../components/Language.vue"
export default {
  components: {
    InertiaLink,
    Language
  },
  data: () => ({
    items: [
      { title: "Dashboard", icon: "mdi-view-dashboard", route: "/admin" },
      { title: "Menus", icon: "mdi-book-open", route: "/menus" },
      { title: "Slides", icon: "mdi-image", route: "/slides" },
      { title: "Users", icon: "mdi-account", route: "/users" },
      { title: "Products", icon: "mdi-inbox-multiple", route: "/products" },
      { title: "Roles", icon: "mdi-account-details", route: "/roles" },
      { title: "Settings", icon: "mdi-cog", route: "/settings" },

    ],
    
    right: null
  }),
  methods: {
    logout(){
       let afterRequest = {
        onSuccess: () => {},
        onError: () => {}
      };
      this.$inertia.post("/logout", {}, afterRequest);
    }
  }
  
};
</script>

<style scoped>
.admin-layout a {
  text-decoration: none;
  max-height: 100vh;
}
</style>