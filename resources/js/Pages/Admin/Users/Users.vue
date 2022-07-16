<template>
  <AdminLayout>
    <v-row>
      <h1 class="ma-5">{{$t('Users')}}</h1>
      <v-spacer></v-spacer>
    </v-row>
    <v-simple-table class="m-5">
      <thead>
        <tr>
          <th class="text-left headline" style="width:33%">{{$t('name')}}</th>
          <th class="text-left headline" style="width:33%">{{$t('Email')}}</th>
          <th class="text-left headline" style="width:33%">{{$t('Role')}}</th>
        </tr>
      </thead>
      <tbody>
        <InertiaLink as="tr" :href="'/users/'+user.id" v-for="(user, id) in users" :key="id">
          <td class="deep-orange--text">{{ user.name }}</td>
          <td class="red--text">{{ user.email }}</td>
          <td>{{ $t("no Image") }}</td>
        </InertiaLink>
      </tbody>
    </v-simple-table>
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";
import { InertiaLink } from "@inertiajs/inertia-vue";
export default {
  props: ["users"],
  components: {
    AdminLayout,
    InertiaLink
  }
};
</script>

<style scoped>
tr:hover {
  cursor: pointer;
}
</style>