<template>
  <AdminLayout>
    <v-row>
      <h1 class="ma-5">{{ $t("Settings") }}</h1>
      <v-spacer></v-spacer>
    </v-row>
    <v-row class="ma-2">
      <v-col cols="12" md="6">
        <h3>Logo</h3>
        <file-pond :mulitpleImage="false" />
      </v-col>
      <v-col cols="12" md="6">
        <h3>Domain Adress</h3>
        <v-text-field label="URL" v-model="form.URL" outlined></v-text-field>
      </v-col>
    </v-row>
    <v-row>
      <v-spacer></v-spacer>
      <v-btn class="ma-8" color="success" @click="delRecord()">
        {{ $t("Update") }}</v-btn
      >
    </v-row>
    <v-snackbar color="succes" v-model="snackbar" timeout="2000" transition="scale-transition">
      {{ message }}
      <template v-slot:action="{ attrs }">
        <v-btn color="error" fab text v-bind="attrs" @click="snackbar=false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </template>
    </v-snackbar>
    <Confirm ref="confirm" />
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";
import FilePond from "../../../components/FilePond.vue";
import Confirm from "../../../components/ConfirmDlg.vue";

export default {
  props:['url'],
  components: {
    AdminLayout,
    FilePond,
    Confirm,
  },
  data: () => ({
    form: {},
    snackbar: false,
    message: ''
  }),
  mounted(){
    this.form.URL = this.url;
  },
  methods: {
    async delRecord() {
      if (
        await this.$refs.confirm.open(
          this.$t("confirm"),
          this.$t("Are you sure you want to delete this record?")
        )
      ) {
        this.updateSettings();
      }
    },
    updateSettings() {
        let afterRequest = {
        onSuccess: (data) => {
          if(data.props.message.success){
            this.snackbar =true;
            this.message = data.props.message.success
          }
        },
        onError: () => {}
      };
      this.form.image = [];
      this.form.image.push(document.getElementsByName("images")[0].value);
      this.$inertia.post("/settings", this.form, afterRequest);
    },
  },
};
</script>

<style>
</style>