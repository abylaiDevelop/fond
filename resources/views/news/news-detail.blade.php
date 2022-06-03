@include('components.header')
<main class="main" style="background-image: url(/images/bg/page-bg.jpg)">

    <section class="news__page">
        <div class="container">
            <h3 class="news__page-title page__title">
                Новостная страница
            </h3>
            <img class="news__page-img" src="/{{$news->img_path}}" alt="">
            <p class="news__page-date">
                {{$news->created_at}}
            </p>
            <p class="news__page-text">
                {{$news->preview_text}}
            </p>
            <p class="news__page-text">
                {{$news->preview_text}}
            </p>
        </div>
    </section>

    <section class="foundation">
        <div class="container">
            <div class="foundation__inner">
                <img class="foundation__img" src="/images/img/foundation-img.png" alt="">
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
