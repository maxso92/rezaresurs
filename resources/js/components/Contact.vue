<template>
  <div class="contact">
    <h1>Связаться с нами</h1>
    
    <div v-if="successMessage" class="success-message">
      {{ successMessage }}
    </div>
    
    <form @submit.prevent="submitForm" v-else>
      <div class="form-group">
        <label for="name">Имя:</label>
        <input 
          type="text" 
          id="name" 
          v-model="form.name" 
          required
        >
        <span v-if="errors.name" class="error">{{ errors.name[0] }}</span>
      </div>
      
      <div class="form-group">
        <label for="email">Email:</label>
        <input 
          type="email" 
          id="email" 
          v-model="form.email" 
          required
        >
        <span v-if="errors.email" class="error">{{ errors.email[0] }}</span>
      </div>
      
      <div class="form-group">
        <label for="phone">Телефон:</label>
        <input 
          type="tel" 
          id="phone" 
          v-model="form.phone"
        >
        <span v-if="errors.phone" class="error">{{ errors.phone[0] }}</span>
      </div>
      
      <div class="form-group">
        <label for="message">Сообщение:</label>
        <textarea 
          id="message" 
          v-model="form.message" 
          rows="5" 
          required
        ></textarea>
        <span v-if="errors.message" class="error">{{ errors.message[0] }}</span>
      </div>
      
      <button type="submit" :disabled="submitting">
        {{ submitting ? 'Отправка...' : 'Отправить' }}
      </button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Contact',
  data() {
    return {
      form: {
        name: '',
        email: '',
        phone: '',
        message: ''
      },
      errors: {},
      submitting: false,
      successMessage: ''
    }
  },
  methods: {
    async submitForm() {
      this.submitting = true;
      this.errors = {};
      
      try {
        const response = await axios.post('/api/contact', this.form);
        this.successMessage = response.data.message;
        
        // Очистка формы
        this.form = {
          name: '',
          email: '',
          phone: '',
          message: ''
        };
      } catch (error) {
        if (error.response && error.response.data.errors) {
          this.errors = error.response.data.errors;
        } else {
          alert('Произошла ошибка при отправке формы. Попробуйте позже.');
        }
      } finally {
        this.submitting = false;
      }
    }
  }
}
</script>

<style scoped>
.contact {
  max-width: 600px;
  margin: 0 auto;
}

h1 {
  color: #333;
  margin-bottom: 1.5rem;
}

.form-group {
  margin-bottom: 1rem;
}

label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: bold;
}

input,
textarea {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 1rem;
}

input:focus,
textarea:focus {
  outline: none;
  border-color: #0066cc;
}

button {
  background: #0066cc;
  color: white;
  padding: 0.75rem 1.5rem;
  border: none;
  border-radius: 4px;
  font-size: 1rem;
  cursor: pointer;
}

button:hover:not(:disabled) {
  background: #0052a3;
}

button:disabled {
  background: #ccc;
  cursor: not-allowed;
}

.error {
  color: red;
  font-size: 0.875rem;
  display: block;
  margin-top: 0.25rem;
}

.success-message {
  padding: 1rem;
  background: #d4edda;
  border: 1px solid #c3e6cb;
  border-radius: 4px;
  color: #155724;
}
</style>

