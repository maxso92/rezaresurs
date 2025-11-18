<template>
  <div class="home-page">
    <div class="container">
      <section class="section">
        <div class="row section-title">
          <div class="col-md-7 section-title__main">
            <div class="section-title__mark">
              Официальный договор, аккредитация РОСТРУД
            </div>
            <h1 class="section-title__header">
              <span>Ваши проекты — наши люди,</span><br />
              <span>Ваш успех — наша миссия</span>
            </h1>
          </div>
          <div class="col section-title__second">
            <div class="text-size-2 mb-3">
              Аутстаффинг квалифицированного вахтового персонала по всей России
            </div>
            <div class="button-row">
              <a href="https://t.me/reazaresurs?text=Добрый%20день,%20пишу%20вам%20с%20сайта%20☀%EF%B8%8F" target="_blank" class="native-button">
                Подобрать персонал бесплатно
              </a>
              <a href="" class="native-button native-button_outline">
                Узнать стоимость
              </a>
            </div>
          </div>
        </div>
        <div
          class="row wide-pic-with-subscription image-fade-in"
          :style="headerImageStyle"
        >
          <div class="wide-pic-with-subscription__prompt">
            <div>
                Подберём для вас водителей, машинистов, сварщиков, электриков и
              широкий
              <div class="d-none d-md-block"></div>
                спектр других специалистов для вахтовых объектов
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="row section-title">
          <div class="col-md-7 section-title__main">
            <div class="section-title__mark">Кто мы и что делаем</div>
            <h2 class="section-title__header section-title__header_second">
              Почему нам доверяют крупнейшие компании
            </h2>
          </div>
          <div class="col section-title__second">
            <div class="second-color">
              Подбираем и оформляем специалистов для вахтовых проектов по всей
              России, берём на себя все кадровые и юридические вопросы
            </div>
          </div>
        </div>
        <div class="row decoration-grid image-fade-in">
          <div class="col-md-3 decoration-grid__item">
            <div class="decoration-grid__item-content">
              <h4 class="decoration-grid__content-title">
                Быстрый подбор персонала
              </h4>
              <p class="decoration-grid__content-text">
                  Быстрый подбор персонала Закрываем заявки за 3-7 дней. В базе только проверенные специалисты, с опытом работы вахтовым методом.
              </p>
            </div>
            <div class="decoration-grid__item-decoration">
              <img loading="lazy" :src="imageUrl('icon-user-group.svg')" alt="" />
            </div>
          </div>
          <div class="col-md-3 decoration-grid__item">
            <div class="decoration-grid__item-content">
              <h4 class="decoration-grid__content-title">
                Юридическое сопровождение
              </h4>
              <p class="decoration-grid__content-text">
                  Берем на себя все кадровые, бухгалтерские и юридические вопросы. Всё оформляем официально и прозрачно.
              </p>
            </div>
            <div class="decoration-grid__item-decoration">
              <img loading="lazy" :src="imageUrl('assignments.svg')" alt="" />
            </div>
          </div>
          <div class="col-md-3 decoration-grid__item">
            <div class="decoration-grid__item-content">
              <h4 class="decoration-grid__content-title">
                Работа по всей России
              </h4>
              <p class="decoration-grid__content-text">
                Организуем вахту от Севера до Дальнего Востока, включая
                труднодоступные регионы
              </p>
            </div>
            <div class="decoration-grid__item-decoration">
              <img loading="lazy" :src="imageUrl('airplane-take-off.svg')" alt="" />
            </div>
          </div>
          <div class="col-md-3 decoration-grid__item">
            <div class="decoration-grid__item-content">
              <h4 class="decoration-grid__content-title">Аккредитация РОСТРУД</h4>
              <p class="decoration-grid__content-text">
                ООО «РЕЗАРЕСУРС» аккредитовано до 2027 года. Работаем официально
                и открыто
              </p>
            </div>
            <div class="decoration-grid__item-decoration">
              <img loading="lazy" :src="imageUrl('award.svg')" alt="" />
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="row section-title">
          <div class="col-md-7 section-title__main">
            <div class="section-title__mark">Преимущества</div>
            <h2 class="section-title__header section-title__header_second">
              Сокращаем издержки и упрощаем работу
            </h2>
          </div>
          <div class="col section-title__second">
            <div class="second-color">
              Снижаем расходы на персонал, берём на себя оформление и налоги,
              минимизируем риски и упрощаем работу компаний
            </div>
          </div>
        </div>
        <div class="row decoration-grid image-fade-in">
          <div class="col-md-3 decoration-grid__item">
            <div class="decoration-grid__item-decoration">
              <div class="decoration-grid__item-decoration-box">
                <img loading="lazy" :src="imageUrl('gradient-check.svg')" alt="" />
              </div>
            </div>
            <div class="decoration-grid__item-content">
              <h4 class="decoration-grid__content-title">
                Снижение затрат и налогов
              </h4>
              <p class="decoration-grid__content-text">
                Берём на себя HR-задачи и оформление. Все налоги и взносы оплачивает ООО «РЕЗАРЕСУРС» (НДФЛ, ПФР, ФСС - до 30% ФОТ)
              </p>
            </div>
          </div>
          <div class="col-md-3 decoration-grid__item">
            <div class="decoration-grid__item-decoration">
              <div class="decoration-grid__item-decoration-box">
                <img loading="lazy" :src="imageUrl('gradient-check.svg')" alt="" />
              </div>
            </div>
            <div class="decoration-grid__item-content">
              <h4 class="decoration-grid__content-title">Минимизация рисков</h4>
              <p class="decoration-grid__content-text">
                Мы аккредитованы в Роструд и соблюдаем ТК РФ. Юридическая и административная ответственность на нас
              </p>
            </div>
          </div>
          <div class="col-md-3 decoration-grid__item">
            <div class="decoration-grid__item-decoration">
              <div class="decoration-grid__item-decoration-box">
                <img loading="lazy" :src="imageUrl('gradient-check.svg')" alt="" />
              </div>
            </div>
            <div class="decoration-grid__item-content">
              <h4 class="decoration-grid__content-title">Упрощение документооборота</h4>
              <p class="decoration-grid__content-text">
                Оформляем договоры, ведём кадровый учёт, сдаём отчётность. Отпускные, больничные и компенсации также закрываем мы
              </p>
            </div>
          </div>
          <div class="col-md-3 decoration-grid__item">
            <div class="decoration-grid__item-decoration">
              <div class="decoration-grid__item-decoration-box">
                <img loading="lazy" :src="imageUrl('gradient-check.svg')" alt="" />
              </div>
            </div>
            <div class="decoration-grid__item-content">
              <h4 class="decoration-grid__content-title">Снижение текучки</h4>
              <p class="decoration-grid__content-text">
                Контролируем дисциплину, ведём резерв кадров и обеспечиваем замену персонала 24/7
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- КАЛЬКУЛЯТОР (ВРЕМЕННО СКРЫТ) -->
      <!-- 
      <section class="section">
        <div class="row section-title">
          <div class="col-md-7 section-title__main">
            <div class="section-title__mark">Калькулятор расчёта стоимости</div>
            <h2 class="section-title__header section-title__header_second">
              Рассчитайте стоимость персонала
              <span class="text-gradient">за 1 минуту</span>
            </h2>
          </div>
          <div class="col section-title__second">
            <div class="second-color">
              Введите параметры — мы рассчитаем смету и сроки, чтобы вы сразу
              видели итоговую стоимость услуг
            </div>
          </div>
        </div>
        <div class="row wrap-separator wrap-separator_big">
          <div class="col-md-7">
            <form class="row mb-5" @submit.prevent="calculatePrice">
              <div class="col-md-7">
                <div class="native-input">
                  <div class="native-input__label native-input__label_wide">
                    Должность / специальность
                  </div>
                  <div
                    class="native-input__input-wrap native-input__input-wrap_slim row"
                  >
                    <div class="col-md-7">
                      <template v-for="spec in specialties.slice(0, 5)" :key="spec">
                        <label class="native-input__label-input">
                          <input
                            class="native-input__input native-input__input-radio"
                            type="radio"
                            name="spec"
                            :value="spec"
                            v-model="formData.specialty"
                            @change="recalculateSlider"
                          />
                          {{ spec }}
                        </label>
                      </template>
                    </div>
                    <div class="col-md-5">
                      <template v-for="spec in specialties.slice(5)" :key="spec">
                        <label class="native-input__label-input">
                          <input
                            class="native-input__input native-input__input-radio"
                            type="radio"
                            name="spec"
                            :value="spec"
                            v-model="formData.specialty"
                            @change="recalculateSlider"
                          />
                          {{ spec }}
                        </label>
                      </template>
                    </div>
                  </div>
                  <div class="native-input__input-wrap">
                    <input
                      class="native-input__input native-input__input-text"
                      type="text"
                      placeholder="Написать свой вариант"
                      v-model="formData.customSpecialty"
                      @input="recalculateSlider"
                    />
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="native-input">
                  <div class="native-input__label">Регион работы</div>
                  <div class="native-input__input-wrap">
                    <input
                      class="native-input__input native-input__input-text"
                      type="text"
                      placeholder="Республика Саха"
                      v-model="formData.region"
                      @input="recalculateSlider"
                    />
                  </div>
                </div>
                <div class="native-input">
                  <div class="native-input__label">Срок вахты</div>
                  <div class="native-input__input-wrap">
                    <input
                      class="native-input__input native-input__input-text"
                      type="number"
                      placeholder="Кол-во дней"
                      v-model.number="formData.duration"
                      @input="recalculateSlider"
                    />
                  </div>
                </div>
                <div class="native-input">
                  <div class="native-input__label">Количество сотрудников</div>
                  <div class="native-input__input-wrap">
                    <input
                      class="native-input__input native-input__input-text"
                      type="number"
                      placeholder="25 человек"
                      v-model.number="formData.employees"
                      @input="recalculateSlider"
                    />
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="progress-slider" :style="{ '--slider-value': sliderValue }">
                  <div class="progress-slider__row">
                    <div class="progress-slider__slider">
                      <div class="progress-slider__slider-thumb"></div>
                    </div>
                  </div>
                  <div class="progress-slider__info">
                    <div class="progress-slider__stage">
                      Заполнено на
                      <span class="progress-slider__stage-value">{{ sliderValue }}</span>%
                    </div>
                    <div class="progress-slider__max">100%</div>
                  </div>
                </div>
                <div class="mt-5">
                  <button type="submit" class="native-button">Рассчитать стоимость</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-5 flex align-content-center">
            <div class="indent-wrap">
              <div class="calc-result-block">
                <div class="calc-result-block__inner">
                  <div class="calc-result-block__title">Ваша стоимость</div>
                  <div class="calc-result-block__value">{{ calculatedPrice.toLocaleString('ru-RU') }} ₽</div>
                  <a class="calc-result-block__link text-gradient mt-3">
                    получить коммерческое предложение
                  </a>

                  <div class="calc-result-block__prompt second-color">
                    Сумма рассчитана на выбранное количество сотрудников и срок
                    вахты. Включает оформление, налоги, проживание и транспорт.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      -->
      <!-- КОНЕЦ КАЛЬКУЛЯТОРА -->

      <section class="section">
        <div class="row section-title">
          <div class="col-md-7 section-title__main">
            <div class="section-title__mark">
              Собственный штат рекрутеров и методистов
            </div>
            <h1 class="section-title__header section-title__header_second">
              Быстрый отбор и обучение персонала
            </h1>
          </div>
          <div class="col section-title__second">
            <div class="second-color">
              Мы сами подбираем и обучаем сотрудников: от проверки кандидатов до
              подготовки специалистов к работе
            </div>
          </div>
        </div>
        <div
          class="row wide-pic-with-subscription wide-pic-with-subscription_wide wide-pic-with-subscription_double-contrast image-fade-in"
          :style="teamImageStyle"
        >
          <div
            class="wide-pic-with-subscription__prompt wide-pic-with-subscription__prompt_small"
          >
            <div>
              У нас работает собственная команда рекрутеров и методистов. Это
              позволяет нам оперативно закрывать заявки,
              <div class="d-none d-md-block"></div>
              проверять навыки кандидатов и организовывать обучение.
              <br class="d-block d-md-none" />
              <br class="d-block d-md-none" />
              Благодаря внутренним методикам и опытной команде мы
              <div class="d-none d-md-block"></div>
              гарантируем высокое качество подбора и подготовку специалистов к
              работе на ваших объектах.
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="row section-title">
          <div class="col-md-7 section-title__main">
            <div class="section-title__mark">Нам доверяют</div>
            <h1 class="section-title__header section-title__header_second">
              Нам доверяют крупнейшие компании России
            </h1>
          </div>
          <div class="col section-title__second">
            <div class="second-color">
              Более 15 компаний сотрудничают с нами и рекомендуют «РЕЗАРЕСУРС»
              как надёжного кадрового партнёра
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="image-slide-grid image-fade-in">
              <div class="image-slide-grid__item" v-for="company in companies" :key="company">
                <img
                  class="image-slide-grid__pic"
                  loading="lazy"
                  :src="imageUrl(`company/${company}.svg`)"
                  alt=""
                />
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="row section-title">
          <div class="col-md-8 section-title__main">
            <div class="section-title__mark">Услуги</div>
            <h1 class="section-title__header section-title__header_second">
                Подбираем водителей и машинистов с опытом северных маршрутов
            </h1>
          </div>
        </div>
        <div class="services-table">
          <div 
            class="row services-table__row service-item" 
            v-for="(service, index) in services" 
            :key="service.title"
            :class="{ 'service-visible': servicesVisible[index] }"
          >
            <div class="col-md-5 services-table__title">
              <div class="services-table__title-header" v-html="service.titleHtml || service.title">
              </div>
              <div class="services-table__title-label">{{ service.label }}</div>
            </div>
            <div class="col-md-7 row">
              <div class="col-md-6 services-table__info">
                <h4 class="services-table__info-header">Что делаем</h4>
                <p class="services-table__info-content">
                  {{ service.what }}
                </p>
              </div>
              <div class="col-md-6 services-table__info">
                <h4 class="services-table__info-header">Условия</h4>
                <p class="services-table__info-content">
                  {{ service.conditions }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="row section-title">
          <div class="col-md-8 section-title__main">
            <div class="section-title__mark">Этапы сотрудничества с нами</div>
            <h1 class="section-title__header section-title__header_second">
              От запроса до выхода сотрудников
            </h1>
          </div>
          <div class="col section-title__second">
            <div class="second-color">
              Мы берём на себя все шаги: от оформления договора и подбора людей
              до выезда и сопровождения на вахте
            </div>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-5 steps-wrapper">
          <div 
            class="col step-item" 
            v-for="(step, index) in steps" 
            :key="step.number"
            :class="{ 'step-visible': stepsVisible[index] }"
            :style="{ transitionDelay: `${index * 200}ms` }"
          >
            <div class="counter-item">
              <div class="counter-item__counter">{{ step.number }}</div>
              <p class="counter-item__title">{{ step.title }}</p>
              <p class="counter-item__text">
                {{ step.text }}
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="row section-title">
          <div class="col-md-9 section-title__main">
            <div class="section-title__mark">География работы</div>
            <h1 class="section-title__header section-title__header_second">
              Мы работаем по всей России, включая удалённые регионы <br />
              и закрываем вакансии под любые задачи бизнеса
            </h1>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="map-block image-fade-in">
              <img
                class="map-block__map d-none d-md-block"
                :src="imageUrl('map.svg')"
                alt=""
              />
              <img
                class="map-block__map d-md-none"
                :src="imageUrl('map-mob.svg')"
                alt=""
              />
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="row section-title">
          <div class="col-md-6 section-title__main">
            <div class="section-title__mark">
              Аутстаффинг и наш опыт в цифрах
            </div>
            <h1 class="section-title__header section-title__header_second">
              Что такое аутстаффинг и почему нам доверяют
            </h1>
          </div>
          <div class="col section-title__second">
            <p>
              Аутстаффинг — это модель найма, при которой сотрудник официально
              трудоустроен в нашей компании, а выполняет задачи и работает
              непосредственно на ваших объектах и участках. Такой формат
              сотрудничества позволяет вам сократить издержки на содержание
              штата, избежать рисков, связанных с оформлением, налогами и
              документами.
            </p>
            <div class="second-color">
              Мы берём на себя полную ответственность за сотрудников: их
              трудоустройство, выплаты, налоги, отпуска и больничные. Вы
              получаете специалистов для выполнения задач без лишних хлопот.
            </div>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 counter-wrapper image-fade-in">
          <div class="col counter-item" v-for="(stat, index) in statistics" :key="stat.title">
            <div class="counter-item__counter counter-item__counter_big">
              <span class="counter-item__counter-gradient" data-counter="+">{{ formatNumber(animatedStats[index]) }}</span>
            </div>
            <p class="counter-item__title">{{ stat.title }}</p>
            <p class="counter-item__text">
              {{ stat.text }}
            </p>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="row section-title">
          <div class="col-md-6 mt section-title__main">
            <div class="section-title__mark">частые вопросы</div>
            <h1 class="section-title__header section-title__header_second">
              Что нужно знать об аутстаффинге и <br />работе с РЕЗАРЕСУРС»:
              самые <br />
              популярные вопросы
            </h1>
            <p class="second-color mt-3 mt-md-4">
              Здесь вы найдёте ответы на ключевые вопросы о подборе персонала,
              стоимости и юридических основах
            </p>
            <div class="social-links social-links_indent mt-3 mt-md-5">
              <a href="https://api.whatsapp.com/send/?phone=79994447980&text=Добрый+день%2C+пишу+вам+с+сайта.&type=phone_number&app_absent=0" target="_blank" class="social-links__link">
                <img :src="imageUrl('social/whatsapp.svg')" alt="" />
              </a>
              <a href="https://t.me/reazaresurs?text=Добрый%20день,%20пишу%20вам%20с%20сайта%20☀%EF%B8%8F" target="_blank" class="social-links__link">
                <img :src="imageUrl('social/telegram.svg')" alt="" />
              </a>
            </div>
          </div>
          <div class="col section-title__second">
            <div class="native-accardeon">
              <div 
                class="native-accardeon__slide" 
                v-for="faq in faqs" 
                :key="faq.question"
              >
                <button
                  class="native-accardeon__summary"
                  @click="toggleFaq(faq)"
                  :aria-expanded="faq.isOpen"
                  type="button"
                >
                  <div class="native-accardeon__summary-icon">
                    <img :src="imageUrl(`faq/${faq.icon}.svg`)" alt="" />
                  </div>
                  <div class="native-accardeon__summary-title">
                    {{ faq.question }}
                  </div>
                  <div 
                    class="native-accardeon__summary-toggle"
                    :class="{ 'native-accardeon__summary-toggle_open': faq.isOpen }"
                  ></div>
                </button>
                <transition 
                  name="accordion"
                  @enter="onEnter"
                  @leave="onLeave"
                >
                  <div 
                    v-show="faq.isOpen"
                    class="native-accardeon__content-wrapper"
                  >
                    <div class="native-accardeon__content" v-html="faq.answer"></div>
                  </div>
                </transition>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section section-smooth">
        <div class="row section-title">
          <div class="col-md-6 section-title__main">
            <div class="section-title__mark">Аккредитация</div>
            <h1 class="section-title__header section-title__header_second">
              Аккредитация Государственной <br />
              инспекции труда
            </h1>
          </div>
          <div class="col section-title__second">
            <div class="wrap-separator">
              <p>
                <span class="text-gradient"><b>ООО «РЕЗАРЕСУРС»</b></span>
                официально аккредитовано Государственной инспекцией труда в
                Иркутской области.
              </p>
              <p>
                Для наших партнёров это означает надёжность, прозрачность
                сотрудничества и полную защиту от юридических рисков.
              </p>
              <p>
                Приказ № А-7/38 от 24.12.2024 <br />
                Срок действия аккредитации — до 24 декабря 2027 года.
              </p>
            </div>
          </div>
        </div>
      </section>
    </div>

    <section
      class="section section_red section_red-decoration section_overlay inverse-colors application-form-section"
      :style="applicationFormStyle"
    >
      <div class="container">
        <div class="row section-title section-title_less">
          <div class="col-md-6 mt section-title__main">
            <div class="section-title__mark">Форма заявки</div>
            <h1 class="section-title__header section-title__header_second">
              Получить предложение, чтобы закрыть кадровую потребность
            </h1>
            <p class="second-color mt-3 mt-md-4">
              Оставьте заявку, и мы свяжемся с вами для подбора специалистов
              <span class="d-none d-md-block"></span>
              и подготовки коммерческого предложения.
            </p>
          </div>
          <div class="col section-title__second">
            <div v-if="applicationSubmitted" class="row mb-5">
              <div class="col-12">
                <p class="second-color mt-3 mt-md-4">
                  Заявка успешно отправлена.
                  <br />в ближайшее время с вами свяжется специалист
                </p>
              </div>
            </div>
            <form v-else class="row mb-5" @submit.prevent="submitApplication">
              <div class="col-12">
                <div class="native-input native-input_simple">
                  <div
                    class="native-input__input-wrap native-input__input-wrap_wide"
                  >
                    <input
                      class="native-input__input native-input__input-text"
                      type="text"
                      placeholder="Как вас зовут?"
                      v-model="applicationForm.name"
                      @input="capitalizeFirstLetter('name')"
                      maxlength="30"
                      required
                    />
                  </div>
                </div>
                <div class="native-input native-input_simple">
                  <div
                    class="native-input__input-wrap native-input__input-wrap_wide"
                  >
                    <input
                      class="native-input__input native-input__input-text"
                      type="tel"
                      placeholder="Ваш номер телефона"
                      v-model="applicationForm.phone"
                      @focus="onPhoneFocus"
                      @input="formatPhone"
                      required
                    />
                  </div>
                </div>
                <div class="native-input native-input_simple">
                  <div class="native-input__input-wrap">
                    <input
                      class="native-input__input native-input__input-text"
                      type="text"
                      placeholder="Должность / специальность "
                      v-model="applicationForm.position"
                      @input="capitalizeFirstLetter('position')"
                      maxlength="30"
                    />
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div
                  class="native-input__input-wrap native-input__input-wrap_slim row"
                >
                  <label class="native-input__label-input">
                    <input
                      class="native-input__input native-input__input-checkbox"
                      type="checkbox"
                      v-model="applicationForm.agree"
                      required
                    />
                    Отправляя форму, вы соглашаетесь с Политикой конфиденциальности и обработкой персональных данных.
                  </label>
                </div>
              </div>
              <div class="col-12">
                <button
                  type="submit"
                  class="native-button native-button_wide native-button_alt"
                >
                  Получить кп
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Home',
  data() {
    return {
      specialties: [
        'Слесарь-ремонтник',
        'Водитель категории C, D, E',
        'Электромонтажник',
        'Сварщик',
        'Оператор ПНР',
        'Вахтовый рабочий',
        'Машинист',
        'Электрик'
      ],
      formData: {
        specialty: 'Слесарь-ремонтник',
        customSpecialty: '',
        region: '',
        duration: '',
        employees: ''
      },
      sliderValue: 0,
      calculatedPrice: 150000,
      companies: ['ink', 'rosneft', 'alrosa', 'gasprom', 'polus', 'sps'],
      services: [
        {
          title: 'Аутстаффинг водителей',
          label: 'лучший выбор',
          what: 'Подбираем водителей категорий C, D, E с опытом северных маршрутов',
          conditions: 'Вахтовый график, транспорт и страховка за наш счёт'
        },
        {
          title: 'Рабочие специальности',
          label: 'выгодно',
          what: 'Предоставляем слесарей, электриков, сварщиков, машинистов, операторов ПНР и др',
          conditions: 'Проверка документов, подтверждённый опыт работы в вахтовых условиях'
        },
        {
          title: 'Полное кадровое сопровождение',
          titleHtml: 'Полное кадровое<br />сопровождение',
          label: 'всё включено',
          what: 'Ищем, оформляем и ведём кадровый учёт сотрудников',
          conditions: 'Отчётность и оперативная замена специалистов при необходимости'
        },
        {
          title: 'Организация вахты',
          label: 'под ключ',
          what: 'Берём на себя все вопросы по размещению и обеспечению сотрудников',
          conditions: 'Организация логистики, проживания и питания'
        }
      ],
      steps: [
        {
          number: '01',
          title: 'Заявка',
          text: 'Вы отправляете нам запрос с описанием ваших потребностей, указываете количество специалистов, сроки и формат работы.'
        },
        {
          number: '02',
          title: 'Оформление',
          text: 'Мы заключаем договор, оформляем персонал официально в штат и берём на себя все юридические обязательства.'
        },
        {
          number: '03',
          title: 'Подбор',
          text: 'Формируем список кандидатов из нашей базы, проверяем их опыт и согласовываем финальный состав с вами.'
        },
        {
          number: '04',
          title: 'Выезд на вахту',
          text: 'Организуем логистику, доставку до объекта, размещение сотрудников и при необходимости питание.'
        },
        {
          number: '05',
          title: 'Сопровождение',
          text: 'Обеспечиваем поддержку на всех этапах вахты, контролируем дисциплину и оперативно заменяем персонал при необходимости.'
        }
      ],
      statistics: [
        {
          value: '5',
          title: 'Лет опыта',
          text: 'Мы стабильно предоставляем услуги аутстаффинга более пяти лет.'
        },
        {
          value: '30',
          title: 'Успешно реализованных проектов',
          text: 'Закрыли десятки проектов и обеспечили заказчиков нужным персоналом.'
        },
        {
          value: '15',
          title: 'Компаний доверяют нам',
          text: 'С нами сотрудничают российские компании из разных отраслей.'
        },
        {
          value: '8000',
          title: 'Сотрудников задействовано',
          text: 'Тысячи специалистов уже приняли участие в проектах с нашим участием.'
        }
      ],
      faqs: [
        {
          question: 'Чем аутстаффинг отличается от аутсорсинга?',
          icon: 'faq1',
          isOpen: false,
          answer: '<p>Аутстаффинг — это передача в управление уже подобранного персонала, который остаётся штатным сотрудником аутстаффинговой компании (в нашем случае — ООО "РЕЗАРЕСУРС"). Заказчик управляет работой сотрудников, но не является их работодателем. Мы берём на себя все кадровые, налоговые и юридические обязательства.</p><p>Аутсорсинг — это передача на внешнее исполнение целого функционала или процесса (например, бухгалтерия, IT-поддержка, охрана). Результат работы — обязанность исполнителя, а не отдельных сотрудников.</p><p>👉 <strong>В чём разница:</strong><br>При аутстаффинге вы управляете людьми, при аутсорсинге — вы получаете результат работы.</p>'
        },
        {
          question: 'Кто платит налоги и взносы?',
          icon: 'faq2',
          isOpen: false,
          answer: '<p>Все налоги и страховые взносы платит ООО "РЕЗАРЕСУРС" — как работодатель, на которого оформлены сотрудники.</p><span>Это включает:</span><ul><li>НДФЛ (13%),</li><li>Страховые взносы в ПФР, ФСС, ФОМС (до 30% от ФОТ),</li><li>Отпускные, больничные, пособия,</li><li>Компенсации при увольнении</li></ul><p>Вы платите единую фиксированную сумму за услуги аутстаффинга — без дополнительных обязательных платежей. Это позволяет снизить налоговую нагрузку и избежать административной нагрузки.</p>'
        },
        {
          question: 'Что делать, если сотрудник не вышел на вахту?',
          icon: 'faq3',
          isOpen: false,
          answer: '<p>Если сотрудник не выходит на вахту по уважительной или неуважительной причине — мы оперативно организуем замену.</p><p><strong>Мы:</strong></p><ul><li>Контролируем дисциплину и адаптацию персонала,</li><li>Ведём резервную базу квалифицированных кадров,</li><li>Гарантируем быструю подмену при пропусках или увольнениях.</li></ul><p>Вы своевременно сообщаете нам о ситуации — мы решаем её в кратчайшие сроки, не выставляя дополнительных счетов.</p>'
        },
        {
          question: 'Как быстро вы подбираете персонал?',
          icon: 'faq4',
          isOpen: false,
          answer: '<p>Мы подбираем персонал в течение 3–7 рабочих дней с момента подачи заявки, в зависимости от специальности и региона.</p><p><strong>Благодаря:</strong></p><ul><li>Наличию базы проверенных кандидатов,</li><li>Опыту в подборе для северных и удалённых регионов,</li><li>Готовности к работе вахтовым методом,</li></ul><p>мы обеспечиваем быстрое закрытие вакансий даже в сложнодоступных локациях: Якутия, Ямал, Забайкалье и др.</p>'
        },
        {
          question: 'Есть ли гарантия качества?',
          icon: 'faq5',
          isOpen: false,
          answer: '<p>Да, мы гарантируем качество подбора и стабильность персонала:</p><ul><li>Все кандидаты проходят тщательный отбор: проверка документов, собеседование, оценка опыта.</li><li>Мы контролируем дисциплину и адаптацию на объекте.</li><li>При необходимости — бесплатно заменяем сотрудника.</li><li>У нас есть резервная база кадров.</li><li>Мы несём полную юридическую и административную ответственность.</li></ul><p>Наша цель — чтобы вы получили надёжного специалиста, который будет эффективно работать на вашем проекте.</p>'
        },
        {
          question: 'Какие у вас юридические основания для деятельности?',
          icon: 'faq6',
          isOpen: false,
          answer: '<p>ООО "РЕЗАРЕСУРС" официально аккредитовано для осуществления деятельности по предоставлению труда работников.</p><p>Аккредитация выдана Государственной инспекцией труда в Иркутской области<br>(приказ № А-7/38 от 24.12.2024 г.),<br>действует до 24 декабря 2027 года.</p><p><strong>Это означает, что:</strong></p><ul><li>Мы ведём легальную деятельность в сфере аутстаффинга,</li><li>Соблюдаем требования Трудового кодекса РФ,</li><li>Имеем право оформлять сотрудников и предоставлять их другим компаниям.</li></ul><p>Вы работаете с нами на законных основаниях — без рисков для вашего бизнеса.</p>'
        }
      ],
      applicationForm: {
        name: '',
        phone: '',
        position: '',
        agree: true
      },
      applicationSubmitted: false,
      animatedStats: [0, 0, 0, 0],
      statsAnimated: false,
      stepsVisible: [false, false, false, false, false],
      stepsAnimated: false,
      servicesVisible: [],
      servicesAnimated: false
    }
  },
  computed: {
    headerImageStyle() {
      return {
        backgroundImage: `url(${this.imageUrl('header-pic.webp')})`
      };
    },
    teamImageStyle() {
      return {
        backgroundImage: `url(${this.imageUrl('team-pic.png')})`
      };
    },
    applicationFormStyle() {
      return {
        backgroundImage: `url(${this.imageUrl('Main.png')})`,
        backgroundSize: 'cover',
        backgroundPosition: 'center',
        backgroundRepeat: 'no-repeat'
      };
    }
  },
  methods: {
    async loadSeoTags() {
      // Пробуем несколько возможных алиасов главной страницы
      const aliasesToTry = ['home', 'index', 'main', 'glavnaya'];
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
        console.warn('SEO для главной страницы не найдено. Проверьте alias страницы в админке (лучше установить "home").');
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
    imageUrl(path) {
      // Helper для путей к изображениям из public
      return path.startsWith('/') ? path : `/rez/images/${path}`;
    },
    recalculateSlider() {
      const fields = [
        this.formData.specialty || this.formData.customSpecialty,
        this.formData.region,
        this.formData.duration,
        this.formData.employees
      ];

      const filledFields = fields.filter(field => field && String(field).trim()).length;
      this.sliderValue = Math.floor((filledFields / fields.length) * 100);
    },
    calculatePrice() {
      // Простая логика расчета (можно расширить)
      if (this.formData.employees && this.formData.duration) {
        const basePrice = 5000; // базовая цена за день на сотрудника
        this.calculatedPrice = this.formData.employees * this.formData.duration * basePrice;
      }
    },
    async submitApplication() {
      // Отправка формы заявки (можно подключить к API)
      try {
        console.log('Отправка заявки:', this.applicationForm);
        // Здесь можно добавить отправку на сервер через axios
        this.applicationSubmitted = true;
        // Сброс формы
        this.applicationForm = {
          name: '',
          phone: '',
          position: '',
          agree: true
        };
      } catch (error) {
        console.error('Ошибка отправки заявки:', error);
        // Можно вывести ненавязчивое сообщение об ошибке
      }
    },
    capitalizeFirstLetter(field) {
      // Делаем первую букву заглавной
      const value = this.applicationForm[field];
      if (value && value.length > 0) {
        this.applicationForm[field] = value.charAt(0).toUpperCase() + value.slice(1);
      }
    },
    onPhoneFocus() {
      // При клике на поле, если оно пустое, ставим +7
      if (!this.applicationForm.phone || this.applicationForm.phone === '') {
        this.applicationForm.phone = '+7 ';
      }
    },
    formatPhone() {
      // Форматируем номер телефона в формате +7 (999) 444-44-44
      let value = this.applicationForm.phone.replace(/\D/g, ''); // Убираем все нецифровые символы
      
      // Всегда начинаем с 7
      if (!value.startsWith('7')) {
        value = '7' + value.replace(/^7*/, '');
      }
      
      // Ограничиваем длину (7 + 10 цифр)
      value = value.substring(0, 11);
      
      // Форматируем
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
      
      this.applicationForm.phone = formatted;
    },
    toggleFaq(faq) {
      faq.isOpen = !faq.isOpen;
    },
    onEnter(el) {
      // Устанавливаем начальную высоту
      el.style.height = '0';
      el.style.opacity = '0';
      
      // Получаем реальную высоту контента
      const height = el.scrollHeight;
      
      // Используем requestAnimationFrame для плавности
      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          el.style.height = height + 'px';
          el.style.opacity = '1';
        });
      });
    },
    onLeave(el) {
      // Устанавливаем начальную высоту
      const height = el.scrollHeight;
      el.style.height = height + 'px';
      el.style.opacity = '1';
      
      // Используем requestAnimationFrame для плавности
      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          el.style.height = '0';
          el.style.opacity = '0';
        });
      });
    },
    initFormVisibility() {
      const formSection = this.$el.querySelector('.application-form-section');
      if (!formSection) return;
      
      // Используем Intersection Observer для плавного появления
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            // Добавляем класс с небольшой задержкой для плавности
            setTimeout(() => {
              entry.target.classList.add('visible');
            }, 50);
            observer.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.1, // Срабатывает когда 10% элемента видно
        rootMargin: '50px' // Начинает анимацию немного раньше
      });
      
      observer.observe(formSection);
    },
    animateCounter(index, targetValue) {
      const duration = 2000; // 2 секунды
      const steps = 60; // количество шагов
      const stepDuration = duration / steps;
      const increment = targetValue / steps;
      let currentValue = 0;
      
      const timer = setInterval(() => {
        currentValue += increment;
        if (currentValue >= targetValue) {
          this.animatedStats[index] = targetValue;
          clearInterval(timer);
        } else {
          this.animatedStats[index] = Math.floor(currentValue);
        }
      }, stepDuration);
    },
    formatNumber(num) {
      // Форматируем число с пробелами (8000 → 8 000)
      return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
    },
    initStatsAnimation() {
      const statsWrapper = this.$el.querySelector('.counter-wrapper');
      if (!statsWrapper || this.statsAnimated) return;
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting && !this.statsAnimated) {
            this.statsAnimated = true;
            // Запускаем анимацию для каждой цифры
            this.statistics.forEach((stat, index) => {
              setTimeout(() => {
                this.animateCounter(index, parseInt(stat.value));
              }, index * 100); // Задержка между запуском анимаций
            });
            observer.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.3
      });
      
      observer.observe(statsWrapper);
    },
    initStepsAnimation() {
      const stepsWrapper = this.$el.querySelector('.steps-wrapper');
      if (!stepsWrapper || this.stepsAnimated) return;
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting && !this.stepsAnimated) {
            this.stepsAnimated = true;
            // Последовательно показываем шаги
            this.steps.forEach((step, index) => {
              setTimeout(() => {
                this.stepsVisible[index] = true;
              }, index * 200); // Задержка 200мс между шагами
            });
            observer.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.2
      });
      
      observer.observe(stepsWrapper);
    },
    initServicesAnimation() {
      const servicesTable = this.$el.querySelector('.services-table');
      if (!servicesTable || this.servicesAnimated) return;
      
      // Инициализируем массив видимости услуг
      this.servicesVisible = new Array(this.services.length).fill(false);
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting && !this.servicesAnimated) {
            this.servicesAnimated = true;
            // Последовательно показываем услуги
            this.services.forEach((service, index) => {
              setTimeout(() => {
                this.servicesVisible[index] = true;
              }, index * 300); // Задержка 300мс между услугами
            });
            observer.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.1
      });
      
      observer.observe(servicesTable);
    },
    initImagesAnimation() {
      const images = this.$el.querySelectorAll('.image-fade-in');
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
  },
  mounted() {
    this.recalculateSlider();
    this.loadSeoTags();
    // Плавное появление формы заявки при прокрутке
    this.$nextTick(() => {
      this.initFormVisibility();
      this.initStatsAnimation();
      this.initStepsAnimation();
      this.initServicesAnimation();
      this.initImagesAnimation();
    });
  }
}
</script>

