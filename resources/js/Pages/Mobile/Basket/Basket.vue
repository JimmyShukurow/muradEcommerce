<template>
  <MobileLayout>
    <v-container>
      <v-row>
        <v-col v-for="(product, id) in basket" :key="id" cols="12">
          <v-card>
            <h4 align-center>{{ product.product.name}}</h4>
            <v-row class="little-margin">
              <v-col class="mx-auto my-auto pa-0">
                <v-sheet class="mx-auto">
                  <v-img :src="product.product.preview_image.preview_url" max-width="100" max-height="100"></v-img>
                </v-sheet>
              </v-col>
              <v-col class="mx-auto my-auto px-0" >
                <v-layout align-center>
                  <v-row class="mx-auto" align="center">
                    <v-col cols="12" align="center" class="py-1">
                      <v-btn fab elevation="0" x-small dark color="green" @click="product.quantity++"><v-icon>mdi-plus</v-icon></v-btn>
                    </v-col>
                    <v-col cols="12" class="mx-auto py-1">
                      <v-text-field readonly outlined :value="product.quantity"></v-text-field>
                    </v-col>
                    <v-col cols="12" align="center" class="py-1">
                       <v-btn fab elevation="0" x-small dark color="red" @click="product.quantity--"> <v-icon >mdi-minus</v-icon></v-btn>
                    </v-col>
                  </v-row>
                </v-layout>
              </v-col >
              <v-col   class="mx-auto my-auto px-0">
                  <v-text-field solo readonly :value="product.quantity*product.product.price + 'm'" outlined></v-text-field>
              </v-col>
              <v-col class="mx-auto my-auto">
                <v-layout align-center>
                  <v-btn icon class="mx-auto" @click="deleteImage(image.id)">
                    <v-icon color="error" large>mdi-delete</v-icon>
                  </v-btn>
                </v-layout>
              </v-col>
            </v-row>
          </v-card>
        </v-col>
      </v-row>
      <v-text-field readonly :value="1520" outlined prefix="toplam"></v-text-field>
    </v-container>
  </MobileLayout>
</template>

<script>
import MobileLayout from "../../../Layouts/mobile/MobileLayout.vue";
import { InertiaLink } from "@inertiajs/inertia-vue";
export default {
  props: ["basket"],
  components: {
    MobileLayout,
    InertiaLink
  }
};
</script>

<style scoped>
.v-image {
  border: solid 2px orange;
}
.little-margin {
  margin: 5px;
}
</style>