import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.css'



Vue.use(Vuetify)

const opts = {
    icons: {
        iconfont: 'mdi',
    },
    theme: {
        light: true,
        themes: {
            light: {
                primary: '#00379F',
                secondary: '#424242',
                accent: '#82B1FF',
                error: '#FF5252',
                info: '#2196F3',
                success: '#4CAF50',
                warning: '#FFC107',
            },
        },
    }
}

export default new Vuetify(opts)