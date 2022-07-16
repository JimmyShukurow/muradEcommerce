<template>
  <AdminLayout>
    <v-form>
      <v-container>
        <v-row class="ma-5">
          <h2>{{ role ? role.name : $t('New Role') }}</h2>
          <v-spacer></v-spacer>
          <InertiaLink as="v-btn" href="/roles" color="secondary">{{$t('Back')}}</InertiaLink>
        </v-row>
        <v-row>
          <v-col cols="12" md="12">
            <v-text-field :label="$t('Role')" outlined v-model="form.name"></v-text-field>
          </v-col>

          <v-col cols="12" class="ma-5">
            <v-row>
              <v-btn color="error" v-if="edit" @click="delRecord()">{{$t('Delete')}}</v-btn>
              <v-spacer></v-spacer>
              <v-btn color="primary" @click="saveRole()">{{ $t(buttonText) }}</v-btn>
            </v-row>
          </v-col>
        </v-row>
      </v-container>
      <v-snackbar :color="snackbarColor" v-model="snackbar" timeout="2000" transition="scale-transition">
        {{ message }}
        <template v-slot:action="{ attrs }">
          <v-btn color="white" fab text v-bind="attrs" @click="snackbar = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </template>
      </v-snackbar>
    </v-form>
    <Confirm ref="confirm" />
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";
import Confirm from "../../../components/ConfirmDlg.vue";
import { InertiaLink } from "@inertiajs/inertia-vue";
export default {
  props: ["role", "edit"],
  components: {
    AdminLayout,
    Confirm,
    InertiaLink
  },
  data: () => ({
    form: {},
    buttonText: 'Save',
    snackbar: false,
    message: '',
    snackbarColor: 'success'
  }),
  mounted() {
    if (this.edit) {
      this.form = JSON.parse(JSON.stringify(this.role));
      this.buttonText = "Update";
    }
  },
  methods: {
    saveRole() {
      let afterRequest = {
        onSuccess: () => { },
        onError: () => { }
      }
      this.$inertia.post('/roles', this.form, afterRequest);
    },
    async delRecord() {
      if (
        await this.$refs.confirm.open(
          this.$t("confirm"),
          this.$t("Are you sure you want to delete this record?")
        )
      ) {
        this.deleteRole();
      }
    },
    deleteRole() {
      let afterRequest = {
        onSuccess: () => { },
        onError: (data) => {
          this.snackbarColor = 'error'
          this.snackbar = true
          this.message = data.error;
        }
      }
      this.$inertia.delete('/role/' + this.role.id, afterRequest);
    }
  }
}
</script>

<style>
</style>
