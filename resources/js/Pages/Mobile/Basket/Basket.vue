<template>
  <MobileLayout>
    <v-container>
      <v-sheet class="mb-2">
        <h1>{{ $t('My Basket') }}</h1>
        <v-divider></v-divider>
      </v-sheet>
      <v-row>
        <v-col v-for="(product, id) in basket" :key="id" cols="12">
          <v-card>
            <v-subheader class="py-0 font-weight-black">{{ product.product.name[$i18n.locale] }}</v-subheader>
            <v-row class="little-margin">
              <v-col class="mx-auto my-auto pa-0">
                <v-sheet class="mx-auto">
                  <v-img :src="product.product.preview_image.preview_url" max-width="100" max-height="100"></v-img>
                </v-sheet>
              </v-col>
              <v-col class="mx-auto my-auto px-0">
                <v-layout align-center>
                  <v-row class="mx-auto" align="center" justify="center">
                    <v-col cols="12" align="center" class="py-1">
                      <v-btn fab elevation="0" x-small dark color="green"
                        @click="[product.quantity < product.product.quantity ? product.quantity++ : '']">
                        <v-icon>mdi-plus</v-icon>
                      </v-btn>
                    </v-col>
                    <v-col cols="12" class="mx-auto" align="center" justify="center">
                      <span class="rounded elevation-1 pa-3"> {{ product.quantity }}</span>
                    </v-col>
                    <v-col cols="12" align="center" class="py-1">
                      <v-btn fab elevation="0" x-small dark color="red"
                        @click="[product.quantity > 0 ? product.quantity-- : '']">
                        <v-icon>mdi-minus</v-icon>
                      </v-btn>
                    </v-col>
                  </v-row>
                </v-layout>
              </v-col>
              <v-col class="mx-auto my-auto px-0">
                <span class="rounded elevation-1 pa-3">{{ product.quantity * product.product.price + 'm' }}</span>
              </v-col>
              <v-col class="mx-auto my-auto">
                <v-layout align-center>
                  <v-btn icon class="mx-auto" @click="delRecord(product.id)">
                    <v-icon color="error" large>mdi-delete</v-icon>
                  </v-btn>
                </v-layout>
              </v-col>
            </v-row>
          </v-card>
        </v-col>
      </v-row>
      <v-divider class="my-5"></v-divider>
      <v-row class="ma-5">
        <span class="text-h5"> {{ $t('Sum:') }} </span>
        <v-spacer></v-spacer>
        <span class="text-h5"> {{ totalPrice }} manat</span>
      </v-row>
      <v-card class="mb-5">
        <v-btn block dark color="orange" @click="openWallet"> {{ $t('Pay From Wallet') }} </v-btn>
        <v-expand-transition>
          <div v-show="wallet">
            <v-divider></v-divider>
            <v-card-text ref="wallet">
              <div class="text-center text-h4 my-5">
                {{ $t('In the Wallet:') + ' ' + walletsum + ' ' + 'manat' }}
                <v-row class="mt-5">
                  <v-select  dense outlined :label="$t('State')" v-model="state" color="orange" :items="states[lang]" class="col-4"></v-select>
                  <v-text-field outlined dense :label="$t('Address')" color="orange" v-model="address" class="col-8" required></v-text-field>
                </v-row>
              </div>
              <v-row class="mx-2 my-1">
                <v-btn dark color="primary" @click="payFromWallet()"> {{ $t('Pay') }} </v-btn>
                <v-spacer></v-spacer>
                <span class="text-h5 ">{{ totalPrice }} manat </span>
              </v-row>
            </v-card-text>
          </div>
        </v-expand-transition>
      </v-card>
      <v-card>
        <v-btn block color="orange" disabled @click="openVisaCard"> {{ $t('Pay All') }} </v-btn>
        <v-expand-transition>
          <div v-show="show">
            <v-divider></v-divider>
            <v-card-text ref="visa">
              <v-form>
                <v-text-field label="Card Number" outlined></v-text-field>
                <v-text-field label="Holder Name" outlined></v-text-field>
                <v-row>
                  <v-col>
                    <v-text-field label="Expiration Date" outlined></v-text-field>
                  </v-col>
                  <v-col>
                    <v-text-field label="CCV" outlined></v-text-field>
                  </v-col>
                </v-row>
                <v-row class="mx-2 my-1">
                  <v-btn dark color="primary" @click="pay()"> {{ $t('Pay') }} </v-btn>
                  <v-spacer></v-spacer>
                  <span class="text-h5">{{ totalPrice }} manat </span>
                </v-row>
              </v-form>
            </v-card-text>
          </div>
        </v-expand-transition>
      </v-card>
      <v-snackbar :color="sanckbarColor" v-model="snackbar" timeout="2000" transition="scale-transition">
        {{ message }}
        <template v-slot:action="{ attrs }">
          <v-btn dark fab text v-bind="attrs" @click="snackbar = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </template>
      </v-snackbar>
      <Confirm ref="confirm" />
    </v-container>
  </MobileLayout>
