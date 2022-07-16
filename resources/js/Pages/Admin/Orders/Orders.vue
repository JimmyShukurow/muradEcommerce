<template>
    <AdminLayout>
        <v-row>
            <h1 class="ma-5">{{ $t("Orders") }}</h1>
            <v-spacer></v-spacer>
        </v-row>
        <v-simple-table class="m-5">
            <thead>
                <tr>
                    <th class="text-left headline">{{ $t("User") }}</th>
                    <th class="text-left headline">{{ $t("Total_price") }}</th>
                    <th class="text-left headline">{{ $t("Created_at") }}</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="(order, id) in orders" :key="id">
                    <td class="deep-orange--text">{{ order.user.name }}</td>
                    <td class="deep-orange--text">{{ order.total_price }} manat</td>
                    <td class="deep-orange--text">{{ order.created_at }}</td>
                </tr>
            </tbody>
        </v-simple-table>
    </AdminLayout>
</template>

<script>
import AdminLayout from "../../../Layouts/admin/Admin.vue";
import { InertiaLink } from "@inertiajs/inertia-vue";
export default {
    props: ["orders"],
    components: {
        AdminLayout,
        InertiaLink,
    }
}
</script>

<style>
</style>