<template>
  <v-layout>
    <v-card elevation="10" height="350">
      <v-layout  >
        <v-btn color="orange" dark fab small absolute top right class="mt-8">
          <v-icon color="red">{{ favotite }}</v-icon></v-btn>
      </v-layout>
      <v-img
        class="ma-2"
        height="150"
        :src="
          product.preview_image
            ? product.preview_image.preview_url
            : 'http://127.0.0.1:8000/images/noImage.png'
        "
      ></v-img>
      <v-card-title>{{ product.name }}</v-card-title>
      <v-card-text>
        <v-row align="center" class="mx-0">
          <v-rating
            :value="4.5"
            color="amber"
            dense
            half-increments
            readonly
            size="14"
          ></v-rating>

          <div class="grey--text ms-4">4.5 (413)</div>
        </v-row>

        <div class="my-4 text-subtitle-1"></div>

        <div class="text">{{ product.description }}</div>
      </v-card-text>
    </v-card>
  </v-layout>
</template>

<script>
export default {
  props: ["product"],
  data:() => ({
     favotite: "mdi-heart-outline",
  }),
};
</script>

<style scoped>
.text {
  overflow: hidden;
  width: 100px;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
}
.v-image {
  border: solid 2px orange;
}
</style>