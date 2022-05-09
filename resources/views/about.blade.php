@include('components.header')
<main class="main" style="background-image: url(images/bg/page-bg.jpg)">
    <section class="about page__about">
        <div class="container">
            <div class="about__inner" id="about">
                <img class="about__img" src="{{$about->img_path}}" alt="">
                <div class="about__content">
                    <h3 class="about__title page__title">
                        {{$about->title}}
                    </h3>
                    <p class="about__text page__text">
                        {{$about->body}}
                    </p>
                    @foreach($about->service as $service)
                        <div class="about__item">
                            <img class="about__item-img" src="{{$service->img_path}}" alt="">
                            <div class="about__item-content">
                                <h5 class="about__item-title">
                                    {{$service->title}}
                                </h5>
                                <p class="about__item-text page__text">
                                    {{$service->body}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="about__sliders">
                <div class="team">
                    <h3 class="team__title page__title">
                        Команда фонда
                    </h3>
                    <div class="team__slider">
                        @foreach($teams as $team)
                            <div class="team__item">
                                <img class="team__img" src="{{$team->img_path}}" alt="">
                                <p class="team__patronymic">
                                    {{$team->first_name}}
                                </p>
                                <p class="team__name">
                                    {{$team->second_name}}
                                    {{$team->patron_name}}
                                </p>
                                <p class="team__post">
                                    {{$team->position}}
                                </p>
                                <div class="team__social">
                                    <img src="images/icons/telegram-slide.svg" alt="">
                                    <img src="images/icons/whatsapp-slide.svg" alt="">
                                    <img src="images/icons/phone-slide.svg" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="team">
                    <h3 class="team__title page__title">
                        Команда фонда
                    </h3>
                    <div class="team__slider">
                        @foreach($teams as $team)
                            <div class="team__item">
                                <img class="team__img" src="{{$team->img_path}}" alt="">
                                <p class="team__patronymic">
                                    {{$team->first_name}}
                                </p>
                                <p class="team__name">
                                    {{$team->second_name}}
                                    {{$team->patron_name}}
                                </p>
                                <p class="team__post">
                                    {{$team->position}}
                                </p>
                                <div class="team__social">
                                    <img src="images/icons/telegram-slide.svg" alt="">
                                    <img src="images/icons/whatsapp-slide.svg" alt="">
                                    <img src="images/icons/phone-slide.svg" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
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
@include("components.footer")
