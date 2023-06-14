import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from "vue";
import Quizz from "./Quizz.vue";

createApp(Quizz).mount('#vue');
