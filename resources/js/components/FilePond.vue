<template>
  <file-pond
    :name="name"
    ref="pond"
    v-bind:label-idle="$t(hint)"
    v-bind:allow-multiple="mulitpleImage"
    accepted-file-types="image/jpeg, image/png"
    :server="server"
    v-on:processfile="handleProcessFile"
  />
</template>

<script>
import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import { Inertia } from "@inertiajs/inertia";
// Create component
const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview
);
export default {
  props: {
    mulitpleImage: {
      type: Boolean,
    },
    name: {
      type: String,
      default: "images",
    },
    server: {
      type: String,
      default: "/api/upload",
    },
    reload: {
      type: Boolean,
      default: false,
    },
  },
  data: () => ({
    hint: "Drop files here...",
  }),
  methods: {
    handleProcessFile: function (error, file) {
      if (this.reload) {
        Inertia.reload();
        this.$refs.pond.removeFile(file);
      }
    },
  },
};
</script>

<style>
</style>