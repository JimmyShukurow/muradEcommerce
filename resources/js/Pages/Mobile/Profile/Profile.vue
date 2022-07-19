<template>
  <MobileLayout>
    <v-container>
      <v-layout class=" gradientclass ">
        <span class="white--text font-weight-bold title">{{ $page.props.user.name }}</span>
      </v-layout>
      <div class="row justify-center mb-5">
        <v-sheet class="navs rounded-lg" outlined elevation="15">
          {{$t('Hello!')}}
        </v-sheet>
      </div>
      <v-divider class="ml-8"></v-divider>
      <v-sheet class="py-3 d-flex justify-space-between">
        <div>
          <v-icon class="mr-2">mdi-basket</v-icon>
          {{$t('Orders')}}
        </div>
        <v-icon color="orange" class="mr-1">mdi-chevron-right</v-icon>
      </v-sheet>
      <v-divider class="ml-8"></v-divider>
      <v-sheet class="py-3 d-flex justify-space-between">
        <div>
          <v-icon class="mr-2">mdi-cog</v-icon>
          {{$t('Change Password')}}
        </div>
        <v-icon color="orange" class="mr-1">mdi-chevron-right</v-icon>
      </v-sheet>
      <v-divider class="ml-8"></v-divider>
      <InertiaLink as="v-sheet" href="/mobile/wallet" class="py-3 d-flex justify-space-between">
        <div>
          <v-icon class="mr-2">mdi-wallet</v-icon>
          {{ $t('Wallet')}}
        </div>
        <v-icon color="orange" class="mr-1">mdi-chevron-right</v-icon>
      </InertiaLink>
      <v-divider class="ml-8"></v-divider>
      <v-sheet class="py-3 d-flex justify-space-between">
        <div>
          <v-icon class="mr-2">mdi-help-circle</v-icon>
          {{$t('Help')}}
        </div>
        <v-icon color="orange" class="mr-1">mdi-chevron-right</v-icon>
      </v-sheet>
      <v-divider class="ml-8"></v-divider>
      <InertiaLink as="v-sheet" href="/logout" method="post" class="py-3 d-flex justify-space-between">
        <div>
          <v-icon class="mr-2">mdi-logout</v-icon>
          {{$t('Logout')}}
        </div>
        <v-icon color="orange" class="mr-1">mdi-chevron-right</v-icon>
      </InertiaLink>
      <v-divider class="ml-8"></v-divider>
    </v-container>
  </MobileLayout>
</template>

<script>
import MobileLayout from "../../../Layouts/mobile/MobileLayout.vue";
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
  components: {
    MobileLayout,
    InertiaLink,
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