<template>
  <AdminLayout>
    <v-row>
      <h1 class="ma-5">{{ $t("Slides") }}</h1>
      <v-spacer></v-spacer>
    </v-row>
    <v-sheet class="ma-5">
      <h3>TopSlider</h3>
      <v-divider class="my-3"></v-divider>
      <v-row>
        <v-card
          v-for="(slide, id) in TopSlider"
          :key="id"
          max-width="200px"
          class="ma-3"
        >
          <v-img
            :src="slide.preview_image.preview_url"
            class="white--text align-end"
            gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
            height="150px"
          >
            <v-card-actions
              ><v-btn x-small color="primary">Detail</v-btn>
              <v-spacer></v-spacer
              ><v-btn x-small color="error" @click="deleteSlide(slide.id)"
                >Sil</v-btn
              >
            </v-card-actions>
          </v-img>
        </v-card>

        <v-card width="200px" max-width="200px">
          <file-pond
            name="slide"
            server="/api/upload/slide/TopSlider"
            :reload="true"
          />
        </v-card>
      </v-row>
    </v-sheet>
    <v-sheet class="ma-5">
      <h3>FirstSlider</h3>
      <v-divider class="my-3"></v-divider>
      <v-row class="pb-5">
        <v-card
          v-for="(slide, id) in FirstSlider"
          :key="id"
          max-width="200px"
          class="ma-3"
        >
          <v-img
            :src="slide.preview_image.preview_url"
            class="white--text align-end"
            gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
            height="150px"
          >
            <v-card-actions
              ><v-btn x-small color="primary">Detail</v-btn>
              <v-spacer></v-spacer
              ><v-btn x-small color="error" @click="deleteSlide(slide.id)"
                >Sil</v-btn
              >
            </v-card-actions>
          </v-img>
        </v-card>

        <v-card width="200px" max-width="200px">
          <file-pond
            name="slide"
            server="/api/upload/slide/FirstSlider"
            :reload="true"
          />
        </v-card>
      </v-row>
    </v-sheet>

    <v-sheet class="ma-5">
      <h3>SecondSlider</h3>
      <v-divider class="my-3"></v-divider>
      <v-row class="pb-5">
        <v-card
          v-for="(slide, id) in SecondSlider"
          :key="id"
          max-width="200px"
          class="ma-3"
        >
          <v-img
            :src="slide.preview_image.preview_url"
            class="white--text align-end"
            gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
            height="150px"
          >
            <v-card-actions
              ><v-btn x-small color="primary">Detail</v-btn>
              <v-spacer></v-spacer
              ><v-btn x-small color="error" @click="deleteSlide(slide.id)"
                >Sil</v-btn
              >
            </v-card-actions>
          </v-img>
        </v-card>

        <v-card width="200px" max-width="200px">
          <file-pond
            name="slide"
            server="/api/upload/slide/SecondSlider"
            :reload="true"
          />
        </v-card>
      </v-row>
    </v-sheet>
    <v-sheet class="ma-5">
      <h3>ThirdSlider</h3>
      <v-divider class="my-3"></v-divider>
      <v-row class="pb-5">
        <v-card
          v-for="(slide, id) in ThirdSlider"
          :key="id"
          max-width="200px"
          class="ma-3"
        >
          <v-img
            :src="slide.preview_image.preview_url"
            class="white--text align-end"
            gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
            height="150px"
          >
            <v-card-actions
              ><v-btn x-small color="primary">Detail</v-btn>
              <v-spacer></v-spacer
              ><v-btn x-small color="error" @click="deleteSlide(slide.id)"
                >Sil</v-btn
              >
            </v-card-actions>
          </v-img>
        </v-card>

        <v-card width="200px" max-width="200px">
          <file-pond
            name="slide"
            server="/api/upload/slide/ThirdSlider"
            :reload="true"
          />
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
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";
import FilePond from "../../../components/FilePond.vue";
export default {
  props: ["slides"],
  components: {
    AdminLayout,
    FilePond,
  },
  data: () => ({
    snackbar: false,
    message: "",
  }),
  computed: {
    TopSlider() {
      return this.slides.filter(
        (element) => element.slide_name === "TopSlider"
      );
    },
    FirstSlider() {
      return this.slides.filter(
        (element) => element.slide_name === "FirstSlider"
      );
    },
    SecondSlider() {
      return this.slides.filter(
        (element) => element.slide_name === "SecondSlider"
      );
    },
    ThirdSlider() {
      return this.slides.filter(
        (element) => element.slide_name === "ThirdSlider"
      );
    },
  },
  methods: {
    deleteSlide(id) {
      let afterRequest = {
        onSuccess: () => {},
        onError: () => {},
      };
      this.$inertia.delete("/slide/" + id, afterRequest);
    },
  },
};
</script>

<style>
</style>