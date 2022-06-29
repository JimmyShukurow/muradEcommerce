<template>
  <AdminLayout>
    <v-form>
      <v-container>
        <v-row class="ma-5">
          <v-spacer></v-spacer>
          <InertiaLink as="v-btn" href="/products" color="secondary">Back</InertiaLink>
        </v-row>
        <v-row>
          <v-col cols="12" md="12">
            <v-text-field v-model="form.name" :counter="10" outlined label="First name" required></v-text-field>
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
            <v-text-field label="Price" type="number" outlined required></v-text-field>
          </v-col>

          <v-col cols="12" md="6">
            <file-pond
              name="images"
              ref="pond"
              label-idle="Drop files here..."
              v-bind:allow-multiple="true"
              accepted-file-types="image/jpeg, image/png"
              server="/api/upload"
            />
          </v-col>
          <v-col cols="12" md="6">
            <v-sheet>
              <v-row v-for="(image, index) in form.media" :key="index">
                <v-card width="70%" class="ma-5">
                  <v-img :src="image.preview_url" height="125" contain class="grey lighten-4"></v-img>
                </v-card>
                <v-layout align-center>
                  <v-btn icon class="mx-auto" @click="deleteImage(index)">
                    <v-icon color="error" large>mdi-delete</v-icon>
                  </v-btn>
                </v-layout>
              </v-row>
            </v-sheet>
          </v-col>
          <v-col cols="12" md="12">
            <v-row class="ma-5">
              <InertiaLink as="v-btn" href="/products" color="error">Cancel</InertiaLink>
              <v-spacer></v-spacer>
              <v-btn color="primary" @click="update()">Save</v-btn>
            </v-row>
          </v-col>
        </v-row>
      </v-container>
    </v-form>
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";
import { InertiaLink } from "@inertiajs/inertia-vue";
// Import Vue FilePond
import vueFilePond from "vue-filepond";

// Import FilePond styles
import "filepond/dist/filepond.min.css";

// Import FilePond plugins
// Please note that you need to install these plugins separately

// Import image preview plugin styles
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";

// Create component
const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview
);
export default {
  props: ["product", "categories"],
  components: {
    AdminLayout,
    FilePond,
    InertiaLink
  },
  data: () => ({
    form: {}
  }),
  mounted() {
    this.form = this.product;
  },
  methods: {
    update() {
      let afterRequest = {
        onSuccess: () => {},
        onError: () => {}
      };
      this.form.images = [];
      for (
        let index = 0;
        index < document.getElementsByName("images").length;
        index++
      ) {
        this.form.images.push(
          document.getElementsByName("images")[index].value
        );
      }
      this.$inertia.put(
        "/products/" + this.product.id,
        this.form,
        afterRequest
      );
    },
    deleteImage(imageOrder) {
        this.form.media.splice(imageOrder,1);
    }
  }
};
</script>

<style>
</style>