<style>
/* Плавная прокрутка для всей страницы */
html {
  scroll-behavior: smooth;
}

@media (prefers-reduced-motion: reduce) {
  html {
    scroll-behavior: auto;
  }
}

/* Глобальные стили для радиокнопок - убираем галочку, оставляем только круг с градиентом */
.native-input__input-radio:checked::after {
  display: none !important;
  content: none !important;
}

/* Плавная анимация для FAQ аккордеона */
.native-accardeon__slide {
  border-bottom: solid 1px var(--main-border-color);
  overflow-anchor: none;
}

/* Стили для кнопки summary */
.native-accardeon__summary {
  display: flex;
  align-items: center;
  padding: clamp(14px, 1.7177540107cqw, 31px) clamp(9px, 1.0225668449cqw, 18px);
  gap: clamp(9px, 1.3968983957cqw, 25px);
  width: 100%;
  background: none;
  border: none;
  text-align: left;
  cursor: pointer;
  overflow-anchor: none;
  scroll-margin: 0;
}

.native-accardeon__summary:hover {
  background: transparent;
}

/* Затемнение стрелки при наведении на вопрос */
.native-accardeon__summary:hover .native-accardeon__summary-toggle {
  opacity: 0.5;
  filter: brightness(0.7);
}

.native-accardeon__summary-icon {
  width: clamp(26px, 2.5198930481cqw, 46px);
  height: clamp(26px, 2.5198930481cqw, 46px);
  display: flex;
  align-items: center;
  justify-content: center;
  background: transparent;
  border-radius: 3px;
  transition: background 0.3s ease;
  flex-shrink: 0;
}

