import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import axios from 'axios';
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

// Navigation guard для проверки редиректов
router.beforeEach(async (to, from, next) => {
    try {
        // Определяем alias для проверки редиректа
        let alias = to.path === '/' ? 'home' : to.path.replace(/^\//, '');
        
        // Для статических страниц используем их путь как alias
        // Для главной страницы пробуем несколько алиасов
        if (to.path === '/') {
            // Пробуем разные алиасы для главной
            const aliasesToTry = ['home', 'index', 'main', 'glavnaya'];
            for (const tryAlias of aliasesToTry) {
                try {
                    const response = await axios.get(`/api/pages/${tryAlias}/redirect`);
                    if (response.data && response.data.has_redirect && response.data.redirect_url) {
                        const redirectUrl = response.data.redirect_url;
                        if (redirectUrl.startsWith('http://') || redirectUrl.startsWith('https://')) {
                            window.location.href = redirectUrl;
                            return;
                        }
                        next(redirectUrl);
                        return;
                    }
                } catch (e) {
                    // Продолжаем пробовать следующий алиас
                }
            }
        } else {
            // Для других страниц проверяем редирект
            const response = await axios.get(`/api/pages/${alias}/redirect`);
            
            if (response.data && response.data.has_redirect && response.data.redirect_url) {
                const redirectUrl = response.data.redirect_url;
                const currentUrl = window.location.origin + to.fullPath;
                
                // Проверяем, что редирект не ведет на тот же URL
                if (redirectUrl !== currentUrl) {
                    // Если это внешний URL, делаем полный редирект
                    if (redirectUrl.startsWith('http://') || redirectUrl.startsWith('https://')) {
                        window.location.href = redirectUrl;
                        return;
                    }
                    
                    // Если это относительный URL, используем router.push
                    next(redirectUrl);
                    return;
                }
            }
        }
        
        // Если редиректа нет, продолжаем навигацию
        next();
    } catch (error) {
        // В случае ошибки продолжаем навигацию
        console.error('Ошибка проверки редиректа:', error);
        next();
    }
});

// Обработка скролла при переходе между страницами
router.afterEach((to, from) => {
    // При переходе на другие страницы (не главную) - скроллим наверх
    if (to.path !== '/') {
        window.scrollTo(0, 0);
    }
});

// Создание приложения
const app = createApp(App);
app.use(router);
app.mount('#app');