<template>
  <AdminLayout>
    <v-form>
      <v-container>
        <v-row>
          <h2 class="ma-5">{{ menu ? menu.name[lang] : $t('New Menu') }}</h2>
          <v-spacer></v-spacer>
          <InertiaLink as="v-btn" href="/menus" color="secondary" class="ma-5">{{$t('Back')}}</InertiaLink>
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
          <v-col cols="12" md="6">
            <v-text-field outlined :label="$t('name')" v-model="form.name[lang]"></v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <v-select outlined :label="$t('category')" v-model="form.parent_id" :items="categories" item-value="id"
              item-text="name"></v-select>
          </v-col>
        </v-row>
        <v-row class="ma-5">
          <v-btn color="error" v-if="edit" @click="delRecord()">{{ $t('Delete')}}</v-btn>
          <v-spacer></v-spacer>
          <v-btn color="primary" @click="edit ? updateMenu() : saveMenu()">{{ $t(buttonText) }}</v-btn>
        </v-row>
      </v-container>
      <v-snackbar :color="sanckbarColor" v-model="snackbar" timeout="2000" transition="scale-transition">
        {{ message }}
        <template v-slot:action="{ attrs }">
          <v-btn color="dark" fab text v-bind="attrs" @click="snackbar = false">
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
import { InertiaLink } from "@inertiajs/inertia-vue";
import Confirm from "../../../components/ConfirmDlg.vue";

export default {
  props: ["menu", "categories", "edit"],
  components: {
    AdminLayout,
    InertiaLink,
    Confirm
  },
  data: () => ({
    form: {
      name:{}
    },
    lang:'en',
    buttonText: "Save",
    snackbar: false,
    message: '',
    sanckbarColor: 'success'
  }),
  mounted() {
    if (this.edit) {
      this.form = JSON.parse(JSON.stringify(this.menu));
      this.buttonText = "update";
    }
  },
  methods: {
    saveMenu() {
      let afterRequest = {
        onSuccess: () => { },
        onError: () => { },
      };
      this.$inertia.post("/menus", this.form, afterRequest);
    },
    updateMenu() {
      let afterRequest = {
        onSuccess: () => { },
        onError: () => { },
      };
      this.$inertia.put("/menus/" + this.menu.id, this.form, afterRequest);
    },
    async delRecord() {
      if (
        await this.$refs.confirm.open(
          this.$t("confirm"),
          this.$t("Are you sure you want to delete this record?")
        )
      ) {
        this.deleteMenu();
      }
    },
    deleteMenu() {
      let afterRequest = {
        onSuccess: () => { },
        onError: (data) => {
          this.sanckbarColor = 'error'
          this.snackbar = true
          this.message = data.error;
        }
      };
      this.$inertia.delete("/menus/" + this.menu.id, afterRequest);
    },
  },
};
</script>

<style>
</style>
