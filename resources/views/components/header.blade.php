<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" user-scalable=0>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/fovicon.svg">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
<div class="body">
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <a class="header__logo" href="/">
                    <img src="{{$common->logo}}" alt="">
                </a>
                <button class="burger">
                    <span class="burger-line"></span>
                </button>
                <div class="header__item-box"></div>
                <div class="header__item">
                    <div class="header__language">
                        <a class="header__language-ru" href="#?">
                            ru
                        </a>
                        <a class="header__language-kz" href="#?">
                            kz
                        </a>
                        <a class="header__language-en" href="#?">
                            en
                        </a>
                    </div>
                    <nav class="header__nav">
                        <ul class="header__list">
                            <li class="header__list-item">
                                <a class="header__list-link" href="/about">
                                    О фонде
                                </a>
                            </li>
                            <li class="header__list-item">
                                <a class="header__list-link" href="/">
                                    Наши проекты
                                </a>
                            </li>
                            <li class="header__list-item">
                                <a class="header__list-link" href="/reports">
                                    Отчёты
                                </a>
                            </li>
                            <li class="header__list-item">
                                <a class="header__list-link" href="/contacts">
                                    Контакты
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="header__contacts">
                        <p class="header__contacts-phone">
                            {{$common->phone}}
                        </p>
                        <a class="header__contacts-email" href="#?">
                            {{$common->email}}
                        </a>
                        <a class="header__contacts-whatsaap" href="mailto:{{$common->email}}">
                            Написать нам
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
