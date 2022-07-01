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
        "Are you sure you want to delete this record?": "Are you sure you want to delete this record?",
        "no Image":"no Image",
        "name":"Name",
        "Language":"Language",
        "Dashboard": "Dashboard",
        "Menus": "Menus",
        "Slides": "Slides",
        "Users": "Users",
        "Products": "Products",
        "Roles": "Roles",
        "Add new Product": "Add new Product",
        "Add new Role": "Add new Role",
        "Product was deleted": "Product was deleted",
        "Product was updated": "Product was updated",
        "Product was saved" : "Product was saved",
      },
    tkm: {
        "cancel": 'Yok',
        "OK": 'Bass',
        "confirm": "Tassykla",
        "Are you sure you want to delete this record?": "Sen Uwerynmy?",
        "no Image":"Surat Yok",
        "name":"Ady",
        "Language":"Dil",
        "Dashboard": "Kontol Panel",
        "Menus": "Menyular",
        "Slides": "Slaydlar",
        "Users": "Ulanyjylar",
        "Products": "Önümler",
        "Roles": "Rollar",
        "Add new Product": "Taze önüm goş",
        "Add new Role": "Taze rol goş",
        "Product was deleted": "Önüm Yoklandy",
        "Product was updated": "Önüm Tazelendi",
        "Product was saved" : "Taze  Önüm Goşuldy",

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