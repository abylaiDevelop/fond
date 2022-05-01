$(document).ready(function () {


    let header = $('.header');
    let scrollOffset = 0;

    $(window).on('scroll', function () {
        scrollOffset = $(this).scrollTop();

        if (scrollOffset >= 20) {
            header.addClass('active');
        } else {
            header.removeClass('active');
        }
    });

    $('.intro__slider').slick({
        nextArrow: '<button class="click__arrow next"><img src="frontend/images/icons/slider-arrow.svg" alt=""></button>',
        prevArrow: '<button class="click__arrow prev"><img src="frontend/images/icons/slider-arrow.svg" alt=""></button>',
        dots: true,
        infinite: true,
        speed: 300,
    });

    $('.team__slider').slick({
        nextArrow: '<button class="click__arrow next"><img src="frontend/images/icons/slider-arrow.svg" alt=""></button>',
        prevArrow: '<button class="click__arrow prev"><img src="frontend/images/icons/slider-arrow.svg" alt=""></button>',
        slidesToShow: 3,
        responsive: [
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 430,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                    centerPadding: '60px',
                }
            }
            ]

    });

    $('.projects__slider').slick({
        nextArrow: $('.arrow-next'),
        prevArrow: $('.arrow-prev'),
        dots: true,
        infinite: false,
        slidesToScroll: 1,
        slidesToShow: 4,
        speed: 300,
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 830,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
            ]
    });


    $('.burger').on('click', function () {

        $(this).toggleClass('burger--active');
        $('.header__item').toggleClass('active');
        $('.header__item-box').toggleClass('active');
        $('body').toggleClass('no-scroll');
    });

    $('.header__item-box').on('click', function () {

        $('.burger').removeClass('burger--active');
        $('.header__item').removeClass('active');
        $('.header__item-box').removeClass('active');
        $('body').removeClass('no-scroll');

    });

    $('.header__list-link').on('click', function () {

        $('.burger').removeClass('burger--active');
        $('.header__item').removeClass('active');
        $('.header__item-box').removeClass('active');
        $('body').removeClass('no-scroll');

    });


    $('.task__accordion-title').on('click', function () {
        $(this).next('.task__accordion-text').slideToggle();
        $(this).toggleClass('active');
    });


    /* modal */

    const modalCall = $('[data-modal]');
    const modalClose = $('[data-close]');

    modalCall.on('click', function (event) {
        event.preventDefault();

        let $this = $(this),
            modalId = $this.data('modal');

        $(modalId).addClass('show');
        $('body').addClass('no-scroll');
    });

    modalClose.on('click', function (event) {
        event.preventDefault();

        let $this = $(this),
            modalParent = $this.parents('.modal');

        modalParent.removeClass('show');
        $('body').removeClass('no-scroll');
    });

    $('.modal').on('click', function (event) {
        $(this).removeClass('show');
        $('body').removeClass('no-scroll');
    });

    $('.modal__content').on('click', function (event) {
        event.stopPropagation();
    });

    $('.foundation__form').on('input', '.input-words', function () {
        this.value = this.value.replace(/[^a-zа-яё\s]/gi, '');
    });

    $('.foundation__form').on('input', '.input-phone', function () {
        this.value = this.value.replace(/[^\d]/g, '');
    });


});
