<template>
  <div>
    <v-sheet>
      <HeaderMobile :user="user" :categories="topmenus" />
    </v-sheet>
    <v-layout class="ma-2">
      <v-carousel
        v-model="model"
        :show-arrows="false"
        height="150px"
        hide-delimiters
      >
        <v-carousel-item v-for="(color, i) in colors" :key="color">
          <v-sheet :color="color" height="100%" tile>
            <v-row class="fill-height" align="center" justify="center">
              <div class="text-h2">Slide {{ i + 1 }}</div>
            </v-row>
          </v-sheet>
        </v-carousel-item>
      </v-carousel>
      <v-badge
        color="grey darken-4"
        bottom
        overlap
        offset-x="40"
        offset-y="40"
        :content="content"
      ></v-badge>
    </v-layout>
    <v-sheet class="ma-2">
      <span class="font-weight-black"> Yeni Hizmetlerimizi Keşfet!</span>
    </v-sheet>
    <v-sheet class="ma-2">
      <v-row>
        <v-col cols="3">
          <v-card height="84px" class="pa-1">
            <v-img
              src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
            ></v-img>
          </v-card>
        </v-col>
        <v-col cols="3">
          <v-card height="84px" class="pa-1">
            <v-img
              src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
            ></v-img>
          </v-card>
        </v-col>
        <v-col cols="3">
          <v-card height="84px" class="pa-1">
            <v-img
              src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
            ></v-img>
          </v-card>
        </v-col>
        <v-col cols="3">
          <v-card height="84px" class="pa-1">
            <v-img
              src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
            ></v-img>
          </v-card>
        </v-col>
      </v-row>
    </v-sheet>
    <v-layout>
      <v-carousel
        v-model="model"
        :show-arrows="false"
        height="250px"
        hide-delimiters
      >
        <v-carousel-item v-for="(color, i) in colors" :key="color">
          <v-sheet :color="color" height="100%" tile>
            <v-row class="fill-height" align="center" justify="center">
              <div class="text-h2">Slide {{ i + 1 }}</div>
            </v-row>
          </v-sheet>
        </v-carousel-item>
      </v-carousel>
    </v-layout>
     <v-layout>
      <v-carousel
        v-model="model"
        :show-arrows="false"
        height="250px"
        hide-delimiters
      >
        <v-carousel-item v-for="(color, i) in colors" :key="color">
          <v-sheet :color="color" height="100%" tile>
            <v-row class="fill-height" align="center" justify="center">
              <div class="text-h2">Slide {{ i + 1 }}</div>
            </v-row>
          </v-sheet>
        </v-carousel-item>
      </v-carousel>
    </v-layout>
     <v-layout>
      <v-carousel
        v-model="model"
        :show-arrows="false"
        height="250px"
        hide-delimiters
      >
        <v-carousel-item v-for="(color, i) in colors" :key="color">
          <v-sheet :color="color" height="100%" tile>
            <v-row class="fill-height" align="center" justify="center">
              <div class="text-h2">Slide {{ i + 1 }}</div>
            </v-row>
          </v-sheet>
        </v-carousel-item>
      </v-carousel>
    </v-layout>
    <FooterMobile/>
  </div>
</template>

<script>
import HeaderMobile from "./HeaderMobile.vue";
import FooterMobile from "./FooterMobile.vue";
import { Link } from "@inertiajs/inertia-vue";
export default {
  props:['user', 'topmenus'],
  components: {
    HeaderMobile,
    FooterMobile,
    Link
  },
  data: () => ({
    model: 0,
    colors: ["primary", "secondary", "yellow darken-2", "red", "orange"],
    content: "4/5",
    value: "home",
  }),
};
</script>

<style scoped>
.textspacescloser {
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 600;
    font-size: 0.75rem;
    letter-spacing: -0.5px;
}
</style>