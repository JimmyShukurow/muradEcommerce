<template>
  <div>
    <v-container class="grey lighten-2">
      <v-row class="ma-1" align="center">
        <v-col cols="10">
          <v-text-field
            class="rounded-lg"
            flat
            dense
            height="50px"
            solo
            prepend-inner-icon="mdi-magnify"
            hide-details="auto"
            color="orange"
            outlined
            clearable
            clear-icon="mdi-close"
            label="Birazatlar yaz gozlemek ucin"
          ></v-text-field>
        </v-col>
        <v-col cols="2" align="center">
          <v-badge overlap color="orange darken-4" content="8+">
            <v-btn fab x-small depressed dark color="orange">
              <v-icon>mdi-bell</v-icon>
            </v-btn>
          </v-badge>
        </v-col>
      </v-row>
    </v-container>
    <v-app-bar class="white">
      <v-row align="center">
        <v-sheet class="mx-auto fullwidth pr-2" max-width="768px" width="100%">
          <v-slide-group multiple prev-icon="mdi-chevron-left" next-icon="mdi-chevron-right" >

            <v-btn outlined text class="mr-2">Keşfet</v-btn>
            <v-divider vertical></v-divider>

            <v-layout v-for="(category, id) in categories" :key="id">
              <InertiaLink as="v-btn" :class="{'orange white--text': $page.url === category.id}" :href="'/mobile/products/' + category.id" outlined text class="rounded-xl ml-2">{{ category.name }}</InertiaLink>
            </v-layout>
          </v-slide-group>
        </v-sheet>
      </v-row>
    </v-app-bar>

  </div>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue";
export default {
  props:['user', 'categories'],
  components: {
    InertiaLink
  },
  data:() =>({

  }),
};
</script>

<style scoped>
.v-btn {
  text-transform: capitalize;
}
.fullwidth {
  max-width: 100%;
  width: 100%;
}

</style>