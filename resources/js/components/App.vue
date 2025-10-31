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
                  <a href="" class="native-button"> Оставить заявку </a>
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
                href=""
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
            <p><img :src="imageUrl('phone.svg')" alt="" /> +7 (924) 600-36-49</p>
            <p>
              <img :src="imageUrl('conver-white.svg')" alt="" /> hello@rezaresurs.ru
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
  methods: {
    imageUrl(path) {
      // Helper для путей к изображениям из public
      return path.startsWith('/') ? path : `/rez/images/${path}`;
    },
    closeMenu() {
      this.menuOpen = false;
    }
  }
}
</script>

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
