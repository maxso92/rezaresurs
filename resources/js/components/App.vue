<template>
  <div class="app-container">
    <nav class="section_half sticky-top page-nav">
      <div class="container">
        <div class="row">
          <div class="col page-nav__root">
            <div class="page-nav__logo-wrap">
              <router-link to="/">
                <img
                  class="page-nav__logo"
                  loading="lazy"
                  :src="imageUrl('logo.svg')"
                  alt=""
                />
              </router-link>
            </div>
            <div class="page-nav__menu-wrap">
              <input
                type="checkbox"
                id="burgermenu"
                class="page-nav__menu-toggle-fake"
                :checked="menuOpen"
                @change="menuOpen = $event.target.checked"
              />
              <div class="page-nav__menu">
                <div class="page-nav__menu-header">
                  <label
                    for="burgermenu"
                    class="page-nav__side-element page-nav__side-element-icon page-nav__menu-toggle"
                  >
                    <img :src="imageUrl('close.svg')" alt="" />
                  </label>
                </div>
                <div class="page-nav__menu-items">
                  <router-link to="/about" class="page-nav__menu-item" @click="closeMenu">
                    <label for="burgermenu"> О компании</label>
                  </router-link>
                  <router-link to="/about" class="page-nav__menu-item" @click="closeMenu">
                    <label for="burgermenu"> Преимущества </label>
                  </router-link>
                  <router-link to="/about" class="page-nav__menu-item" @click="closeMenu">
                    <label for="burgermenu">Нам доверяют </label>
                  </router-link>
                  <router-link to="/about" class="page-nav__menu-item" @click="closeMenu">
                    <label for="burgermenu">Услуги </label>
                  </router-link>
                  <router-link to="/about" class="page-nav__menu-item" @click="closeMenu">
                    <label for="burgermenu">FAQ</label>
                  </router-link>
                  <router-link to="/contact" class="page-nav__menu-item" @click="closeMenu">
                    <label for="burgermenu"> Контакты </label>
                  </router-link>
                </div>
                <div class="page-nav__menu-social social-links">
                  <a href="" class="social-links__link">
                    <img :src="imageUrl('social/whatsapp.svg')" alt="" />
                  </a>
                  <a href="" class="social-links__link">
                    <img :src="imageUrl('social/telegram.svg')" alt="" />
                  </a>
                  <a href="" class="social-links__link">
                    <img :src="imageUrl('social/message.svg')" alt="" />
                  </a>
                </div>
                <div class="page-nav__menu-actions mt-4">
                  <a href="https://t.me/reazaresurs?text=Добрый%20день,%20пишу%20вам%20с%20сайта%20☀%EF%B8%8F" target="_blank" class="native-button"> Оставить заявку </a>
                </div>
              </div>
            </div>
            <div class="page-nav__side-elements">
              <a
                class="page-nav__side-element page-nav__side-element-icon"
                href=""
              >
                <img loading="lazy" :src="imageUrl('social/telegram.svg')" alt="" />
              </a>
              <a
                class="page-nav__side-element page-nav__side-element-action"
                href="https://t.me/reazaresurs?text=Добрый%20день,%20пишу%20вам%20с%20сайта%20☀%EF%B8%8F"
                target="_blank"
              >
                Оставить заявку
              </a>
              <label
                for="burgermenu"
                class="page-nav__side-element page-nav__side-element-icon page-nav__menu-toggle"
              >
                <img :src="imageUrl('burger.svg')" alt="" />
              </label>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <main>
      <router-view v-slot="{ Component }">
        <transition name="fade" mode="out-in">
          <component :is="Component" />
        </transition>
      </router-view>
    </main>
    
    <footer class="section section_footer inverse-colors">
      <div class="container page-footer">
        <div class="row">
          <div class="col-12 col-md-3">
            <img
              class="page-footer__logo"
              :src="imageUrl('logo-white.svg')"
              alt=""
            />

            <h4 class="page-footer__header">Контакты</h4>
            <p><img :src="imageUrl('phone.svg')" alt="" /> <a href="tel:+79994447980" class="inline-link">+7 (999) 444-79-80</a></p>
            <p>
              <img :src="imageUrl('conver-white.svg')" alt="" /> <a href="mailto:sales@rezaresurs.ru" class="inline-link">sales@rezaresurs.ru</a>
            </p>
            <p>
              <img :src="imageUrl('pin.svg')" alt="" /> Адрес офиса: 664047, Иркутск,
              ул.Советская, дом 3, этаж 5, офис 505
            </p>
            <div class="mt-4">
              <a href="">
                <span class="block-underline">
                  Политика конфиденциальности</span
                ></a
              >
              <a href=""><span class="block-underline">Договор оферты</span></a>
            </div>
          </div>
          <div class="col-12 col-md-9 row">
            <div class="col row order-4 order-md-0 mt-4">
              <div class="col-7 col-md-12">
                <h4 class="page-footer__header">О компании</h4>
                <router-link to="/about">История компании</router-link>
                <a href="">Аутсорсинг персонала на склад</a>
                <a href="">Франшиза</a>
                <a href="">Найти подработку</a>
                <a href="">Работа у нас</a>
                <router-link to="/contact">Контакты</router-link>
              </div>
              <div class="col">
                <h4 class="page-footer__header">Реквизиты компании</h4>
                <p>ИНН: 3812530790</p>
                <p>ОГРН: 1193850037094</p>
              </div>
            </div>
            <div class="col-12 col-md-3 mt-4">
              <h4 class="page-footer__header">Аутсоринг</h4>

              <a href="">Аутсорсинг производственных процессов</a>
              <a href="">Аутсорсинг персонала на склад</a>
              <a href="">Аутсорсинг в ритейле</a>
              <a href="">Парт-тайм исполнители в магазины</a>
              <a href="">Аутсорсинг в строительстве</a>
              <a href="">Аутсорсинг в общественном питании</a>
              <a href="">Аутсорсинг в сфере гостеприимства</a>

              <h4 class="page-footer__header mt-5">Аутстаффинг</h4>
              <a href="">Аутстаффинг на производство</a>
              <a href="">Аутстаффинг на сельскохоз предприятия</a>
            </div>
            <div class="col-12 col-md-6 row flex-row-reverse flex-md-row mt-4">
              <div class="col col-md-4">
                <h4 class="page-footer__header">Филиалы</h4>
                <a href="">Технологии</a>
                <a href="">Тарифы</a>
                <a href="">Блог</a>
                <a href="">Контакты</a>
              </div>
              <div class="col-7 col-md-8">
                <h4 class="page-footer__header">Другие услуги</h4>
                <a href="">Кадровое агентство</a>
                <a href="">Массовый подбор и рекрутинг</a>
                <a href="">Организация северных вахт</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      menuOpen: false
    }
  },
  watch: {
    $route() {
      this.menuOpen = false;
    }
  },
  mounted() {
    // Запрет контекстного меню (правый клик)
    document.addEventListener('contextmenu', this.preventContextMenu);
    
    // Запрет выделения и копирования
    document.addEventListener('copy', this.preventCopy);
    document.addEventListener('cut', this.preventCut);
    
    // Запрет перетаскивания изображений
    document.addEventListener('dragstart', this.preventDrag);
    
    // Запрет сохранения изображений через клавиатуру
    document.addEventListener('keydown', this.preventKeyboardShortcuts);
  },
  beforeUnmount() {
    // Удаляем обработчики при размонтировании компонента
    document.removeEventListener('contextmenu', this.preventContextMenu);
    document.removeEventListener('copy', this.preventCopy);
    document.removeEventListener('cut', this.preventCut);
    document.removeEventListener('dragstart', this.preventDrag);
    document.removeEventListener('keydown', this.preventKeyboardShortcuts);
  },
  methods: {
    imageUrl(path) {
      // Helper для путей к изображениям из public
      return path.startsWith('/') ? path : `/rez/images/${path}`;
    },
    closeMenu() {
      this.menuOpen = false;
    },
    preventContextMenu(e) {
      e.preventDefault();
      return false;
    },
    preventCopy(e) {
      e.preventDefault();
      return false;
    },
    preventCut(e) {
      e.preventDefault();
      return false;
    },
    preventDrag(e) {
      e.preventDefault();
      return false;
    },
    preventKeyboardShortcuts(e) {
      // Запрет Ctrl+C, Ctrl+X, Ctrl+U (просмотр кода), Ctrl+S (сохранение)
      if (e.ctrlKey && (e.key === 'c' || e.key === 'x' || e.key === 'u' || e.key === 's')) {
        e.preventDefault();
        return false;
      }
      // Запрет F12 (DevTools)
      if (e.key === 'F12') {
        e.preventDefault();
        return false;
      }
    }
  }
}
</script>

