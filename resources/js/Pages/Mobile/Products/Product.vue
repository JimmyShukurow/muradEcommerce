<template>
  <MobileLayout>
    <v-container>
      <v-card >
      <v-img class="ma-2" :src="product.preview_image.preview_url"></v-img>
      <v-card-title>
        {{ product.name[$i18n.locale] }}
      </v-card-title>
      <v-card-text class="black--text ">
        {{ product.description[$i18n.locale]}}
        <v-row class="ma-5 black--text font-weight-black title">
          <div>
            {{ product.brand.name[$i18n.locale]}}
          </div>
          <v-spacer></v-spacer>
          <div>
            {{ product.model.name[$i18n.locale]}}
          </div>
        </v-row>
      </v-card-text>
      <v-card-actions>
        <div class="ml-5 font-weight-black title">
          {{ product.price}} manat
        </div>
        <v-spacer></v-spacer>
        <v-btn  dark color="orange" @click="addToBasket">{{$t("Add To Basket")}}</v-btn>
      </v-card-actions>
      </v-card>
       <v-snackbar :color="sanckbarColor" v-model="snackbar" timeout="2000" transition="scale-transition">
      {{ message }}
      <template v-slot:action="{ attrs }">
        <v-btn dark fab text v-bind="attrs" @click="snackbar=false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </template>
    </v-snackbar>
    </v-container>
  </MobileLayout>
</template>

<script>
import MobileLayout from "../../../Layouts/mobile/MobileLayout.vue";

export default {
  components: {
    MobileLayout,
  },
  props:['product'],
  data: () => ({
    snackbar: false,
    message: '',
    sanckbarColor: ''
  }),
  methods: {
    addToBasket() {

      if(this.$page.props.user == null){
         return this.$inertia.visit('/mobileLogin');
        }
      let afterRequest = {
        
        onSuccess: (data) => {
           if(data.props.message.success){
            this.sanckbarColor = 'succes'
            this.snackbar =true;
            this.message = data.props.message.success
          }
        },
        onError: (data) => {
          this.sanckbarColor = 'error'
          this.snackbar = true;
          this.message = data.error;
        }
      };
      this.$inertia.post('/mobile/basket/add/' + this.product.id, {}, afterRequest);
    }
  }
};
</script>

<style scoped>
.v-image {
  border: solid 2px orange;
}
</style>