.native-accardeon__summary-icon img {
  width: 100%;
}

.native-accardeon__summary[aria-expanded="true"] .native-accardeon__summary-icon {
  background: #f8f8f8;
}

.native-accardeon__summary-title {
  flex-grow: 1;
  font-size: var(--text-size-4);
}

.native-accardeon__summary-toggle {
  background-image: url(/rez/images/chevron.svg);
  width: 20px;
  height: 20px;
  background-size: clamp(10px, 1.0225668449cqw, 18px);
  background-repeat: no-repeat;
  background-position: center;
  transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), 
              opacity 0.3s ease,
              filter 0.3s ease;
  flex-shrink: 0;
}

.native-accardeon__summary-toggle_open {
  transform: rotate(180deg);
}

/* Плавное смещение аккордеона при раскрытии */
.native-accardeon {
  border-top: solid 1px var(--main-border-color);
  overflow-anchor: none;
}

/* Vue Transition для аккордеона */
.native-accardeon__content-wrapper {
  overflow: hidden;
}

.native-accardeon__content {
  color: var(--second-text-color);
  padding: clamp(14px, 1.7177540107cqw, 31px) clamp(9px, 1.0225668449cqw, 18px);
  padding-top: 0;
}

/* Vue Transition анимация */
.accordion-enter-active,
.accordion-leave-active {
  transition: height 0.4s cubic-bezier(0.4, 0, 0.2, 1),
              opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  overflow: hidden;
}

