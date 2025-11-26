<template>
  <div class="home-page">
    <div class="container" style="padding-right: 0;">
      <section class="section contacts-section">
        <div class="row section-title">
          <div class="col-12">
            <h1 class="section-title__header contacts-page-title">
              Связаться для обсуждения проектов
            </h1>
          </div>
        </div>
        
        <div class="row" style="margin-right: 0; padding-right: 0;">
          <div class="col-12" style="padding-right: 0; margin-right: 0;">
            <div class="contacts-layout-wrapper" style="width: 100%; max-width: 100%; overflow: hidden;">
              <!-- Left Panel with Gradient -->
              <div class="contacts-layout__left">
                <div class="contacts-gradient-panel image-fade-in">
                  <h2 class="contacts-gradient-panel__title">Контакты компании «РЕЗАРЕСУРС»</h2>
                  <p class="contacts-gradient-panel__text">
                    Мы всегда на связи и готовы ответить на ваши вопросы. Вы можете связаться с нами любым способом.
                  </p>
                  <p class="contacts-gradient-panel__text">
                    Наши специалисты работают по всей России, поэтому мы быстро подключаемся к задачам и поддерживаем клиентов в любых регионах.
                  </p>
                </div>
              </div>
              
              <!-- Right Panel with Contact Blocks -->
              <div class="col contacts-layout__right">
                <div class="contacts-grid">
                  <div class="contacts-grid-row">
                    <!-- Commercial Director -->
                    <div class="col contacts-block contacts-block-director contacts-block-fade-in">
                      <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="contacts-block__icon" style="margin-bottom: 0;">
                          <img :src="imageUrl('contact/user.svg')" alt="Коммерческий директор">
                        </div>
                        <h3 class="contacts-block__title" style="margin-bottom: 0;">Коммерческий директор</h3>
                      </div>
                      <div class="contacts-block__content">
                        <p>Клепиков Матвей Александрович</p>
                        <p><a href="tel:+79950502208">+7 (995) 050-22-08</a></p>
                      </div>
                    </div>
                    
                    <!-- Sales Department -->
                    <div class="col contacts-block contacts-block-phone contacts-block-fade-in">
                      <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="contacts-block__icon" style="margin-bottom: 0;">
                          <img :src="imageUrl('contact/phone.svg')" alt="Отдел продаж">
                        </div>
                        <h3 class="contacts-block__title" style="margin-bottom: 0;">Отдел продаж</h3>
                      </div>
                      <div class="contacts-block__content">
                        <p><a href="tel:+79994447980">+7 (999) 444-79-80</a></p>
                        <p><a href="mailto:sales@rezaresurs.ru">sales@rezaresurs.ru</a></p>
                      </div>
                    </div>
                    
                    <!-- We work throughout Russia -->
                    <div class="col contacts-block contacts-block-russia contacts-block-fade-in">
                      <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="contacts-block__icon" style="margin-bottom: 0;">
                          <img :src="imageUrl('contact/global.svg')" alt="Мы работаем по всей России">
                        </div>
                        <h3 class="contacts-block__title" style="margin-bottom: 0;">Мы работаем по всей России</h3>
                      </div>
                      <div class="contacts-block__content">
                        <p>Наши специалисты доступны во всех регионах страны</p>
                      </div>
                    </div>
                  </div>
                  <div class="contacts-grid-row">
                    <!-- Social Networks -->
                    <div class="col contacts-block contacts-block_social contacts-block-fade-in">
                      <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="contacts-block__icon" style="margin-bottom: 0;">
                          <img :src="imageUrl('contact/internet.svg')" alt="Социальные сети">
                        </div>
                        <h3 class="contacts-block__title" style="margin-bottom: 0;">Социальные сети</h3>
                      </div>
                      <div class="contacts-block__content">
                        <p><a href="https://t.me/reazaresurs" target="_blank">Telegram</a></p>
                        <p><a href="https://api.whatsapp.com/send/?phone=79994447980" target="_blank">WhatsApp</a></p>
                        <p><a href="#" target="_blank">Max</a></p>
                      </div>
                    </div>

                    <!-- Our Office -->
                    <div class="col contacts-block contacts-block-office contacts-block-fade-in">
                      <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="contacts-block__icon" style="margin-bottom: 0;">
                          <img :src="imageUrl('contact/location.svg')" alt="Наш офис">
                        </div>
                        <h3 class="contacts-block__title" style="margin-bottom: 0;">Наш офис</h3>
                      </div>
                      <div class="contacts-block__content">
                        <p>г. Иркутск, ул. Советская, д.3,<br>оф.503 (5 этаж)</p>
                      </div>
                    </div>

                    <!-- Join Us -->
                    <div class="col contacts-block contacts-block-join contacts-block-fade-in">
                      <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="contacts-block__icon" style="margin-bottom: 0;">
                          <img :src="imageUrl('contact/contact.svg')" alt="Присоединяйтесь к нам">
                        </div>
                        <h3 class="contacts-block__title" style="margin-bottom: 0;">Присоединяйтесь к нам</h3>
                      </div>
                      <div class="contacts-block__content">
                        <p><a href="tel:+79998888888">+7 (999) 888-88-88</a></p>
                        <p><a href="mailto:hr@rezaresurs.ru">hr@rezaresurs.ru</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Contact',
  methods: {
    imageUrl(path) {
      // Helper для путей к изображениям из public
      return path.startsWith('/') ? path : `/rez/images/${path}`;
    },
    async loadSeoTags() {
      // Пробуем несколько возможных алиасов страницы контактов
      const aliasesToTry = ['contacts', 'contact'];
      let seo = null;
      
      for (const alias of aliasesToTry) {
        try {
          const response = await axios.get(`/api/pages/${alias}/seo`);
          if (response?.data && (response.data.title || response.data.seo_description || response.data.seo_keyword)) {
            seo = response.data;
            break;
          }
        } catch (e) {
          // продолжим пробовать следующий алиас
        }
      }

      if (!seo) {
        console.warn('SEO для страницы контактов не найдено. Проверьте alias страницы в админке (должен быть "contacts" или "contact").');
        return;
      }

      // Устанавливаем SEO теги
      if (seo.title) {
        document.title = seo.title;
      }

      // Обновляем или создаем meta теги
      this.updateMetaTag('description', seo.seo_description);
      this.updateMetaTag('keywords', seo.seo_keyword);

      // Open Graph теги
      this.updateMetaTag('og:title', seo.seo_social_title || seo.title);
      this.updateMetaTag('og:description', seo.seo_social_description || seo.seo_description);
      
      // Добавляем обложку страницы если она есть
      if (seo.cover_image_url) {
        this.updateMetaTag('og:image', seo.cover_image_url);
        this.updateMetaTag('twitter:image', seo.cover_image_url);
        this.updateMetaTag('twitter:card', 'summary_large_image');
      } else {
        // Удаляем мета-теги изображения если обложки нет
        this.updateMetaTag('og:image', null);
        this.updateMetaTag('twitter:image', null);
      }
    },
    updateMetaTag(name, content) {
      // Определяем селектор по типу тега
      let selector = `meta[name="${name}"]`;
      let attr = 'name';
      if (name.startsWith('og:') || name.startsWith('twitter:')) {
        selector = `meta[property="${name}"]`;
        attr = 'property';
      }

      const existing = document.querySelector(selector);

      // Если контент пустой — удаляем существующий тег, чтобы не оставались старые значения
      if (content === null || content === undefined || String(content).trim() === '') {
        if (existing) existing.remove();
        return;
      }

      // Создаём или обновляем тег
      const metaTag = existing ?? document.createElement('meta');
      metaTag.setAttribute(attr, name);
      metaTag.setAttribute('content', content);
      if (!existing) document.head.appendChild(metaTag);
    },
    initGradientPanelAnimation() {
      const gradientPanel = this.$el.querySelector('.contacts-gradient-panel');
      if (!gradientPanel) return;
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            setTimeout(() => {
              entry.target.classList.add('visible');
            }, 50);
            observer.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.1,
        rootMargin: '50px'
      });
      
      observer.observe(gradientPanel);
    },
    initContactsBlocksAnimation() {
      const contactBlocks = this.$el.querySelectorAll('.contacts-block-fade-in');
      if (!contactBlocks.length) return;
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            setTimeout(() => {
              entry.target.classList.add('visible');
            }, 50);
            observer.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.1,
        rootMargin: '50px'
      });
      
      // Последовательно анимируем блоки с небольшой задержкой
      contactBlocks.forEach((block, index) => {
        observer.observe(block);
      });
    }
  },
  mounted() {
    // Прокрутка вверх при переходе на страницу
    window.scrollTo({ top: 0, behavior: 'smooth' });
    
    // Загрузка SEO тегов
    this.loadSeoTags();
    
    // Инициализация анимаций
    this.$nextTick(() => {
      this.initGradientPanelAnimation();
      this.initContactsBlocksAnimation();
    });
  }
}
</script>

