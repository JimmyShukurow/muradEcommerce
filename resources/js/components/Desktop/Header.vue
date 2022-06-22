<template>
  <div>
    <header style="background-color: #f6f6f6">
      <div>
        <v-container>
          <v-row>
            <v-col cols="2">
              <span>TurkmenYOL</span>
            </v-col>
            <v-col cols="6" sm="6" row>
              <v-text-field
                dense
                flat
                solo
                append-icon="mdi-magnify"
                hide-details="auto"
                color="orange"
                filled
                outlined
                label="Gozle"
                clearable
                clear-icon="mdi-close"
              ></v-text-field>
            </v-col>
            <v-col align="right" class="pointer">
              <span v-if="auth">
                <v-menu offset-y>
                  <template v-slot:activator="{ on, attrs }">
                    <div v-bind="attrs" v-on="on">
                      <v-icon>mdi-account</v-icon>
                      <span >{{ auth.name }}</span>
                    </div>
                  </template>
                  <v-list>
                    <v-list-item>
                      <v-list-item-title>Profile</v-list-item-title>
                    </v-list-item>
                    <inertia-link href="/admin" as="v-list-item">
                      <v-list-item-title>Admin Panel</v-list-item-title>
                    </inertia-link>
                    <v-list-item>
                      <v-list-item-title @click="logoutUser()">Logout</v-list-item-title>
                    </v-list-item>
                  </v-list>
                </v-menu>
              </span>

              <span v-else @click="loginUser()">
                <v-icon>mdi-account</v-icon>Girish
                </span>
            </v-col>
            <v-col align="right">
              <v-icon>mdi-heart</v-icon>Favorilerim
            </v-col>
            <v-col align="right">
              <v-icon>mdi-basket</v-icon>Sepetim
            </v-col>
          </v-row>
          <div class="d-flex justify-space-between mt-5 ml-2 mr-2">
            <span
              v-for="(category, index) in categories"
              :key="index"
              class="topmenu pl-2 pr-2"
            >{{ category }}</span>
          </div>
        </v-container>
      </div>
      <v-divider></v-divider>
    </header>
    <Login />
  </div>
</template>

<script>
import axios from "axios";
import { bus } from "../../app";
import Login from "./LoginRegistration.vue";
import { InertiaLink } from "@inertiajs/inertia-vue";
export default {
  components: {
    Login,
    InertiaLink
  },
  props: ["user", "topmenus"],
  data: () => ({
    auth: null,
    categories: []
  }),
  methods: {
    loginUser() {
      bus.$emit("openLogin");
    },
    logoutUser() {
      axios.post("/logout").then((this.auth = null));
    }
  },
  created() {
    bus.$on("getUser", data => {
      this.auth = data;
    });

    this.categories = this.topmenus;
    this.auth = this.user;
  }
};
</script>

<style scoped>
.container {
  padding-bottom: 0;
}

.topmenu {
  border-bottom: 2px solid #ffffff;
}

.topmenu:hover {
  border-bottom: 2px solid red;
  color: red;
}

.pointer:hover {
  cursor: pointer;
}
</style>