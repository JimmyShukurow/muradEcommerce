<template>
    <MobileLayout>
        <v-container>
            <v-layout class=" gradientclass ">
                <span class="white--text font-weight-bold title">{{ $page.props.user.name }}</span>
            </v-layout>
            <div class="row justify-center mb-5">
                <v-sheet class="navs rounded-lg" outlined elevation="15">
                    My Wallet
                </v-sheet>
            </div>
            <div v-if="!paycheckopen" class="text-center text-h4 border rounded-lg">
                {{user.wallet.quantity + ' manat'}}
            </div>
            <div v-if="client" class="text-center text-h4 border rounded-lg">
                {{client.wallet.quantity + ' manat'}}
            </div>
            <v-btn v-if="!paycheckopen" block class="mt-5" color="success" @click="pay=!pay">Pul tashla</v-btn>

            <div v-if="url && pay" class="text-center mt-5 pa-2 orange rounded-lg">
                <QRcode :url="url"></QRcode>
            </div>
            <div v-if="paycheckopen" class="text-center mt-5 pa-2 rounded-lg">
                <DepositMoney :user_id="client.id" ></DepositMoney>
            </div>
        </v-container>
    </MobileLayout>
</template>

<script>
import MobileLayout from "../../../Layouts/mobile/MobileLayout.vue";
import QRcode from "../../../components/QRcode.vue";
import DepositMoney from "../../../components/DepositMoney.vue";

export default {
    props: ['user', 'client', 'url', 'paycheckopen'],
    components: {
        MobileLayout,
        QRcode,
        DepositMoney
    },
    data:()=>({
        pay:false
    })

}
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
.border {
    border: 2px orange solid;
}
</style>