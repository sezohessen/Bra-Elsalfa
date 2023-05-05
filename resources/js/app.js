import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

import routes from './routes.js';
import Header from './components/Header.vue';


import App from './App.vue';

const router = createRouter({
  history: createWebHistory(),
  routes
});

const app = createApp(App,{
  components: {
    Header,
  }
});

app.use(router);

app.mount('#app');

