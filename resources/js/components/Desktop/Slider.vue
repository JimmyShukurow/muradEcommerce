<template>
  <v-container>
    <v-sheet class="mx-auto" max-width="100%">
      <v-slide-group class="pa-4" multiple show-arrows>
        <v-slide-item v-for="n in 15" :key="n" >
          <v-card class="ma-4" elevation="0" max-width="75px">
            <v-img
              class="rounded-circle border"
              :src="getImage(Math.floor(Math.random() * 5))"
              height="75px"
              width="75px"
            ></v-img>
            <v-card-text align="center">
              <v-row class="text"> Adidas de maleris </v-row>
            </v-card-text>
          </v-card>
        </v-slide-item>
      </v-slide-group>
    </v-sheet>
  </v-container>
</template>

<script>
export default {
  data: () => ({
       images: ["adidas.png", "apple.png", "mi.png", "nike.png", "plumber.png"],
  }),
  methods: {
    getImage(random) {
      return "./images/" + this.images[random];
    },
  },
};
</script>

<style scoped>
.border {
  border: 1px solid grey;
}

.text {
    font-size: 12px;
    line-height: 12px;
}
</style>