.accordion-enter-from,
.accordion-leave-to {
  height: 0;
  opacity: 0;
}

.accordion-enter-to,
.accordion-leave-from {
  opacity: 1;
}

/* Плавное смещение всех последующих секций при изменении высоты вышестоящих элементов */
.section {
  transition: margin-top 0.4s cubic-bezier(0.4, 0, 0.2, 1),
              transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  will-change: margin-top, transform;
  overflow-anchor: none;
}

/* Специальная анимация для секции аккредитации */
.section-smooth {
  transition: margin-top 0.4s cubic-bezier(0.4, 0, 0.2, 1),
              transform 0.4s cubic-bezier(0.4, 0, 0.2, 1),
              opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  will-change: margin-top, transform, opacity;
  overflow-anchor: none;
}

/* Плавное изменение позиции всех элементов при раскрытии аккордеона */
.container {
  transition: padding-bottom 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Улучшаем плавность прокрутки во время анимации */
body {
  overflow-x: hidden;
}

/* Плавная анимация для иконки toggle */
.native-accardeon__summary-toggle {
  transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Восстановление маркеров для списков в FAQ */
.native-accardeon__content ul {
  list-style-type: disc;
  padding-left: 1.5em;
  margin: 1em 0;
}

.native-accardeon__content ul li {
  margin-bottom: 0.5em;
  padding-left: 0.5em;
}

.native-accardeon__content ul li::marker {
  color: var(--main-text-color);
}

/* Плавное появление формы заявки */
.application-form-section {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1),
              transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  will-change: opacity, transform;
}

.application-form-section.visible {
  opacity: 1;
  transform: translateY(0);
}

/* Принудительно отключаем старый фон SVG для формы заявки */
.application-form-section.section_red-decoration {
  background-image: none !important;
}

/* Включаем overlay градиент для плавного затемнения к футеру */
.application-form-section.section_overlay::before {
  content: "" !important;
  display: block !important;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(180deg, transparent 0%, transparent 50%, rgba(20, 20, 21, 0.7) 85%, var(--block-color-2) 100%) !important;
  pointer-events: none;
  z-index: 1;
}

.application-form-section .container {
  position: relative;
  z-index: 2;
  padding-left: calc(var(--bs-gutter-x) * 0.5) !important;
  padding-right: calc(var(--bs-gutter-x) * 0.5) !important;
  margin-left: auto;
  margin-right: auto;
}

/* Выравниваем row внутри формы заявки с общим контейнером страницы */
.application-form-section .row {
  margin-left: calc(-0.5 * var(--bs-gutter-x));
  margin-right: calc(-0.5 * var(--bs-gutter-x));
}

/* Убираем белую полосу между формой и футером на мобильных */
@media (width < 768px) {
  section.application-form-section,
  .application-form-section.section,
  .application-form-section {
    margin: 0 !important;
    margin-bottom: 0 !important;
    margin-top: 0 !important;
    padding-bottom: clamp(60px, 6.7979679144cqw, 126px) !important;
  }
  
  .home-page {
    margin: 0 !important;
    margin-bottom: 0 !important;
    padding-bottom: 0 !important;
  }
  
  .home-page > *:last-child {
    margin-bottom: 0 !important;
  }
}

/* Анимация появления шагов */
.step-item {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.step-item.step-visible {
  opacity: 1;
  transform: translateY(0);
}

/* Анимация появления услуг */
.service-item {
  opacity: 0;
  transform: translateX(-30px);
  transition: opacity 0.7s ease-out, transform 0.7s ease-out;
}

.service-item.service-visible {
  opacity: 1;
  transform: translateX(0);
}

/* Анимация появления картинок */
.image-fade-in {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.8s ease-out, transform 0.8s ease-out;
  will-change: opacity, transform;
}

.image-fade-in.visible {
  opacity: 1;
  transform: translateY(0);
}

</style>

<style scoped>
.home-page {
  min-height: 100vh;
}
</style>
