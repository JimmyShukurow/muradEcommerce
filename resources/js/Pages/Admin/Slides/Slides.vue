<template>
  <AdminLayout>
    <v-row>
      <h1 class="ma-5">{{ $t("Slides") }}</h1>
      <v-spacer></v-spacer>
    </v-row>
    <v-sheet class="ma-5">
      <v-row>
        <v-card max-width="200px" class="mx-3">
          <v-img
            src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
            class="white--text align-end"
            gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
            height="150px"
          >
            <v-card-actions><v-btn>Sil</v-btn> </v-card-actions>
          </v-img>
        </v-card>

         <v-card max-width="200px" class="mx-3">
          <v-img
            src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
            class="white--text align-end"
            gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
            height="150px"
          >
            <v-card-actions><v-btn>Sil</v-btn> </v-card-actions>
          </v-img>
        </v-card>

         <v-card max-width="200px" class="mx-3">
          <v-img
            src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
            class="white--text align-end"
            gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
            height="150px"
          >
            <v-card-actions><v-btn>Sil</v-btn> </v-card-actions>
          </v-img>
        </v-card>

        <v-card width="200px" max-width="200px">
          <file-pond name="TopSlide" server="/upload/slide" />
        </v-card>
      </v-row>
    </v-sheet>
    <v-snackbar
      color="succes"
      v-model="snackbar"
      timeout="2000"
      transition="scale-transition"
    >
      {{ message }}
      <template v-slot:action="{ attrs }">
        <v-btn color="error" fab text v-bind="attrs" @click="snackbar = false">
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

export default {
  components: {
    AdminLayout,
    FilePond,
  },
  data: () => ({
    snackbar: false,
    message: "",
  }),
};
</script>

<style>
</style>