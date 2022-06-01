require('./bootstrap');

import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import vuetify from "./vuetify";

Vue.use(plugin)

const el = document.getElementById('app')
export const bus = new Vue();


new Vue({
    vuetify,
    render: h => h(App, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => require(`./Pages/${name}`).default,
        },
    }),
}).$mount(el)