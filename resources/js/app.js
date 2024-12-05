import './bootstrap';

import Alpine from 'alpinejs';

import {createApp} from "vue";
import ChatComponent from "./components/ChatComponent.vue";
const  app=createApp({});
app.component('chat-component', ChatComponent);
app.mount('#app');


window.Alpine = Alpine;

Alpine.start();
