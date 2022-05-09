
@include('components.header', $common)
    <main class="main">
        <section class="intro" style="background-image: url(images/bg/intro-bg.jpg)">
            <div class="intro-box">
                <div class="container">
                    <div class="intro__slider">
                        @foreach($slider as $item)
                            <div class="intro__content">
                                <h1 class="intro__content-title">
                                    {!!html_entity_decode($item->name)!!}
                                </h1>
                                <p class="intro__content-text page__text">
                                    {{$item->preview_text}}
                                </p>
                                <div class="intro__content-bottom">
                                    <button class="intro__content-btn page__btn">
                                        Подробнее
                                    </button>
                                    <div class="intro__content-social">
                                        <a class="intro__content-link intro__content-youtube" href="{{$item->youtube}}">
                                            <svg class="icon" width="22" height="15.9">
                                                <use xlink:href="images/icons/sprite.svg#youtube"></use>
                                            </svg>
                                        </a>
                                        <a class="intro__content-link intro__content-instagram" href="{{$item->instagram}}">
                                            <svg class="icon" width="19" height="19">
                                                <use xlink:href="images/icons/sprite.svg#instagram"></use>
                                            </svg>
                                        </a>
                                        <a class="intro__content-link intro__content-facebook" href="{{$item->facebook}}">
                                            <svg class="icon" width="11" height="21">
                                                <use xlink:href="images/icons/sprite.svg#facebook"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="about" style="background-image: url(images/bg/about-bg.jpg)">
            <div class="container">
                <div class="about__inner" id="about">
                    <img class="about__img" src="images/img/about-img.png" alt="">
                    <div class="about__content">
                        <h3 class="about__title page__title">
                            О нашем фонде
                        </h3>
                        <p class="about__text page__text">
                            Группа работает в 10 странах мира: Канаде, Китае, Грузии, Израиле, Казахстане, России, Сингапуре, Турции, Вьетнаме, Украине в таких секторах как девелопмент, строительные материалы, нефтедобыча, развитие сети АЗС нового формата “Compass”, сельское хозяйство. Всего в группе более 30 компаний, где задействовано около 8000 сотрудников.
                        </p>
                        <div class="about__item">
                            <img class="about__item-img" src="images/icons/about-item-1.svg" alt="">
                            <div class="about__item-content">
                                <h5 class="about__item-title">
                                    Поддержка многодетных семей, малоимущих
                                </h5>
                                <p class="about__item-text page__text">
                                    Посредством поставки продуктовых наборов и адресной материальной помощи в сотрудничестве с волонтерскими организациями и региональными государственными
                                    органами Республики Казахстан
                                </p>
                            </div>
                        </div>
                        <div class="about__item">
                            <img class="about__item-img" src="images/icons/about-item-2.svg" alt="">
                            <div class="about__item-content">
                                <h5 class="about__item-title">
                                    Предоставление помощи медикам
                                </h5>
                                <p class="about__item-text page__text">
                                    Необходимыми средствами для борьбы с инфекцией и обеспечения
                                    условий их работы
                                </p>
                            </div>
                        </div>
                        <div class="about__item">
                            <img class="about__item-img" src="images/icons/about-item-3.svg" alt="">
                            <div class="about__item-content">
                                <h5 class="about__item-title">
                                    Сотрудничество с благотворительными фондами
                                </h5>
                                <p class="about__item-text page__text">
                                    Посредством поставки продуктовых наборов и адресной материальной помощи в сотрудничестве с волонтерскими организациями и региональными государственными
                                    органами Республики Казахстан
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="news" style="background-image: url(images/bg/news-bg.jpg)">
            <div class="container">
                <h3 class="news__title page__title">
                    Новости фонда
                </h3>
                <div class="news__inner">
                    @foreach ($news as $item)
                        <div class="news__item">
                            <img class="news__item-img" src={{$item->img_path}} alt="">
                            <h6 class="news__item-title">
                               {{$item->name}}
                            </h6>
                            <p class="news__item-date">
                                <time>{{$item->created_at->format('d M Y')}}</time>
                            </p>
                            <p class="news__item-text page__text">
                                {{$item->preview_text}}
                            </p>
                            <a class="news__item-link" href="/news/{{$item->id}}">
                                Подробнее
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="projects"  style="background-image: url(images/bg/projects-bg.jpg)">
            <div class="container">
                <h3 class="projects__title page__title">
                    НАШИ ПРОЕКТЫ
                </h3>
                <div class="projects__slider" id="projects">
                    @foreach($projects as $item)
                        <div class="projects__item">
                            <img class="projects__item-img" src="{{$item->img_path}}" alt="">
                            <div class="projects__item-content">
                                <h6 class="projects__item-title">
                                    {{$item->name}}
                                </h6>
                                <p class="projects__item-text page__text">
                                    {{$item->preview_text}}
                                </p>
                                <div class="projects__item-button">
                                    <a class="projects__item-link page__btn" href="#?">
                                        Пожертвовать
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <ul class="slick-dots">
                    <button class="arrow arrow-next">
                        <img src="images/icons/slider-arrow.svg" alt="">
                    </button>
                    <button class="arrow arrow-prev">
                        <img src="images/icons/slider-arrow.svg" alt="">
                    </button>
                </ul>
            </div>
        </section>

        <section class="reports">
            <div class="container">
                <h3 class="reports__title page__title" id="reports">
                    Годовые отчеты
                </h3>
                <div class="reports__inner">
                    @foreach($reports as $report)
                        <div class="reports__item">
                            <div class="reports__item-title">
                               {{$report->name}}
                            </div>
                            <a class="reports__item-download" href="{{$report->file}}" download="">
                                Скачать
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="foundation">
            <div class="container">
                <div class="foundation__inner">
                    <img class="foundation__img" src="images/img/foundation-img.png" alt="">
                    <div class="foundation__content">
                        <h3 class="foundation__title">
                            Обратиться в фонд
                        </h3>
                        <p class="foundation__text">
                            Задайте их нашему специалисту и получите ответ в течение 15 минут!
                        </p>
                        <form class="foundation__form">
                            <input class="foundation__form-name input-words" type="text" name="name" placeholder="Вашe имя">
                            <input class="foundation__form-phone input-phone" type="phone" name="phone" placeholder="Ваш телефон">
                            <input class="foundation__form-btn page__btn" type="submit" value="Задать вопрос">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@include('components.footer')
