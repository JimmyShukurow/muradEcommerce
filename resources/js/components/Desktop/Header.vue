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
            <v-col align="right" @click="login" class="pointer">
              <v-icon>mdi-account</v-icon>
              Girish
            </v-col>
            <v-col align="right">
              <v-icon>mdi-heart</v-icon>
              Favorilerim
            </v-col>
            <v-col align="right">
              <v-icon>mdi-basket</v-icon>
              Sepetim
            </v-col>
          </v-row>
          <div class="d-flex justify-space-between mt-5 ml-2 mr-2">
            <span
              v-for="(topmenu, index) in topmenus"
              :key="index"
              class="topmenu pl-2 pr-2"
            >
              {{ topmenu }}
            </span>
          </div>
        </v-container>
      </div>
      <v-divider></v-divider>
    </header>
    <Login />
  </div>
</template>

<script>
import { bus } from "../../app";
import Login from "./LoginRegistration.vue";
export default {
  components: {
    Login,
  },
  data: () => ({
    topmenus: [
      "kadin",
      "cocuk",
      "ev & eshya",
      "SuperMarket",
      "Kozmetik",
      "Cop",
      "elektronik",
      "BIlgisayar",
      "telefon",
    ],
  }),
  methods: {
    login() {
      bus.$emit("openLogin")
    },
  },
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