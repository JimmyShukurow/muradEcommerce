<template>
  <MobileLayout>
    <v-layout class="ma-5">
      <v-row v-if="products" cols="12">
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
            @click="addToFavorites(product.id)"
          >
            <v-icon color="red">{{ favorite }}</v-icon>
          </v-btn>
          <v-layout @click="getProduct(product.id)">
            <ProductCard :product="product"></ProductCard>
          </v-layout>
        </v-col>
      </v-row>
      <v-layout v-else>
        <h2>Nothing here</h2>
      </v-layout>
    </v-layout>
    <v-snackbar :color="snackbarColor" v-model="snackbar" timeout="2000" transition="scale-transition">
      {{ message }}
      <template v-slot:action="{ attrs }">
        <v-btn dark fab text v-bind="attrs" @click="snackbar=false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </template>
    </v-snackbar>
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
    InertiaLink,
  },
  data: () => ({
    favorite: "mdi-heart-outline",
    snackbar: false,
    message: '',
    snackbarColor: 'succes',
  }),
  methods: {
    getProduct(id) {
      let afterRequest = {
        onSuccess: () => {},
        onError: () => {},
      };
      this.$inertia.get("/mobile/product/" + id, {}, afterRequest);
    },
    addToFavorites(id) {
      let afterRequest = {
        onSuccess: (data) => {
            if(data.props.message.success){
            this.snackbarColor = 'orange'
            this.snackbar =true;
            this.message = data.props.message.success
            }
        },
        onError: (data) => {
          this.snackbarColor = 'error'
          this.snackbar = true;
          this.message = data.error;
        }
      };
      this.$inertia.post("/mobile/favorite/add/" + id, {}, afterRequest);
    },
  },
};
</script>

<style>
</style>