<template>
  <AdminLayout>
    <v-row>
      <h1 class="ma-5">{{ $t("Menus") }}</h1>
      <v-spacer></v-spacer>
      <InertiaLink
        as="v-btn"
        :href="'/menu/create'"
        class="ma-5"
        color="success"
      >
        {{ $t("Add new Product") }}</InertiaLink
      >
    </v-row>
    <v-simple-table>
      <thead>
        <tr>
          <th class="text-left headline">Name</th>
          <th class="text-left headline">Parent</th>
          <th class="text-left headline">Icon</th>
        </tr>
      </thead>
      <tbody>
        <InertiaLink
          :href="'/menus/' + item.id"
          as="tr"
          v-for="(item, id) in allcategories"
          :key="id"
        >
          <td class="deep-orange--text">{{ item.name }}</td>

          <td v-if="item.parent" class="red--text">{{ item.parent.name }}</td>
          <td v-else>No parent</td>

          <td>
            <v-icon>mdi-{{ item.icon }}</v-icon>
          </td>
        </InertiaLink>
      </tbody>
    </v-simple-table>
    <v-snackbar color="succes" v-model="snackbar" timeout="2000" transition="scale-transition">
      {{ $t($page.props.message.success) }}
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
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
  props: ["categories", "icons"],
  components: {
    AdminLayout,
    InertiaLink,
  },
  data: () => ({
    allcategories: {},
    snackbar: false
  }),

  created() {
    this.allcategories = this.categories;
  },
  mounted() {
    if (this.$page.props.message.success) {
      this.snackbar = true;
    }
  }
};
</script>

<style scoped>
tr:hover {
  cursor: pointer;
}
</style>