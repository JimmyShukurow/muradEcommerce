<template>
  <MobileLayout>

    <v-container>
      <v-layout class=" gradientclass ">
        <span class="white--text font-weight-bold title">{{ $page.props.user.name }}</span>
      </v-layout>
      <div class="row justify-center mb-5">
        <v-sheet class="navs rounded-lg" outlined elevation="15">
          Salam!
        </v-sheet>
      </div>
      <v-divider class="ml-8"></v-divider>
      <v-sheet class="py-3 d-flex justify-space-between">
        <div>
          <v-icon class="mr-2">mdi-basket</v-icon>
          siparishlerim
        </div>
        <v-icon color="orange" class="mr-1">mdi-chevron-right</v-icon>
      </v-sheet>
      <v-divider class="ml-8"></v-divider>
      <v-sheet class="py-3 d-flex justify-space-between">
        <div>
          <v-icon class="mr-2">mdi-cog</v-icon>
          shifre degishtir
        </div>
        <v-icon color="orange" class="mr-1">mdi-chevron-right</v-icon>
      </v-sheet>
      <v-divider class="ml-8"></v-divider>
      <v-sheet class="py-3 d-flex justify-space-between">
        <div>
          <v-icon class="mr-2">mdi-wallet</v-icon>
          cuzdanim
        </div>
        <v-icon color="orange" class="mr-1">mdi-chevron-right</v-icon>
      </v-sheet>
      <v-divider class="ml-8"></v-divider>
      <v-sheet class="py-3 d-flex justify-space-between">
        <div>
          <v-icon class="mr-2">mdi-help-circle</v-icon>
          Yardim
        </div>
        <v-icon color="orange" class="mr-1">mdi-chevron-right</v-icon>
      </v-sheet>
      <v-divider class="ml-8"></v-divider>
    </v-container>
  </MobileLayout>
</template>

<script>
import MobileLayout from "../../../Layouts/mobile/MobileLayout.vue";
export default {
  components: {
    MobileLayout
  }
};
</script>

<style scoped>
.gradientclass {
  position: relative;
  width: 100vw;
  margin-left: -50vw;
  left: 50%;
  margin-top: -4%;
  top: 4%;
  background: rgb(255, 189, 5);
  background: linear-gradient(180deg, rgba(255, 189, 5, 1) 0%, rgba(177, 111, 2, 1) 100%);
  padding: 30px 30px 70px 30px;
}

.gradientclass>span {
  transform: translateY(30px);
}

.navs {
  width: 85%;
  padding: 20px;
  transform: translateY(-20px);

}
</style>