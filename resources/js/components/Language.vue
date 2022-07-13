<template>
  <v-col cols="2">
    <v-select
      width="50px"
      :items="languages"
      outlined
      v-model="selectedLanguage"
      :label="$t('Language')"
    ></v-select>
  </v-col>
</template>

<script>
export default {
  data: () => ({
    languages: ["EN", "TKM", "RUS", "TR"],
    selectedLanguage: "EN"
  }),
  watch: {
    selectedLanguage(val) {
      this.$i18n.locale = val.toLowerCase();
    }
  }
};
</script>

<style>
</style>