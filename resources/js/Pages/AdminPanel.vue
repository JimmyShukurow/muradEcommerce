<template>
  <AdminLayout>
    <Dashboard :orderDetails="orderDetails" :users="users" :products_count="products_count" :users_count="users_count" :total_sell="total_sell"/>
  </AdminLayout>
</template>

<script>
import Dashboard from "../components/Desktop/Dashboard.vue";
import AdminLayout from "../Layouts/admin/Admin.vue";

export default {
  props: ['orderDetails', 'users', 'products_count', 'users_count', 'total_sell'],
  components: {
    Dashboard,
    AdminLayout,
  },
};
</script>

<style lang="scss">
.v-list-item__title {
  white-space: pre-wrap !important;
}
</style>