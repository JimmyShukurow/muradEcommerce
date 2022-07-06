<template>
  <v-layout>
    <v-card elevation="10" height="350">
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
          <v-rating :value="4.5" color="amber" dense half-increments readonly size="14"></v-rating>
          <div class="grey--text ms-4">4.5 (413)</div>
        </v-row>
      </v-card-text>
    </v-card>
  </v-layout>
</template>

<script>
export default {
  props: ["product"],
  data: () => ({
    favorite: "mdi-heart-outline"
  }),
  methods: {

  }
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