<template>
  <AdminLayout>
    <Dashboard />
  </AdminLayout>
</template>

<script>
import Dashboard from "../components/Desktop/Dashboard.vue";
import AdminLayout from "../Layouts/admin/Admin.vue";

export default {
  components: {
    Dashboard,
    AdminLayout,
  },
};
</script>

<style>
</style>