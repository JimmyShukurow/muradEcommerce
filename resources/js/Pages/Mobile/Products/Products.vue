<template>
  <MobileLayout>
    <v-layout class="ma-5">
      <v-row v-if="products" cols="12">
        <v-col cols="6" v-for="(product, id) in products" :key="id" @click="getProduct(id)">
          <ProductCard :product="product"></ProductCard>
        </v-col>
      </v-row>
      <v-layout v-else>
        <h2> Nothing here</h2>
      </v-layout>
    </v-layout>
  </MobileLayout>
</template>

<script>
import MobileLayout from "../../../Layouts/mobile/MobileLayout.vue";
import ProductCard from "./ProductCard.vue";
import { InertiaLink } from "@inertiajs/inertia-vue";
export default {
  props: ["products"],
  components: {
    MobileLayout,
    ProductCard,
    InertiaLink
  },
  methods: {
    getProduct(id) {
      let afterRequest = {
        onSuccess: () => {
        },
        onError: () => {
        }
      };
      this.$inertia.get("/mobile/product/" + id , {}, afterRequest);
    }
  }
};
</script>

<style>
</style>