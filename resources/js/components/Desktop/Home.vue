<template>
  <div>
    <div class="sticky">
      <Header :user = "user"/>
    </div>
    <Slider />
    <v-container>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <v-card class="mt-2">
              <v-img src="./images/banner1.jpg"></v-img>
              <v-card-text class="black white--text"> gdfkdkfkl </v-card-text>
            </v-card>
            <v-card class="mt-2">
              <v-img src="./images/banner2.jpg"></v-img>
              <v-card-text class="black white--text"> gdfkdkfkl </v-card-text>
            </v-card>
            <v-card class="mt-2">
              <v-img src="./images/banner3.jpg"></v-img>
              <v-card-text class="black white--text"> gdfkdkfkl </v-card-text>
            </v-card>
            <v-card class="mt-2">
              <v-img src="./images/banner4.jpg"></v-img>
              <v-card-text class="black white--text"> gdfkdkfkl </v-card-text>
            </v-card>
            <v-card class="mt-2">
              <v-img src="./images/banner1.jpg"></v-img>
              <v-card-text class="black white--text"> gdfkdkfkl </v-card-text>
            </v-card>
          </div>
          <div class="col-md-4">
            <v-card class="mt-2">
              <v-img src="./images/sag.gif"></v-img>

            </v-card>
          </div>
        </div>
      </div>
    </v-container>
  </div>
</template>

<script>
import Header from "./Header.vue";
import Slider from "./Slider.vue";
export default {
  components: {
    Header,
    Slider,
  },
  props:['user'],
  data: () => ({}),
};
</script>
<style scoped>
.sticky {
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
  z-index: 2;
}
</style>
