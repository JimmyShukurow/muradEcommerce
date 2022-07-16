<template>
  <AdminLayout>
    <v-form>
      <v-container>
        <v-row class="ma-5">
          <v-spacer></v-spacer>
          <InertiaLink as="v-btn" href="/users" color="secondary">{{$t('Back')}}</InertiaLink>
        </v-row>
        <v-row>
          <v-col cols="12" md="6">
            <v-text-field :label="$t('name')" readonly outlined v-model="form.name"></v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field :label="$t('Email')" readonly outlined v-model="form.email"></v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field :label="$t('Phone')" readonly outlined v-model="form.phone"></v-text-field>
          </v-col>
           <v-col cols="12" md="6">
            <v-textarea :label="$t('Address')" readonly outlined v-model="form.phone"></v-textarea>
          </v-col>
          <v-col cols="12" md="6">
            <v-select :items="roles" item-text="name" item-value="id" :label="$t('Role')" outlined v-model="role_id" ></v-select>
          </v-col>
          <v-col cols="12" md="6">
            <v-btn color="primary" @click="updateRole(form.id, role_id)">{{$t('Update')}}</v-btn>
          </v-col>
        </v-row>
      </v-container>
      <v-snackbar color="succes" v-model="snackbar" timeout="2000" transition="scale-transition">
        {{ message }}
      <template v-slot:action="{ attrs }">
        <v-btn color="error" fab text v-bind="attrs" @click="snackbar=false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </template>
    </v-snackbar>
    </v-form>
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";
import { InertiaLink } from "@inertiajs/inertia-vue";
import axios from "axios";
export default {
  props: ["user", "roles"],
  components: {
    AdminLayout,
    InertiaLink
  },
  data: () => ({
    form: {},
    role_id:'',
    snackbar: false,
    message: '',
  }),
  mounted() {
    this.form = this.user;
    this.role_id = this.user.roles[0].id;
  },
  methods: {
    updateRole(id, role) {
      let afterRequest = {
        onSuccess: () => {},
        onError: () => {}
      };
    axios.post('/user/'+ this.form.id+'/role', {"role": role}).then((response) => {
      if(response.status == 200){
          this.snackbar = true
          this.message = response.data.success
      }
    });
    }
  }
};
</script>

<style>
</style>