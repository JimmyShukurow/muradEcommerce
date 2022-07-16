<template>
  <AdminLayout>
    <v-row>
      <h1 class="ma-5">{{ $t("Models") }}</h1>
      <v-spacer></v-spacer>
      <InertiaLink as="v-btn" :href="'/models/create'" class="ma-5" color="success">
        {{ $t("Add new Model") }}
      </InertiaLink>
    </v-row>
    <v-simple-table class="m-5">
      <thead>
        <tr>
          <th class="text-left headline" style="width:50%">{{ $t("name") }}</th>
          <th class="text-left headline" style="width:50%">{{ $t("Brand") }}</th>
        </tr>
      </thead>
      <tbody>
        <InertiaLink as="tr" :href="'/model/' + model.id" v-for="model in models" :key="model.name">
          <td class="deep-orange--text">{{ model.name[$i18n.locale]}}</td>
          <td class="deep-orange--text">{{ model.name[$i18n.locale]}}</td>
        </InertiaLink>
      </tbody>
    </v-simple-table>
    <v-snackbar color="succes" v-model="snackbar" timeout="2000" transition="scale-transition">
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
  props: ["models"],
  components: {
    AdminLayout,
    InertiaLink,
  },
  data: () => ({
    snackbar: false
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