<style>
/* Глобальные стили защиты контента */
* {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-touch-callout: none;
}

/* Запрет перетаскивания изображений */
img {
  -webkit-user-drag: none;
  -khtml-user-drag: none;
  -moz-user-drag: none;
  -o-user-drag: none;
  user-drag: none;
}

/* Разрешаем выделение для инпутов и текстовых полей */
input,
textarea,
[contenteditable="true"] {
  -webkit-user-select: text;
  -moz-user-select: text;
  -ms-user-select: text;
  user-select: text;
}

/* Стили для изображений чтобы их нельзя было выделить */
img::selection {
  background: transparent;
}

img::-moz-selection {
  background: transparent;
}

/* Inline ссылки в футере (для контактов) */
.page-footer .inline-link {
  display: inline !important;
  margin-bottom: 0 !important;
  color: inherit;
  text-decoration: none;
}

.page-footer .inline-link:hover {
  text-decoration: underline;
}
</style>

<style scoped>
.app-container {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

main {
  flex: 1;
}

/* Transitions для быстрой загрузки страниц */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

/* Стили для меню */
.page-nav__menu {
  transition: transform 0.3s ease;
}

/* Router-link стили */
a {
  color: inherit;
  text-decoration: none;
}

a:hover {
  color: inherit;
}
</style>
