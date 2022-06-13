<template>
  <AdminLayout>
    <v-simple-table>
      <thead>
        <tr>
          <th class="text-left headline">Name</th>
          <th class="text-left headline" >Parent</th>
          <th class="text-left headline">Icon</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in allcategories" :key="item.name">
          <td class="deep-orange--text"> {{ item.name }}</td>

          <td v-if="item.parent" class="red--text">{{ item.parent.name }}</td>
          <td v-else>No parent</td>


          <td> <v-icon>mdi-{{ item.icon }}</v-icon></td>
        </tr>
      </tbody>
    </v-simple-table>
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";

export default {
    components: {
        AdminLayout
    }
}
</script>

<style>

</style>