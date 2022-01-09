require('./bootstrap');

import {createApp} from 'vue'
import GameList from './components/GameList'
import Select2 from 'vue3-select2-component';


const app = createApp({});

app.component('game-list', GameList);
app.component('select2', Select2);
app.mount('#app')
