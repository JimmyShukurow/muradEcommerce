<template>
  <AdminLayout>
    <v-form>
      <v-container>
        <v-row>
          <v-col cols="12" md="4">
            <v-text-field
              v-model="form.name"
              :counter="10"
              label="First name"
              required
            ></v-text-field>
          </v-col>

          <v-col cols="12" md="4">
            <v-text-field
              v-model="form.description"
              :counter="10"
              label="Last name"
              required
            ></v-text-field>
          </v-col>

          <v-col cols="12" md="4">
            <v-text-field  label="E-mail" required></v-text-field>
          </v-col>
        </v-row>
      </v-container>
    </v-form>
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";
export default {
    props:['product'],
  components: {
    AdminLayout
  },
  data: () => ({
    form: {},
  }),
  mounted() {
    this.form = this.product;
  }
};
</script>

<style>
</style>