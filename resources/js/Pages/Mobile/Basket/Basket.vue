<template>
  <MobileLayout>
    <v-container>
      <v-row>
        <v-col v-for="(product, id) in basket" :key="id" cols="12">
          <v-card class="ma-1">
            <h4 align-center class="mt-2">{{ product.name}}</h4>
            <v-row class="ma-1">
              <v-col class="mx-auto my-auto">
                <v-sheet class="mx-auto">
                  <v-img :src="product.preview_image.preview_url" max-width="100" max-height="100"></v-img>
                </v-sheet>
              </v-col>
              <v-col class="mx-auto my-auto" >
                <v-layout align-center>
                  <v-row class="mx-auto" align="center">
                    <v-col cols="12">
                      <v-btn fab elevation="0" x-small dark color="green"><v-icon>mdi-plus</v-icon></v-btn>
                    </v-col>
                    <v-col cols="12" class="mx-auto">
                      <span>14</span>
                    </v-col>
                    <v-col cols="12">
                       <v-btn fab elevation="0" x-small dark color="red"> <v-icon >mdi-minus</v-icon></v-btn>
                    </v-col>
                  </v-row>
                </v-layout>
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
</style>