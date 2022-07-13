<template>
  <AdminLayout>
     <v-row >
      <h1 class="ma-5" >{{$t('Roles')}}</h1>
      <v-spacer></v-spacer>
      <InertiaLink as="v-btn" :href="'/roles/create'"  class="ma-5" color="success"> {{$t('Add new Role')}}</InertiaLink>
    </v-row>
    <v-simple-table class="m-5">
      <thead>
        <tr>
          <th class="text-left headline">{{$t('name')}}</th>
          <th class="text-left headline">Category</th>
          <th class="text-left headline">Image</th>
        </tr>
      </thead>
      <tbody>
        <InertiaLink
          as="tr"
          :href="'/role/' + role.id"
          v-for="(role, id) in roles"
          :key="id"
        >
          <td class="deep-orange--text">{{ role.name }}</td>
          <td class="red--text">{{ role.name }}</td>
          <td v-if="role.preview_image">
            <v-img :src="product.preview_image.preview_url" height="50" width="50"></v-img>
          </td>
          <td v-else>{{$t('no Image')}}</td>
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
import { InertiaLink } from "@inertiajs/inertia-vue";
import AdminLayout from "../../../Layouts/admin/Admin.vue";
export default {
    props: ['roles'],
    components: {
        AdminLayout,
        InertiaLink
    },
      data: () => ({
        snackbar: false
    }),
    mounted() {
        if (this.$page.props.message.success) {
        this.snackbar = true;
        }
    },
}
</script>

<style>

</style>
