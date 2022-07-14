<template>
  <AdminLayout>
    <h1>Create Model</h1>
    <v-form>
      <v-container>
        <v-row class="ma-5">
          <h2>{{ model ? model.name[lang] : "New Model" }}</h2>
          <v-spacer></v-spacer>
          <InertiaLink as="v-btn" href="/models" color="secondary">Back</InertiaLink>
        </v-row>
        <v-card flat class="py-5">
          <v-card-text>
            <v-row align="center" justify="center">
              <v-btn-toggle mandatory dark color="error">
                <v-btn color="primary" @click="lang = 'en'">en</v-btn>
                <v-btn color="primary" @click="lang = 'tkm'">tkm</v-btn>
                <v-btn color="primary" @click="lang = 'ru'">ru</v-btn>
              </v-btn-toggle>
            </v-row>
          </v-card-text>
        </v-card>
        <v-row>
          <v-col cols="12" md="12">
            <v-text-field :label="$t('Model')" required outlined v-model="form.name[lang]"></v-text-field>
          </v-col>

          <v-col cols="12" class="ma-5">
            <v-row>
              <v-btn color="error" v-if="edit" @click="delRecord">Delete</v-btn>
              <v-spacer></v-spacer>
              <v-btn color="primary" @click="edit ? updateModel() : saveModel()">{{ buttonText }}</v-btn>
            </v-row>
          </v-col>
        </v-row>
      </v-container>
      <v-snackbar color="error" v-model="snackbar" timeout="2000" transition="scale-transition">
        {{ message }}
        <template v-slot:action="{ attrs }">
          <v-btn dark fab text v-bind="attrs" @click="snackbar = false">
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
  props: ["model", "edit"],
  components: {
    AdminLayout,
    Confirm,
    InertiaLink,
  },
  data: () => ({
    form: {
      name: {}
    },
    lang: 'en',
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
        onSucces: () => { },
        onError: () => { },
      }

      this.$inertia.post('/models', this.form, afterRequest);
    },
    updateModel() {
      let afterRequest = {
        onSucces: () => { },
        onError: () => { },
      }

      this.$inertia.put('/models/' + this.model.id, this.form, afterRequest);
    },
    async delRecord() {
      if (
        await this.$refs.confirm.open(
          this.$t("confirm"),
          this.$t("Are you sure you want to delete this record?")
        )
      ) {
        this.deleteModel();
      }
    },

    deleteModel() {
      let afterRequest = {
        onSuccess: () => { },
        onError: (data) => {
          this.snackbar = true
          this.message = data.error
        }
      }

      this.$inertia.delete('/models/' + this.model.id, afterRequest);
    }
  }
};
</script>

<style>
</style>