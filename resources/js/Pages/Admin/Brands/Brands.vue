<template>
  <AdminLayout>
    <v-row>
      <h1 class="ma-5">{{ $t("Brands") }}</h1>
      <v-spacer></v-spacer>
      <InertiaLink
        as="v-btn"
        :href="'/brand/create'"
        class="ma-5"
        color="success"
      >
        {{ $t("Add new Brand") }}</InertiaLink
      >
    </v-row>
    <v-simple-table class="m-5">
      <thead>
        <tr>
          <th class="text-left headline">{{ $t("name") }}</th>
        </tr>
      </thead>
      <tbody>
        <InertiaLink
          as="tr"
          :href="'/brands/' + brand.id"
          v-for="brand in brands"
          :key="brand.name"
        >
          <td class="deep-orange--text">{{ brand.name }}</td>
        </InertiaLink>
      </tbody>
    </v-simple-table>
    <v-snackbar
      color="succes"
      v-model="snackbar"
      timeout="2000"
      transition="scale-transition"
    >
      {{ $t($page.props.message.success) }}
      <template v-slot:action="{ attrs }">
        <v-btn color="error" fab text v-bind="attrs" @click="snackbar = false">
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
  props: ["brands"],
  components: {
    AdminLayout,
    InertiaLink,
  },
  data: () => ({
    snackbar: false,
  }),
  mounted() {
    if (this.$page.props.message.success) {
      this.snackbar = true;
    }
  },
};
</script>

<style>
</style>