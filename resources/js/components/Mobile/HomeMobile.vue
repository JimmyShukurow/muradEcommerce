<template>
  <v-container >
    <v-sheet class="fullsize">
      <HeaderMobile :user="user" :categories="topmenus" />
    </v-sheet>
    <v-layout class="ma-2">
      <v-carousel cycle interval="2000" :show-arrows="false" height="150px" hide-delimiters>
        <InertiaLink as="v-carousel-item" v-for="(slide, id) in TopSlider" :key="id"
          :href="'/mobile/products/' + TopSlider[0].category_id">
          <v-sheet height="100%" tile>
            <v-row class="fill-height" align="center" justify="center">
              <div class="text-h2"></div>
              <v-img :src="slide.preview_image.original_url"></v-img>
            </v-row>
          </v-sheet>
        </InertiaLink>
      </v-carousel>
      <v-badge color="grey darken-4" bottom overlap offset-x="40" offset-y="40" :content="content"></v-badge>
    </v-layout>
    <v-sheet class="ma-2">
      <span class="font-weight-black"> Yeni Hizmetlerimizi Keşfet!</span>
    </v-sheet>
    <v-sheet class="ma-2">
      <v-row>
        <v-col cols="3">
          <v-card height="84px" class="pa-1">
            <v-img src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"></v-img>
          </v-card>
        </v-col>
        <v-col cols="3">
          <v-card height="84px" class="pa-1">
            <v-img src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"></v-img>
          </v-card>
        </v-col>
        <v-col cols="3">
          <v-card height="84px" class="pa-1">
            <v-img src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"></v-img>
          </v-card>
        </v-col>
        <v-col cols="3">
          <v-card height="84px" class="pa-1">
            <v-img src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"></v-img>
          </v-card>
        </v-col>
      </v-row>
    </v-sheet>
    <v-layout class="ma-2">
      <v-carousel cycle interval="2000" :show-arrows="false" height="250px" hide-delimiters>
        <InertiaLink as="v-carousel-item" v-for="(slide, id) in FirstSlider" :key="id"
          :href="'/mobile/products/' + FirstSlider[0].category_id">
          <v-sheet height="100%" tile>
            <v-row class="fill-height" align="center" justify="center">
              <v-img :src="slide.preview_image.original_url"></v-img>
            </v-row>
          </v-sheet>
        </InertiaLink>
      </v-carousel>
    </v-layout>
    <v-layout class="ma-2">
      <v-carousel cycle interval="2000" :show-arrows="false" height="250px" hide-delimiters>
        <InertiaLink as="v-carousel-item" v-for="(slide, id) in SecondSlider" :key="id"
          :href="'/mobile/products/' + SecondSlider[0].category_id">
          <v-sheet height="100%" tile>
            <v-row class="fill-height" align="center" justify="center">
              <v-img :src="slide.preview_image.original_url"></v-img>

            </v-row>
          </v-sheet>
        </InertiaLink>
      </v-carousel>
    </v-layout>
    <v-layout class="ma-2">
      <v-carousel cycle interval="2000" :show-arrows="false" height="250px" hide-delimiters>
        <InertiaLink as="v-carousel-item" v-for="(slide, id) in ThirdSlider" :key="id"
          :href="'/mobile/products/' + ThirdSlider[0].category_id">
          <v-sheet height="100%" tile>
            <v-row class="fill-height" align="center" justify="center">
              <v-img :src="slide.preview_image.original_url"></v-img>
            </v-row>
          </v-sheet>
        </InertiaLink>
      </v-carousel>
    </v-layout>
    <FooterMobile />
  </v-container>
</template>

<script>
import HeaderMobile from "./HeaderMobile.vue";
import FooterMobile from "./FooterMobile.vue";
import { InertiaLink } from "@inertiajs/inertia-vue";
import { Inertia } from "@inertiajs/inertia";
export default {
  props: ["user", "topmenus", "slides"],
  components: {
    HeaderMobile,
    FooterMobile,
    InertiaLink,
    Inertia
  },
  data: () => ({
    model: 0,
    colors: ["primary", "secondary", "yellow darken-2", "red", "orange"],
    content: "4/5",
    value: "home",
  }),
  computed: {
    TopSlider() {
      return this.slides.filter(
        (element) => element.slide_name === "TopSlider"
      );
    },
    FirstSlider() {
      return this.slides.filter(
        (element) => element.slide_name === "FirstSlider"
      );
    },
    SecondSlider() {
      return this.slides.filter(
        (element) => element.slide_name === "SecondSlider"
      );
    },
    ThirdSlider() {
      return this.slides.filter(
        (element) => element.slide_name === "ThirdSlider"
      );
    },
  },
};
</script>

<style scoped>
.textspacescloser {
  font-family: Arial, Helvetica, sans-serif;
  font-weight: 600;
  font-size: 0.75rem;
  letter-spacing: -0.5px;
}

.fullsize {
  position: relative;
  width: 100vw;
  margin-left: -50vw;
  left: 50%;
  margin-top: -4%;
  top: 4%;
}
</style>