<template>
  <AdminLayout>
    <v-form>
      <v-container>
        <v-row class="ma-5">
          <h2>{{ product ? product.name : "New Product" }}</h2>
          <v-spacer></v-spacer>
          <InertiaLink as="v-btn" href="/products" color="secondary">Back</InertiaLink>
        </v-row>
        <v-row>
          <v-col cols="12" md="6">
            <v-text-field v-model="form.name" :counter="16" maxlength="16" outlined :label="$t('name')" required>
            </v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <v-select outlined label="Category" v-model="form.category_id" :items="categories" item-value="id"
              item-text="name"></v-select>
          </v-col>
          <v-col cols="12" md="6">
            <v-select outlined label="Brand" v-model="form.brand_id" :items="brands" item-value="id"
              item-text="name"></v-select>
          </v-col>
          <v-col cols="12" md="6">
            <v-select outlined label="Model" v-model="form.model_id" :items="models" item-value="id"
              item-text="name"></v-select>
          </v-col>
          <v-col cols="12" md="12">
            <v-textarea v-model="form.description" :counter="1000" label="Last name" required outlined></v-textarea>
          </v-col>

          <v-col cols="12" md="4">
            <v-text-field label="Size" v-model="form.size" type="number" outlined required></v-text-field>
          </v-col>
          <v-col cols="12" md="4">
            <v-text-field label="Price" v-model="form.price" type="number" outlined required></v-text-field>
          </v-col>
          <v-col cols="12" md="4">
            <v-text-field label="Quantity" v-model="form.quantity" type="number" outlined required></v-text-field>
          </v-col>

          <v-col cols="12" md="6">
            <file-pond :mulitpleImage="true" />
          </v-col>
          <v-col cols="12" md="6">
            <v-sheet v-if="form.media">
              <v-row v-for="(image, index) in form.media" :key="index">
                <v-card width="70%" class="ma-5">
                  <v-img :src="image.preview_url" height="125" contain class="grey lighten-4"></v-img>
                </v-card>
                <v-layout align-center>
                  <v-btn icon class="mx-auto" @click="deleteImage(image.id)">
                    <v-icon color="error" large>mdi-delete</v-icon>
                  </v-btn>
                </v-layout>
              </v-row>
            </v-sheet>
          </v-col>
          <v-col cols="12" md="12">
            <v-row class="ma-5">
              <v-btn color="error" v-if="edit" @click="delRecord()">{{
                  $t("Delete")
              }}</v-btn>
              <v-spacer></v-spacer>
              <v-btn color="primary" @click="edit ? updateProduct() : saveProduct()">{{ buttonText }}</v-btn>
            </v-row>
          </v-col>
        </v-row>
      </v-container>
      <v-snackbar :color="sanckbarColor" v-model="snackbar" timeout="2000" transition="scale-transition">
        {{ message }}
        <template v-slot:action="{ attrs }">
          <v-btn color="dark" fab text v-bind="attrs" @click="snackbar = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </template>
      </v-snackbar>
    </v-form>
    <Confirm ref="confirm" />
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";
import { InertiaLink } from "@inertiajs/inertia-vue";
import Confirm from "../../../components/ConfirmDlg.vue";
import FilePond from "../../../components/FilePond.vue";

export default {
  props: ["product", "categories", "brands", "models", "edit"],
  components: {
    AdminLayout,
    FilePond,
    InertiaLink,
    Confirm,
  },
  data: () => ({
    form: {},
    buttonText: "save",
    delete: [],
    snackbar: false,
    message: "",
    sanckbarColor: "success",
  }),
  mounted() {
    if (this.edit) {
      this.form = JSON.parse(JSON.stringify(this.product));
      this.buttonText = "update";
    }
  },
  methods: {
    saveProduct() {
      let afterRequest = {
        onSuccess: () => { },
        onError: () => { },
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
      this.$inertia.post("/product", this.form, afterRequest);
    },
    async delRecord() {
      if (
        await this.$refs.confirm.open(
          this.$t("confirm"),
          this.$t("Are you sure you want to delete this record?")
        )
      ) {
        this.deleteProduct();
      }
    },
    deleteProduct() {
      let afterRequest = {
        onSuccess: () => { },
        onError: (data) => {
          this.sanckbarColor = 'error'
          this.snackbar = true
          this.message = data.error;
        }
      };
      this.$inertia.delete("/product/" + this.product.id, afterRequest);
    },
    updateProduct() {
      let afterRequest = {
        onSuccess: () => { },
        onError: () => { },
      };
      this.form.images = [];
      this.form.delete = [...this.delete];
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
    deleteImage(id) {
      let imageOrder = this.product.media.findIndex((element) => {
        return element.id === id;
      });
      this.delete.push(imageOrder);
      let deleteOrder = this.form.media.findIndex((element) => {
        return element.id === id;
      });
      this.form.media.splice(deleteOrder, 1);
    },
  },
};
</script>

<style>
</style>