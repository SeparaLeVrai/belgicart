import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from "vue";
import Quizz from "./Quizz.vue";
import ToTheTop from "./ToTheTop.vue";
// import App from './App.vue';

createApp(Quizz).mount('#vue');
createApp(ToTheTop).mount('#ttt');
// createApp(App).mount('#sliders');
