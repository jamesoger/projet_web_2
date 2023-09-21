require('./bootstrap')

import { createApp } from 'vue'
// import Forfait from './components/Forfait'

const app = createApp([])

// app.component('Forfait', Forfait)
app.mount('#app_panier')
app.mount('#app_user')
app.mount('#app_accueil')