<style scoped>
/* Contact Page Styles */
.contacts-layout-wrapper {
  display: flex;
  align-items: flex-start;
  gap: 0;
  width: 100%;
  max-width: 100%;
  margin: 0;
  padding: 0;
  padding-right: 0 !important;
  margin-right: 0 !important;
  box-sizing: border-box;
  overflow: hidden;
}

/* Убираем padding у контейнера для секции контактов */
.section:has(.contacts-layout-wrapper) ~ *,
.section:has(.contacts-layout-wrapper) {
  padding-right: 0;
}

.container:has(.contacts-layout-wrapper) {
  padding-right: 0 !important;
}

.contacts-page-title {
  font-size: var(--text-heading-size-1);
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-weight: 400;
  letter-spacing: 0;
  line-height: 1.2;
  margin: 0;
}

.section .row.section-title {
  margin-bottom: clamp(40px, 5cqw, 80px) !important;
}

.section .row.contacts-layout {
  margin-top: 0 !important;
  margin-bottom: 0 !important;
}

/* Убираем все отступы Bootstrap для контактов */
.row.contacts-layout {
  margin-top: 0 !important;
}

.row.contacts-layout > [class*="col-"] {
  margin-top: 0 !important;
  padding-top: 0 !important;
}

.contacts-layout__right .row.contacts-grid {
  margin-top: 0 !important;
}

