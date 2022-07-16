<template>
  <v-layout class="ma-2">
    <v-row>
      <InertiaLink href="/users" as="v-card" class="ma-5" height="200px" width="30%" color="#34eb52">
        <v-row class="ma-1 display-2 blue--text">
          <div style="width:100%">
            <v-row class="pa-5">
              {{ $t('Users') }}
              <v-spacer></v-spacer>
              <v-btn depressed dark fab color="blue">
                <v-icon large>mdi-account</v-icon>
              </v-btn>
            </v-row>
          </div>
          <v-row class="ma-5">
            <v-spacer></v-spacer>
            {{ users_count }}
          </v-row>
        </v-row>
      </InertiaLink>
      <InertiaLink href="/products" as="v-card" class="ma-5" height="200px" width="30%" color="#d534eb">
        <v-row class="ma-1 display-2 red--text">
          <div style="width:100%">
            <v-row class="pa-5">
              {{ $t('Products') }}
              <v-spacer></v-spacer>
              <v-btn depressed dark fab color="blue">
                <v-icon large>mdi-inbox-multiple</v-icon>
              </v-btn>
            </v-row>
          </div>
          <v-row class="ma-5">
            <v-spacer></v-spacer>
            {{ products_count }}
          </v-row>
        </v-row>
      </InertiaLink>
      <InertiaLink as="v-card" href="/" class="ma-5" height="200px" width="30%" color="#eb4c34">
        <v-row class="ma-1 display-2 yellow--text">
          <div style="width:100%">
            <v-row class="pa-5">
              {{ $t('Sells') }}
              <v-spacer></v-spacer>
              <v-btn depressed dark fab color="blue">
                <v-icon large>mdi-cash</v-icon>
              </v-btn>
            </v-row>
          </div>
          <v-row class="ma-5">
            <v-spacer></v-spacer>
            {{ total_sell }} manat
          </v-row>
        </v-row>
      </InertiaLink>
      <v-data-table :headers="orderHeaders" :items="orderDetails" :items-per-page="10" style="width:45%"
        class="elevation-1 ma-5"></v-data-table>
      <v-data-table :headers="userHeaders" :items="users" :items-per-page="10" style="width:45%"
        class="elevation-1 ma-5"></v-data-table>

    </v-row>

  </v-layout>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
  props: ['orderDetails', 'users', 'products_count', 'users_count', "total_sell"],
  components: {
    InertiaLink,
  },
  data: function () {
    return {
      orderHeaders: [
        { text: 'Önüm', align: 'start', value: 'product.name.tkm' },
        { text: 'Mukdary', value: 'quantity' },
        { text: 'Bahasy', value: 'current_price' },
        { text: 'Jemi Bahasy', value: 'total_price' },
        { text: 'Alnan wagty', value: 'created_at' },
      ],
      userHeaders: [
        { text: 'Ulanyjy', align: 'start', value: 'name' },
        { text: 'Email', value: 'email' },
        { text: 'Role', value: 'roles[0].name' },
        { text: 'Döredilen Wagty', value: 'created_at' },
      ],
    }

  },
};
</script>

<style lang="scss">
.v-list-item__title {
  white-space: pre-wrap !important;
}
</style>