<template>
  <AdminLayout>
    <v-form>
        <v-container>
            <v-text-field :label="$t('name')" outlined v-model="form.name"> </v-text-field>
        </v-container>
    </v-form>
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";
export default {
    props:['user'],
    components: {
        AdminLayout
    },
    data:()=>({
        form: {}
    }),
    mounted() {
        this.form = this.user
    }
}
</script>

<style>

</style>