.contacts-layout__right .row.contacts-grid > [class*="col-"] {
  margin-top: 0 !important;
  padding-top: 0 !important;
}

/* Переопределяем Bootstrap gutter для всех элементов контактов */
.contacts-layout,
.contacts-layout *,
.contacts-grid,
.contacts-grid * {
  --bs-gutter-y: 0 !important;
}

/* Убираем margin-top у всех дочерних элементов row */
.row.contacts-grid > *,
.row.contacts-grid > [class*="col-"],
.contacts-layout__right .row > *,
.contacts-layout__right .row > [class*="col-"] {
  margin-top: 0 !important;
}

/* Убираем все возможные отступы сверху */
.contacts-layout__right,
.contacts-layout__right .row,
.contacts-layout__right .row.contacts-grid,
.contacts-layout__right .row.contacts-grid > div {
  margin-top: 0 !important;
  padding-top: 0 !important;
}

.contacts-layout-wrapper {
  display: flex;
  align-items: flex-start;
  gap: 0;
  width: 100%;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.contacts-layout {
  display: none;
}

.contacts-layout > * {
  padding-right: 0 !important;
  margin-right: 0 !important;
}

/* Переопределяем Bootstrap row margin */
.row.contacts-layout {
  margin-right: 0 !important;
}

.contacts-layout > * {
  margin-top: 0 !important;
}

.contacts-layout__left {
  padding: 0 !important;
  margin: 0 !important;
  display: flex;
  align-items: flex-start;
  flex: 0 0 clamp(240px, 24.3049732621cqw, 447px);
  max-width: clamp(240px, 24.3049732621cqw, 447px);
}

.contacts-layout__right {
  padding: 0 !important;
  padding-left: clamp(20px, 3.3689839572cqw, 62px) !important;
  margin: 0 !important;
  flex: 1 1 auto;
  width: auto;
}

.contacts-layout__right .row {
  margin-right: 0 !important;
  padding-right: 0 !important;
}

.contacts-layout__right .row > * {
  padding-right: 0 !important;
}

.contacts-layout__right > * {
  margin-top: 0 !important;
  padding-top: 0 !important;
}

.contacts-layout .row {
  margin: 0 !important;
  margin-top: 0 !important;
  --bs-gutter-y: 0 !important;
}

.contacts-layout [class*="col-"] {
  padding-top: 0 !important;
  margin-top: 0 !important;
}

@media (width < 768px) {
  .contacts-layout__right {
    padding-left: 0;
    margin-top: 30px;
  }
}

.contacts-gradient-panel {
  background-image: url(/rez/images/Main.png);
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  width: clamp(240px, 24.3049732621cqw, 447px);
  min-height: clamp(360px, 35.2406417112cqw, 648px);
  padding: clamp(30px, 2.7203208556cqw, 50px) clamp(20px, 2.1203208556cqw, 39px) clamp(40px, 4.3515775401cqw, 80px);
  color: white;
  display: flex;
  flex-direction: column;
  border-radius: clamp(6px, 0.5434782609cqw, 10px);
  box-sizing: border-box;
}

.contacts-gradient-panel__title {
  font-size: var(--text-size-2);
  font-weight: 500;
  margin-bottom: clamp(15px, 1.3968983957cqw, 25px);
  color: white;
  line-height: 1.2;
}

.contacts-gradient-panel__text {
  font-size: var(--text-size-6);
  line-height: 1.5;
  margin-bottom: 0;
  color: white;
}

.contacts-gradient-panel__text:nth-child(3) {
  margin-top: clamp(15px, 1.3968983957cqw, 25px);
}

.contacts-gradient-panel__text:last-child {
  margin-bottom: 0;
}

.contacts-grid {
  padding: 0 !important;
  margin: 0 !important;
  display: flex;
  flex-direction: column;
  gap: clamp(20px, 2.7203208556cqw, 50px);
  width: 100%;
}

.contacts-grid-row {
  display: flex;
  gap: clamp(15px, 2.1739130435cqw, 40px);
  width: 100%;
}

.contacts-grid-row + .contacts-grid-row {
  margin-top: clamp(40px, 3.6951871658cqw, 68px);
}

.contacts-grid-row > .contacts-block {
  flex: 1 1 0;
}

.contacts-block {
  display: flex;
  flex-direction: column;
  gap: clamp(8px, 1.0869565217cqw, 20px);
  align-items: flex-start;
  padding-left: clamp(10px, 1.0869565217cqw, 20px);
  padding-right: clamp(5px, 0.8152173913cqw, 15px);
}

.contacts-block__icon {
  width: auto;
  height: auto;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: clamp(6px, 0.6521739130cqw, 12px);
  border: 1px solid #D6D6D6;
  border-radius: clamp(6px, 0.5434782609cqw, 10px);
  padding: clamp(8px, 0.6793478261cqw, 12.5px);
}

.contacts-block__icon img,
.contacts-block__icon svg {
  width: clamp(16px, 1.3043478261cqw, 24px);
  height: clamp(16px, 1.3043478261cqw, 24px);
}

.contacts-block__title {
  font-size: var(--text-heading-size-3);
  line-height: 1.3;
  color: #969696;
  font-weight: 400;
  margin: 0;
}

.contacts-block__content {
  display: flex;
  flex-direction: column;
  gap: clamp(4px, 0.5434782609cqw, 10px);
}

.contacts-block__content p {
  margin: 0;
  font-size: var(--text-size-6);
  color: var(--main-text-color);
  line-height: 1.5;
}

.contacts-block__content a {
  color: var(--main-text-color);
  font-size: var(--text-size-6);
  text-decoration: none;
  transition: color 0.3s ease;
}

.contacts-block__content a:hover {
  color: var(--accent-1);
  text-decoration: underline;
}

.contacts-block__link {
  text-decoration: underline !important;
}

.contacts-block__link:hover {
  color: var(--accent-1) !important;
}

@media (max-width: 768px) {
  .contacts-gradient-panel {
    width: 100%;
    height: auto;
    padding: clamp(30px, 6cqw, 50px) clamp(20px, 5cqw, 40px);
    padding-bottom: clamp(40px, 8cqw, 80px);
  }

  .contacts-gradient-panel__title {
    font-size: clamp(20px, 4cqw, 30px);
    margin-bottom: clamp(15px, 3cqw, 25px);
  }

  .contacts-gradient-panel__text {
    font-size: clamp(14px, 3cqw, 20px);
  }

  .contacts-grid {
    padding: clamp(20px, 4cqw, 30px) 0;
  }

  .contacts-block {
    margin-bottom: clamp(25px, 5cqw, 35px);
  }
}

/* Мобильная версия 576px и меньше */
@media (max-width: 576px) {
  /* Скрываем градиентный блок */
  .contacts-layout__left {
    display: none !important;
  }

  /* Убираем отступ слева у правой колонки */
  .contacts-layout__right {
    padding-left: 0 !important;
    width: 100%;
  }

  .contacts-layout-wrapper {
    flex-direction: column;
  }

  /* Перестраиваем сетку контактов */
  .contacts-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0;
  }

  .contacts-grid-row {
    display: contents;
  }

  .contacts-grid-row + .contacts-grid-row {
    margin-top: 0;
  }

  /* Порядок блоков на мобильных по классам */
  .contacts-block-phone { order: 1; }    /* Отдел продаж */
  .contacts-block-office { order: 2; }   /* Наш офис */
  .contacts-block-director { order: 3; } /* Коммерческий директор */
  .contacts-block-russia { order: 4; }   /* Мы работаем по всей России */
  .contacts-block-join { order: 5; }     /* Присоединяйтесь к нам */
  .contacts-block_social { order: 6; }   /* Социальные сети */

  /* Все блоки на полную ширину */
  .contacts-block {
    grid-column: 1 / -1;
    padding: 25px 0;
    border-bottom: none;
    margin-bottom: 0;
    padding-left: 12px;
    padding-right: 12px;
  }
  
  /* Отступ для всей сетки контактов как у заголовка */
  .contacts-grid {
    margin-left: 0;
    margin-right: 0;
  }

  /* Первые два блока (Отдел продаж и Наш офис) - каждый в своей колонке */
  .contacts-block-phone,
  .contacts-block-office {
    grid-column: span 1;
  }

  .contacts-block_social {
    border-bottom: none;
  }

  .contacts-block__title {
    font-size: 14px;
    line-height: 1.3;
  }
  
  /* Уменьшаем расстояние между иконкой и текстом */
  .contacts-block .d-flex.gap-3 {
    gap: 8px !important;
  }

  .contacts-block__content {
    gap: 15px;
  }
  
  .contacts-block__content p {
    font-size: 12px;
    line-height: 130%;
  }
  
  .contacts-block__content a {
    font-size: 12px;
    line-height: 130%;
  }
  
  /* Убираем принудительный перенос строки в адресе */
  .contacts-block-office .contacts-block__content br {
    display: none;
  }
  
  /* Ограничиваем ширину текста для переноса на две строки */
  .contacts-block-russia .contacts-block__content p {
    max-width: 200px;
  }

  .contacts-block__icon {
    padding: 6px;
    border-radius: 6px;
  }

  .contacts-block__icon img,
  .contacts-block__icon svg {
    width: 12px;
    height: 12px;
  }
  
  /* Заголовок страницы как на главной */
  .contacts-page-title {
    font-weight: 500;
    line-height: 1.1;
  }
  
  /* Убираем отступ слева у секции контактов */
  .contacts-layout-wrapper {
    margin-left: -12px;
    margin-right: -12px;
    width: calc(100% + 24px);
  }
}

