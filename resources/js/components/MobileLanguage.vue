<template>
    <v-layout>
        <v-speed-dial v-model="fab" bottom right direction="top" transition="slide-y-reverse-transition">
            <template v-slot:activator>
                <v-btn v-model="fab" color="orange" dark fab>
                    <v-icon v-if="fab">
                        mdi-close
                    </v-icon>
                    <span v-else>
                        {{ selectedLanguage }}
                    </span>
                </v-btn>
            </template>
            <v-btn fab dark small color="green" @click="selectedLanguage = 'EN'">
                <span>EN</span>
            </v-btn>
            <v-btn fab dark small color="indigo" @click="selectedLanguage = 'TKM'">
                <span>TKM</span>
            </v-btn>
            <v-btn fab dark small color="red" @click="selectedLanguage = 'RU'">
                <span>RU</span>
            </v-btn>
        </v-speed-dial>
    </v-layout>

</template>

<script>
export default {
    data: () => ({
        selectedLanguage: "En",
        fab: false,
    }),
    watch: {
        selectedLanguage(val) {
            this.$i18n.locale = val.toLowerCase();
        }
    },
    mounted() {
        this.selectedLanguage = this.$i18n.locale.toUpperCase()
    }

}
</script>

<style>
</style>