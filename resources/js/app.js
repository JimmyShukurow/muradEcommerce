require('./bootstrap');

import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import vuetify from "./vuetify";
import VueI18n from 'vue-i18n'


Vue.use(plugin)
Vue.use(VueI18n)
const messages = {
    en: {
        "cancel": 'Cancel',
        "OK": 'OK',
        "confirm": "Confirm",
        "Are you sure you want to delete this record?": "Are you sure you want to delete this record?"
      },
      tkm: {
        "cancel": 'Yok',
        "OK": 'Bass',
        "confirm": "Tassykla",
        "Are you sure you want to delete this record?": "Sen Uwerynmy?"

      },
  }
  const i18n = new VueI18n({
    locale: 'tkm', 
    messages,
  })

const el = document.getElementById('app')
export const bus = new Vue();


new Vue({
    vuetify,
    i18n: i18n,
    render: h => h(App, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => require(`./Pages/${name}`).default,
        },
    }),
}).$mount(el)