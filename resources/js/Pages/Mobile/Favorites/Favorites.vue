<template>
  <MobileLayout>
    <v-container>
      <v-sheet class="mb-2">
        <h1>Favorites</h1>
        <v-divider></v-divider>
      </v-sheet>
      <v-row>
        <v-col
          cols="6"
          v-for="(product, id) in products"
          :key="id"
          style="position: relative"
        >
          <v-btn
            color="orange"
            dark
            fab
            small
            top
            right
            absolute
            class="mt-8"
            @click="removeFromFavorites(product.id)"
          >
            <v-icon color="red">mdi-heart</v-icon>
          </v-btn>
          <v-layout @click="getProduct(product.product.id)">
            <ProductCard :product="product.product"></ProductCard>
          </v-layout>
        </v-col>
      </v-row>
      <v-snackbar
        :color="snackbarColor"
        v-model="snackbar"
        timeout="2000"
        transition="scale-transition"
      >
        {{ message }}
        <template v-slot:action="{ attrs }">
          <v-btn dark fab text v-bind="attrs" @click="snackbar = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </template>
      </v-snackbar>
    </v-container>
  </MobileLayout>
</template>

<script>
import MobileLayout from "../../../Layouts/mobile/MobileLayout.vue";
import ProductCard from "../Products/ProductCard.vue";
export default {
  props: ["products"],
  components: {
    MobileLayout,
    ProductCard,
  },
  data:() => ({
    snackbarColor: 'success',
    snackbar: false,
    message: ''
  }),
  methods: {
    getProduct(id) {
      let afterRequest = {
        onSuccess: () => {},
        onError: () => {},
      };
      this.$inertia.get("/mobile/product/" + id, {}, afterRequest);
    },
    removeFromFavorites(id) {
      let afterRequest = {
        onSuccess: () => {},
        onError: () => {},
      };
      this.$inertia.delete("/mobile/favorite/remove/" + id, afterRequest);
    },
  },
};
</script>

<style>
</style>
