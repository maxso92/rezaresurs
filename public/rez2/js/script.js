// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    initFaqAccordion();
    initImagesAnimation();
    initStatsAnimation();
    initStepsAnimation();
    initServicesAnimation();
    initFormVisibility();
    initPhoneFormatting();
    initNameCapitalization();
});

// FAQ Аккордеон
function initFaqAccordion() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const button = item.querySelector('.native-accardeon__summary');
        const content = item.querySelector('.faq-content');
        
        button.addEventListener('click', function() {
            const isOpen = item.classList.contains('open');
            
            // Закрываем все остальные
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('open');
                    const otherButton = otherItem.querySelector('.native-accardeon__summary');
                    otherButton.setAttribute('aria-expanded', 'false');
                }
            });
            
            // Переключаем текущий
            if (isOpen) {
                item.classList.remove('open');
                button.setAttribute('aria-expanded', 'false');
            } else {
                item.classList.add('open');
                button.setAttribute('aria-expanded', 'true');
            }
        });
    });
}

// Анимация появления изображений
function initImagesAnimation() {
    const images = document.querySelectorAll('.image-fade-in');
    if (!images.length) return;
    
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
    
    images.forEach(image => observer.observe(image));
}

// Анимация счетчиков статистики
function initStatsAnimation() {
    const statsWrapper = document.querySelector('.counter-wrapper');
    if (!statsWrapper) return;
    
    let statsAnimated = false;
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !statsAnimated) {
                statsAnimated = true;
                const counters = entry.target.querySelectorAll('[data-target]');
                
                counters.forEach((counter, index) => {
                    setTimeout(() => {
                        animateCounter(counter);
                    }, index * 100);
                });
                
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.3
    });
    
    observer.observe(statsWrapper);
}

function animateCounter(element) {
    const target = parseInt(element.getAttribute('data-target'));
    const duration = 2000;
    const steps = 60;
    const stepDuration = duration / steps;
    const increment = target / steps;
    let currentValue = 0;
    
    const timer = setInterval(() => {
        currentValue += increment;
        if (currentValue >= target) {
            element.textContent = formatNumber(target);
            clearInterval(timer);
        } else {
            element.textContent = formatNumber(Math.floor(currentValue));
        }
    }, stepDuration);
}

function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
}

// Анимация шагов
function initStepsAnimation() {
    const stepsWrapper = document.querySelector('.steps-wrapper');
    if (!stepsWrapper) return;
    
    let stepsAnimated = false;
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !stepsAnimated) {
                stepsAnimated = true;
                const steps = entry.target.querySelectorAll('.step-item');
                
                steps.forEach((step, index) => {
                    setTimeout(() => {
                        step.classList.add('step-visible');
                    }, index * 200);
                });
                
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.2
    });
    
    observer.observe(stepsWrapper);
}

// Анимация услуг
function initServicesAnimation() {
    const servicesTable = document.querySelector('.services-table');
    if (!servicesTable) return;
    
    let servicesAnimated = false;
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !servicesAnimated) {
                servicesAnimated = true;
                const services = entry.target.querySelectorAll('.service-item');
                
                services.forEach((service, index) => {
                    setTimeout(() => {
                        service.classList.add('service-visible');
                    }, index * 300);
                });
                
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });
    
    observer.observe(servicesTable);
}

// Плавное появление формы заявки
function initFormVisibility() {
    const formSection = document.querySelector('.application-form-section');
    if (!formSection) return;
    
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
    
    observer.observe(formSection);
}

// Форматирование телефона
function initPhoneFormatting() {
    const phoneInput = document.getElementById('app-phone');
    if (!phoneInput) return;
    
    phoneInput.addEventListener('focus', function() {
        if (!this.value || this.value === '') {
            this.value = '+7 ';
        }
    });
    
    phoneInput.addEventListener('input', function() {
        formatPhone(this);
    });
}

function formatPhone(input) {
    let value = input.value.replace(/\D/g, '');
    
    if (!value.startsWith('7')) {
        value = '7' + value.replace(/^7*/, '');
    }
    
    value = value.substring(0, 11);
    
    let formatted = '+7';
    if (value.length > 1) {
        formatted += ' (' + value.substring(1, 4);
    }
    if (value.length >= 5) {
        formatted += ') ' + value.substring(4, 7);
    }
    if (value.length >= 8) {
        formatted += '-' + value.substring(7, 9);
    }
    if (value.length >= 10) {
        formatted += '-' + value.substring(9, 11);
    }
    
    input.value = formatted;
}

// Капитализация первой буквы
function initNameCapitalization() {
    const nameInput = document.getElementById('app-name');
    const positionInput = document.getElementById('app-position');
    
    if (nameInput) {
        nameInput.addEventListener('input', function() {
            capitalizeFirstLetter(this);
        });
    }
    
    if (positionInput) {
        positionInput.addEventListener('input', function() {
            capitalizeFirstLetter(this);
        });
    }
}

function capitalizeFirstLetter(input) {
    const value = input.value;
    if (value && value.length > 0) {
        input.value = value.charAt(0).toUpperCase() + value.slice(1);
    }
}

// Отправка формы заявки
function submitApplication(event) {
    event.preventDefault();
    
    const nameInput = document.getElementById('app-name');
    const phoneInput = document.getElementById('app-phone');
    const positionInput = document.getElementById('app-position');
    const agreeInput = document.getElementById('app-agree');
    const form = document.getElementById('application-form-element');
    const successMessage = document.getElementById('application-success');
    
    if (!agreeInput.checked) {
        alert('Необходимо согласие на обработку персональных данных');
        return false;
    }
    
    // Здесь можно добавить отправку на сервер
    console.log('Отправка заявки:', {
        name: nameInput.value,
        phone: phoneInput.value,
        position: positionInput.value,
        agree: agreeInput.checked
    });
    
    // Показываем сообщение об успехе
    form.style.display = 'none';
    successMessage.style.display = 'block';
    
    // Сброс формы
    nameInput.value = '';
    phoneInput.value = '';
    positionInput.value = '';
    agreeInput.checked = true;
    
    return false;
}

