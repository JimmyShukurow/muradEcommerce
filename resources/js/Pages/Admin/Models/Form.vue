<template>
  <AdminLayout>
    <h1>Create Model</h1>
    <v-form>
      <v-container>
        <v-row class="ma-5">
          <h2>{{ model ? model.name : "New Model" }}</h2>
          <v-spacer></v-spacer>
          <InertiaLink as="v-btn" href="/models" color="secondary">Back</InertiaLink>
        </v-row>
        <v-row>
          <v-col cols="12" md="12">
            <v-text-field :label="$t('Model')" outlined v-model="form.name"></v-text-field>
          </v-col>

          <v-col cols="12" md="6">
            <v-btn color="error" >Delete</v-btn>
          </v-col>
          <v-col cols="12" md="6" align="right">
            <v-btn color="primary" @click="edit ? updateModel() : saveModel()">{{ buttonText }}</v-btn>
          </v-col>
        </v-row>
      </v-container>
      <v-snackbar color="succes" v-model="snackbar" timeout="2000" transition="scale-transition">
        {{ message }}
        <template v-slot:action="{ attrs }">
          <v-btn color="error" fab text v-bind="attrs" @click="snackbar = false">
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
  props:["model", "edit"],
  components: {
    AdminLayout,
    Confirm,
    InertiaLink,
  },
  data: () => ({
    form: {},
    buttonText: "Create",
    message: "",
    snackbar: false,
  }),
   mounted() {
    if (this.edit) {
      this.form = JSON.parse(JSON.stringify(this.model));
      this.buttonText = "update";
    }
  },
  methods: {
    saveModel() {
      let afterRequest = {
        onSucces:() => {},
        onError:() => {},
      }

      this.$inertia.post('/models', this.form, afterRequest);
    },
    updateModel() {
      let afterRequest = {
        onSucces:() => {},
        onError:() => {},
      }

      this.$inertia.put('/models/' + this.model.id, this.form, afterRequest);
    }
  }
};
</script>

<style>
</style>