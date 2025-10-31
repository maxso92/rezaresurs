import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './components/App.vue';
import Home from './components/Home.vue';
import About from './components/About.vue';
import PageView from './components/PageView.vue';
import Contact from './components/Contact.vue';

// Настройка роутера
const router = createRouter({
    history: createWebHistory(),
    routes: [{
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/contact',
            name: 'contact',
            component: Contact
        },
        {
            path: '/:alias',
            name: 'page',
            component: PageView
        }
    ]
});

// Создание приложения
const app = createApp(App);
app.use(router);
app.mount('#app');