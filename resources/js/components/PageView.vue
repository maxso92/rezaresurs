<template>
  <div class="page-view">
    <div v-if="loading">Загрузка...</div>
    <div v-else-if="page">
      <h1>{{ page.title || page.name }}</h1>
      <div class="content" v-html="page.content"></div>
      
      <div class="seo-info" v-if="page.seo_description">
        <small>{{ page.seo_description }}</small>
      </div>
    </div>
    <div v-else>
      <h1>Страница не найдена</h1>
      <p>Запрашиваемая страница не существует.</p>
      <router-link to="/">Вернуться на главную</router-link>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'PageView',
  data() {
    return {
      page: null,
      loading: true
    }
  },
  mounted() {
    this.loadPage();
  },
  watch: {
    '$route.params.alias': function() {
      this.loadPage();
    }
  },
  methods: {
    async loadPage() {
      this.loading = true;
      try {
        const alias = this.$route.params.alias;
        const response = await axios.get(`/api/pages/${alias}`);
        this.page = response.data;
        
        // Устанавливаем SEO meta-теги
        if (this.page.title) {
          document.title = this.page.title;
        }
      } catch (error) {
        console.error('Ошибка загрузки страницы:', error);
        this.page = null;
      } finally {
        this.loading = false;
      }
    }
  }
}
</script>

<style scoped>
.page-view {
  max-width: 800px;
  margin: 0 auto;
}

h1 {
  color: #333;
  margin-bottom: 1rem;
}

.content {
  line-height: 1.6;
  margin: 1rem 0;
}

.seo-info {
  margin-top: 2rem;
  padding-top: 1rem;
  border-top: 1px solid #ddd;
  color: #666;
}
</style>

