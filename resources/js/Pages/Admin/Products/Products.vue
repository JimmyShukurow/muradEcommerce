<template>
  <AdminLayout>
    <h1>Products</h1>
     <v-simple-table>
      <thead>
        <tr>
          <th class="text-left headline">Name</th>
          <th class="text-left headline" >Category</th>
          <th class="text-left headline">Icon</th>
        </tr>
      </thead>
      <tbody>
        <InertiaLink as="tr" href="/" v-for="product in products" :key="product.name">
          <td class="deep-orange--text"> {{ product.name }}</td>
          <td class="red--text">{{ product.category.name }}</td>
          <td> Nothing here</td>
        </InertiaLink>
      </tbody>
    </v-simple-table>
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";
import { UploadMedia, UpdateMedia } from "vue-media-upload";
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
  props:['products'],
  components: {
    AdminLayout,
    UploadMedia,
    UpdateMedia,
    InertiaLink
  }
};
</script>

<style scoped>
.image {
  width: 400px;
  height: 400px;
} 
</style>