import './bootstrap';
// VueJs
import {createApp} from 'vue'
// import {createPinia} from 'pinia';

import FollowButton from './components/FollowButton.vue'

const app = createApp({})


app.component('follow-button',FollowButton)

app.mount('#app')
