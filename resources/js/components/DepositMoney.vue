<template>
  <div>
    <v-text-field type="number" outlined placeholder="Nace pul tashlamaly..." v-model="quantity"></v-text-field>
    <v-btn color="orange white--text" @click="depositeMoney()">Doldur</v-btn>
    <v-snackbar :color="snackbarColor" v-model="snackbar" timeout="2000" transition="scale-transition">
      {{ message }}
      <template v-slot:action="{ attrs }">
        <v-btn dark fab text v-bind="attrs" @click="snackbar = false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </template>
    </v-snackbar>
  </div>

</template>

<script>
export default {
  props: ['user_id'],
  data: () => ({
    quantity: 0,
    snackbarColor: 'success',
    
  }),
  methods: {

    depositeMoney() {
      let afterRequest = {
        onSuccess: () => {
          this.quantity = 0
        },
        onError: () => { }

      }
      this.$inertia.post('/wallet/deposit', { "user_id": this.user_id, "new_quantity": this.quantity }, afterRequest);
    }
  }
}
</script>

<style>
</style>