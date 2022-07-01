<template>
  <AdminLayout>
    <v-form>
      <v-container>
        <v-row class="ma-5">
          <v-spacer></v-spacer>
          <InertiaLink as="v-btn" href="/users" color="secondary">Back</InertiaLink>
        </v-row>
        <v-text-field :label="$t('name')" outlined v-model="form.name"></v-text-field>
      </v-container>
    </v-form>
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";
import { InertiaLink } from "@inertiajs/inertia-vue";
export default {
  props: ["user"],
  components: {
    AdminLayout,
    InertiaLink
  },
  data: () => ({
    form: {}
  }),
  mounted() {
    this.form = this.user;
  }
};
</script>

<style>
</style>