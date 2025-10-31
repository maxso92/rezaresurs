<template>
  <div class="about-page">
    <div class="container">
      <section class="section">
        <div class="row section-title">
          <div class="col-md-7 section-title__main">
            <div class="section-title__mark">О компании</div>
            <h1 class="section-title__header">
              О компании РЕЗАРЕСУРС
            </h1>
          </div>
          <div class="col section-title__second">
            <div class="text-size-2 mb-3">
              Добро пожаловать на страницу о нашей компании
            </div>
          </div>
        </div>
        
        <div class="row mt-5">
          <div class="col-md-8">
            <div class="second-color">
              <h2 class="mb-4">Наша история</h2>
              <p>
                ООО «РЕЗАРЕСУРС» — это компания, специализирующаяся на предоставлении услуг 
                аутстаффинга квалифицированного вахтового персонала по всей России. 
                Мы работаем официально и аккредитованы Государственной инспекцией труда.
              </p>
              
              <h3 class="mt-4 mb-3">Наши достижения</h3>
              <p>
                За годы работы мы успешно реализовали более 30 проектов и обеспечили 
                заказчиков необходимым персоналом. Более 15 крупнейших компаний России 
                доверяют нам и рекомендуют «РЕЗАРЕСУРС» как надёжного кадрового партнёра.
              </p>
              
              <h3 class="mt-4 mb-3">Наша миссия</h3>
              <p>
                Наша цель — предоставить вам квалифицированных специалистов, взяв на себя 
                все кадровые и юридические вопросы. Мы гарантируем качество подбора, 
                официальное оформление и полную юридическую ответственность.
              </p>
              
              <h3 class="mt-4 mb-3">Почему выбирают нас</h3>
              <ul class="mt-3">
                <li>Официальная аккредитация ГИТ до 2027 года</li>
                <li>Быстрый подбор персонала за 3-7 дней</li>
                <li>Работа по всей России, включая удалённые регионы</li>
                <li>Полное юридическое сопровождение</li>
                <li>Собственная команда рекрутеров и методистов</li>
              </ul>
              
              <div class="mt-5">
                <p class="text-size-2">
                  Свяжитесь с нами для получения более подробной информации о наших услугах 
                  и условиях сотрудничества.
                </p>
                <div class="button-row mt-4">
                  <router-link to="/contact" class="native-button">
                    Связаться с нами
                  </router-link>
                  <router-link to="/" class="native-button native-button_outline">
                    Вернуться на главную
                  </router-link>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="decoration-grid__item mt-4">
              <div class="decoration-grid__item-decoration">
                <img loading="lazy" :src="imageUrl('award.svg')" alt="" />
              </div>
              <div class="decoration-grid__item-content mt-3">
                <h4 class="decoration-grid__content-title">
                  Аккредитация ГИТ
                </h4>
                <p class="decoration-grid__content-text">
                  Официальная аккредитация Государственной инспекции труда до 2027 года
                </p>
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
  name: 'About',
  methods: {
    imageUrl(path) {
      // Helper для путей к изображениям из public
      return path.startsWith('/') ? path : `/rez/images/${path}`;
    },
    async loadSeoTags() {
      try {
        const response = await axios.get('/api/pages/about/seo');
        const seo = response.data;
        
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
        // Twitter Card теги удалены по требованию
      } catch (error) {
        console.error('Ошибка загрузки SEO тегов:', error);
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
    }
  },
  mounted() {
    // Прокрутка вверх при переходе на страницу (для демонстрации быстрой загрузки)
    window.scrollTo({ top: 0, behavior: 'smooth' });
    this.loadSeoTags();
  }
}
</script>

<style scoped>
.about-page {
  min-height: 100vh;
  padding-bottom: 2rem;
}

ul {
  list-style: none;
  padding-left: 0;
}

ul li {
  padding: 0.5rem 0;
  padding-left: 1.5rem;
  position: relative;
}

ul li:before {
  content: "✓";
  position: absolute;
  left: 0;
  color: var(--accent-1);
  font-weight: bold;
}

h2 {
  font-size: var(--text-heading-size-2);
  color: var(--main-text-color);
}

h3 {
  font-size: var(--text-heading-size-3);
  color: var(--main-text-color);
}
</style>

