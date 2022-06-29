<template>
  <AdminLayout>
    <v-row >
      <h1 class="ma-5" >Products</h1>
      <v-spacer></v-spacer>
      <InertiaLink as="v-btn" :href="'/product/create'"  class="ma-5" color="success"> Add new Product</InertiaLink>
    </v-row>
    <v-simple-table class="m-5">
      <thead>
        <tr>
          <th class="text-left headline">Name</th>
          <th class="text-left headline">Category</th>
          <th class="text-left headline">Icon</th>
        </tr>
      </thead>
      <tbody>
        <InertiaLink
          as="tr"
          :href="'/products/' + product.id"
          v-for="product in products"
          :key="product.name"
        >
          <td class="deep-orange--text">{{ product.name }}</td>
          <td class="red--text">{{ product.category.name }}</td>
          <td>Nothing here</td>
        </InertiaLink>
      </tbody>
    </v-simple-table>
    <v-snackbar color="succes" v-model="snackbar" timeout="2000" transition="scale-transition">
      {{ $page.props.message.success }}
      <template v-slot:action="{ attrs }">
        <v-btn color="error" fab text v-bind="attrs" @click="snackbar=false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </template>
    </v-snackbar>
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";
import { UploadMedia, UpdateMedia } from "vue-media-upload";
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
  props: ["products"],
  components: {
    AdminLayout,
    UploadMedia,
    UpdateMedia,
    InertiaLink
  },
  data: () => ({
    snackbar: false
  }),
  mounted() {
    if (this.$page.props.message.success) {
      this.snackbar = true;
    }
  }
};
</script>

<style scoped>
.image {
  width: 400px;
  height: 400px;
}
tr:hover {
  cursor: pointer;
}
</style>