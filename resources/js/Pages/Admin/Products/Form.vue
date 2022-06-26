<template>
  <AdminLayout>
    <v-form>
      <v-container>
        <v-row class="ma-5">
          <v-spacer></v-spacer>
          <InertiaLink as="v-btn" href="/products" color="secondary"
            >Back</InertiaLink
          >
        </v-row>
        <v-row>
          <v-col cols="12" md="12">
            <v-text-field
              v-model="form.name"
              :counter="10"
              outlined
              label="First name"
              required
            ></v-text-field>
          </v-col>
          <v-col cols="12" md="12">
            <v-select
              outlined
              label="Category"
              v-model="form.category_id"
              :items="categories"
              item-value="id"
              item-text="name"
            ></v-select>
          </v-col>
          <v-col cols="12" md="12">
            <v-textarea
              v-model="form.description"
              :counter="10"
              label="Last name"
              required
              outlined
            ></v-textarea>
          </v-col>

          <v-col cols="12" md="12">
            <v-text-field
              label="Price"
              type="number"
              outlined
              required
            ></v-text-field>
          </v-col>

          <v-col cols="12" md="12">
            <upload-media server="/api/upload"> </upload-media>
          </v-col>
          <v-col cols="12" md="12">
            <v-row class="ma-5">
              <InertiaLink as="v-btn" href="/products" color="error"
                >Cancel</InertiaLink
              >
              <v-spacer></v-spacer>
              <v-btn color="primary" @click="update"> Save </v-btn>
            </v-row>
          </v-col>
        </v-row>
        <v-snackbar v-model="snackbar" timeout="2000">
            JImi
          <template  v-slot:action="{ attrs }">
            <v-btn color="blue" text v-bind="attrs"> Close </v-btn>
          </template>
        </v-snackbar>
      </v-container>
    </v-form>
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";
import { UploadMedia, UpdateMedia } from "vue-media-upload";
import { InertiaLink } from "@inertiajs/inertia-vue";
import axios from "axios";
export default {
  props: ["product", "categories"],
  components: {
    AdminLayout,
    UploadMedia,
    UpdateMedia,
    InertiaLink,
  },
  data: () => ({
    form: {},
    snackbar: true
  }),
  mounted() {
    this.form = this.product;
  },
  methods: {
    update() {
      axios.put("/products/" + this.product.id, this.form).then((response) => {
        console.log(response);
      });
    },
  },
};
</script>

<style>
</style>