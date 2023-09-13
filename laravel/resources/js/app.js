require('./bootstrap');

import {createApp} from 'vue';
import Carroussel from './components/Forfait'

const app = createApp([])

app.component('Forfait', Forfait)
app.mount('#app')


