<template>
  <AdminLayout>
    <Dashboard :orderDetails="orderDetails" :users="users"/>
  </AdminLayout>
</template>

<script>
import Dashboard from "../components/Desktop/Dashboard.vue";
import AdminLayout from "../Layouts/admin/Admin.vue";

export default {
  props: ['orderDetails', 'users'],
  components: {
    Dashboard,
    AdminLayout,
  },
};
</script>

<style>
</style>