.contacts-block_social .contacts-block__content a {
  text-decoration: underline;
  text-underline-offset: 5px;
}

/* Резиновый отступ до футера */
.contacts-section.section {
  margin-bottom: clamp(40px, 10.8695652174cqw, 200px) !important;
  padding-bottom: 0 !important;
}

.contacts-block-phone .contacts-block__icon img {
  width: clamp(14px, 1.1489130435cqw, 21.14px) !important;
  height: clamp(14px, 1.1489130435cqw, 21.14px) !important;
}

/* Анимация появления градиентной панели */
.contacts-gradient-panel.image-fade-in {
  opacity: 0;
  transform: translateX(-30px);
  transition: opacity 0.8s ease-out, transform 0.8s ease-out;
  will-change: opacity, transform;
}

.contacts-gradient-panel.image-fade-in.visible {
  opacity: 1;
  transform: translateX(0);
}

/* Анимация появления блоков контактов */
.contacts-block-fade-in {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
  will-change: opacity, transform;
}

.contacts-block-fade-in.visible {
  opacity: 1;
  transform: translateY(0);
}

/* Последовательная анимация блоков контактов */
.contacts-block-director.contacts-block-fade-in {
  transition-delay: 0.1s;
}

.contacts-block-phone.contacts-block-fade-in {
  transition-delay: 0.2s;
}

.contacts-block-russia.contacts-block-fade-in {
  transition-delay: 0.3s;
}

.contacts-block_social.contacts-block-fade-in {
  transition-delay: 0.1s;
}

.contacts-block-office.contacts-block-fade-in {
  transition-delay: 0.2s;
}

.contacts-block-join.contacts-block-fade-in {
  transition-delay: 0.3s;
}
</style>
