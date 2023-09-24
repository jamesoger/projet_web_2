require('./bootstrap')

import { createApp } from 'vue';
import Menu from './components/Menu';


const appNav = createApp(Menu);

// Montez le composant de navigation
appNav.mount('#app_nav');


const app = createApp();


app.mount('#app_prog');
app.mount('#app_panier');
app.mount('#app_user');
app.mount('#app_accueil');
app.mount('#app_billeterie');



