<template>
  <AdminLayout>
    <v-simple-table>
      <thead>
        <tr>
          <th class="text-left">Name</th>
          <th class="text-left">Calories</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in allcategories" :key="item.name">
          <td>{{ item.name }}</td>
          <td> <v-icon>mdi-{{ item.icon }}</v-icon></td>
        </tr>
      </tbody>
    </v-simple-table>
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../Layouts/admin/Admin.vue";

export default {
  props: ["categories", 'icons'],
  components: {
    AdminLayout,
  },
  data: () => ({
    allcategories:{},
  }),

  created() {
   this.allcategories = this.categories
  }
};
</script>

<style>
</style>