<template>
    <file-pond
      name="images"
      ref="pond"
      v-bind:label-idle = $t(hint)
      v-bind:allow-multiple="mulitpleImage"
      accepted-file-types="image/jpeg, image/png"
      server="/api/upload"
    />
</template>

<script>
import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
// Create component
const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview
);
export default {
    props:['mulitpleImage'],
    data:()=>({
        hint:"Drop files here..."
    })
};
</script>

<style>
</style>