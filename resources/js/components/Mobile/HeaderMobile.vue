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
        <v-sheet class="mx-auto fullwidth pr-2" max-width="480px">
          <v-slide-group multiple prev-icon="mdi-chevron-left" next-icon="mdi-chevron-right" >

            <v-btn outlined text class="mr-2">Keşfet</v-btn>
            <v-divider vertical></v-divider>

            <Link as="v-btn" :class="{'orange white--text': $page.url === '/'}" href="/" outlined text class="rounded-xl ml-2">Erkek</Link>
            <v-btn outlined text class="rounded-xl ml-2">Kadın</v-btn>
            <v-btn outlined text class="rounded-xl ml-2">Elektorik</v-btn>
            <v-btn outlined text class="rounded-xl ml-2">Kozmetik</v-btn>
            <v-btn outlined text class="rounded-xl ml-2">Kozmetik</v-btn>
            <v-btn outlined text class="rounded-xl ml-2">Kozmetik</v-btn>
            <v-btn outlined text class="rounded-xl ml-2">Kozmetik</v-btn>
            <v-btn outlined text class="rounded-xl ml-2">Kozmetik</v-btn>
          </v-slide-group>
        </v-sheet>
      </v-row>
    </v-app-bar>

  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
  components: {
    Link
  }
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