</template>

<script>
import MobileLayout from "../../../Layouts/mobile/MobileLayout.vue";
import { InertiaLink } from "@inertiajs/inertia-vue";
import Confirm from "../../../components/ConfirmDlg.vue";

export default {
  props: ["basket", "walletsum"],
  components: {
    MobileLayout,
    InertiaLink,
    Confirm
  },
  data: () => ({
    show: false,
    wallet: false,
    state: null,
    address: null,
    snackbar: false,
    sanckbarColor: 'success',
    message: null,
    states: {
      "en":["Ashgabat", "Ahal", "Balkan", "Dashoguz", "Lebap", "Mary"],
      "tkm":["Aşgabat", "Ahal", "Balkan", "Daşoguz", "Lebap", "Mary"],
      "ru":["Ашхабад", "Ахал", "Балкан", "Дашогуз", "Лебап", "Мaры"],
    }
  }),
  computed: {
    totalPrice() {
      let total = 0;
      this.basket.forEach(product => {
        total += product.quantity * product.product.price;
      });
      return total;
    },
    lang() {
      return this.$i18n.locale;
    }
  },
  methods: {
    async delRecord(id) {
      if (
        await this.$refs.confirm.open(
          this.$t("confirm"),
          this.$t("Are you sure you want to delete this record?")
        )
      ) {
        this.deleteProductFromBakset(id);
      }
    },
    deleteProductFromBakset(id) {
      let afterRequest = {
        onSuccess: (data) => {
          this.sanckbarColor = 'success'
          this.snackbar = true;
          this.message = data.props.message.success
        },
        onError: (data) => {
          this.sanckbarColor = 'error'
          this.snackbar = true;
          this.message = data.error;
        }
      };
      this.$inertia.delete('/mobile/basket/remove/' + id, afterRequest);
    },
    openVisaCard() {
      this.show = !this.show;
      setTimeout(() => {
        this.$vuetify.goTo(this.$refs.visa);
      }, 100);
    },
    openWallet() {
      this.wallet = !this.wallet;
      setTimeout(() => {
        this.$vuetify.goTo(this.$refs.wallet);
      }, 100);
    },
    pay() {
      if (this.address == null || this.state == null) {
        this.sanckbarColor = 'error';
        this.snackbar = true;
        this.message = this.$t('Address');
        this.address = null;
        return;
      }
      let afterRequest = {
        onSuccess: (data) => {
          this.sanckbarColor = 'success';
          this.snackbar = true;
          this.message = data.props.message.success;
          this.show = false;
        },
        onError: () => { }
      }
      this.$inertia.post('/orders', { "basket": this.basket, "total_price": this.totalPrice, "address": this.state + ', ' + this.address }, afterRequest);
    },
    payFromWallet() {
      if (this.address == null || this.state == null) {
        this.sanckbarColor = 'error';
        this.snackbar = true;
        this.message = this.$t('Address');
        this.address = null;
        this.state = null;
        return;
      }
      if (this.walletsum >= this.totalPrice && this.wallet > 0) {
        let afterRequest = {
          onSuccess: (data) => {
            this.sanckbarColor = 'success';
            this.snackbar = true;
            this.message = data.props.message.success;
            this.address = null;
            this.state = null;
          },
          onError: () => { }
        }
        this.$inertia.post('/orders', { "basket": this.basket, "total_price": this.totalPrice, "address": this.state + ', ' + this.address }, afterRequest);
      } else {
        this.sanckbarColor = 'error'
        this.snackbar = true;
        this.message = this.$t('Not enough money');
      }
    }
  }
};
</script>

<style scoped>
.v-image {
  border: solid 2px orange;
}

.little-margin {
  margin: 5px;
}

.centerVertical {
  padding-top: 50px !important;
}
</style>