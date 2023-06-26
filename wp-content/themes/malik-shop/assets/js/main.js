/* ===================================================================
 * Abstract 2.0.0 - Main JS
 *
 * ------------------------------------------------------------------- */
//product tabs



(function ($) {

    "use strict";

    const cfg = {
        scrollDuration: 800, // smoothscroll duration
        mailChimpURL: 'https://facebook.us8.list-manage.com/subscribe/post?u=cdb7b577e41181934ed6a6a44&amp;id=e6957d85dc' // MailChimp URL
    }


    /* preloader
     * -------------------------------------------------- */
    const ssPreloader = function () {

        const preloader = document.querySelector('#preloader');
        if (!preloader) return;

        document.querySelector('html').classList.add('ss-preload');

        window.addEventListener('load', function () {

            document.querySelector('html').classList.remove('ss-preload');
            document.querySelector('html').classList.add('ss-loaded');

            preloader.addEventListener('transitionend', function (e) {
                if (e.target.matches("#preloader")) {
                    this.style.display = 'none';
                }
            });
        });

    }; // end ssPreloader



    /* alert boxes
     * ------------------------------------------------------ */
    const ssAlertBoxes = function () {

        const boxes = document.querySelectorAll('.alert-box');
        if (!boxes) return;

        boxes.forEach(function (box) {

            box.addEventListener('click', function (e) {
                if (e.target.matches(".alert-box__close")) {
                    e.stopPropagation();
                    e.target.parentElement.classList.add("hideit");

                    setTimeout(function () {
                        box.style.display = "none";
                    }, 500)
                }
            });

        })

    }; // end ssAlertBoxes



    /* Mobile Menu
     * ---------------------------------------------------- */
    const ssMobileMenu = function () {

        const $navWrap = $('.s-header__nav-wrap');
        const $closeNavWrap = $navWrap.find('.s-header__overlay-close');
        const $menuToggle = $('.s-header__toggle-menu');
        const $siteBody = $('body');

        $menuToggle.on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            $siteBody.addClass('nav-wrap-is-visible');
        });

        $closeNavWrap.on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            if ($siteBody.hasClass('nav-wrap-is-visible')) {
                $siteBody.removeClass('nav-wrap-is-visible');
            }
        });

        // open (or close) submenu items in mobile view menu. 
        // close all the other open submenu items.
        $('.s-header__nav .has-children').children('a').on('click', function (e) {
            e.preventDefault();

            if ($(".close-mobile-menu").is(":visible") == true) {

                $(this).toggleClass('sub-menu-is-open')
                    .next('ul')
                    .slideToggle(200)
                    .end()
                    .parent('.has-children')
                    .siblings('.has-children')
                    .children('a')
                    .removeClass('sub-menu-is-open')
                    .next('ul')
                    .slideUp(200);

            }
        });

    }; // end ssMobileMenu

    /* search
     * ------------------------------------------------------ */
    const ssSearch = function () {

        const searchWrap = document.querySelector('.s-header__search');
        const searchTrigger = document.querySelector('.s-header__search-trigger');

        if (!(searchWrap && searchTrigger)) return;

        const searchField = searchWrap.querySelector('.s-header__search-field');
        const closeSearch = searchWrap.querySelector('.s-header__overlay-close');
        const siteBody = document.querySelector('body');

        searchTrigger.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            siteBody.classList.add('search-is-visible');
            setTimeout(function () {
                searchWrap.querySelector('.s-header__search-field').focus();
            }, 100);
        });

        closeSearch.addEventListener('click', function (e) {
            e.stopPropagation();

            if (siteBody.classList.contains('search-is-visible')) {
                siteBody.classList.remove('search-is-visible');
                setTimeout(function () {
                    searchWrap.querySelector('.s-header__search-field').blur();
                }, 100);
            }
        });

        searchWrap.addEventListener('click', function (e) {
            if (!(e.target.matches('.s-header__search-field'))) {
                closeSearch.dispatchEvent(new Event('click'));
            }
        });

        searchField.addEventListener('click', function (e) {
            e.stopPropagation();
        })

        searchField.setAttribute('placeholder', 'Type Keywords');
        searchField.setAttribute('autocomplete', 'off');

    }; // end ssSearch


    /* masonry
     * ------------------------------------------------------ */
    const ssMasonry = function () {
        const containerBricks = document.querySelector('.bricks-wrapper');
        if (!containerBricks) return;

        imagesLoaded(containerBricks, function () {

            const msnry = new Masonry(containerBricks, {
                itemSelector: '.entry',
                columnWidth: '.grid-sizer',
                percentPosition: true,
                resize: true
            });

        });

    }; // end ssMasonry


    /* animate bricks
     * ------------------------------------------------------ */
    const ssBricksAnimate = function () {

        const animateEl = document.querySelectorAll('.animate-this');
        if (!animateEl) return;

        window.addEventListener('load', function () {

            setTimeout(function () {
                animateEl.forEach(function (item, ctr) {
                    let el = item;

                    setTimeout(function () {
                        el.classList.add('animated', 'fadeInUp');
                    }, ctr * 200);
                });
            }, 200);
        });

        window.addEventListener('resize', function () {
            // remove animation classes
            animateEl.forEach(function (item) {
                let el = item;
                el.classList.remove('animate-this', 'animated', 'fadeInUp');
            });
        });

    }; // end ssBricksAnimate


    /* slick slider
     * ------------------------------------------------------ */
    const ssSlickSlider = function () {

        function ssRunFeaturedSlider() {

            const $fSlider = $('.featured-post-slider').slick({
                arrows: false,
                dots: false,
                speed: 1000,
                fade: true,
                cssEase: 'linear',
                slidesToShow: 1,
                centerMode: true
            });

            $('.featured-post-nav__prev').on('click', function () {
                $fSlider.slick('slickPrev');
            });

            $('.featured-post-nav__next').on('click', function () {
                $fSlider.slick('slickNext');
            });

        } // end ssRunFeaturedSlider

        function ssRunGallerySlider() {

            const $gallery = $('.slider__slides').slick({
                arrows: false,
                dots: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: true,
                pauseOnFocus: false,
                fade: true,
                cssEase: 'linear'
            });

            $('.slider__slide').on('click', function () {
                $gallery.slick('slickGoTo', parseInt($gallery.slick('slickCurrentSlide')) + 1);
            });

        } // end ssRunGallerySlider

        ssRunFeaturedSlider();
        ssRunGallerySlider();

    }; // end ssSlickSlider

    /* Smooth Scrolling
     * ------------------------------------------------------ */
    const ssSmoothScroll = function () {

        $('.smoothscroll').on('click', function (e) {
            let target = this.hash,
                $target = $(target);

            e.preventDefault();
            e.stopPropagation();

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, cfg.scrollDuration, 'swing').promise().done(function () {

                window.location.hash = target;
            });
        });

    }; // endSmoothScroll

    /* AjaxChimp
     * ------------------------------------------------------ */
    const ssAjaxChimp = function () {

        $('#mc-form').ajaxChimp({
            language: 'es',
            url: cfg.mailChimpURL
        });

        // Mailchimp translation
        //
        //  Defaults:
        //	 'submit': 'Submitting...',
        //  0: 'We have sent you a confirmation email',
        //  1: 'Please enter a value',
        //  2: 'An email address must contain a single @',
        //  3: 'The domain portion of the email address is invalid (the portion after the @: )',
        //  4: 'The username portion of the email address is invalid (the portion before the @: )',
        //  5: 'This email address looks fake or invalid. Please enter a real email address'

        $.ajaxChimp.translations.es = {
            'submit': 'Submitting...',
            0: '<i class="fa fa-check"></i> We have sent you a confirmation email',
            1: '<i class="fa fa-warning"></i> You must enter a valid e-mail address.',
            2: '<i class="fa fa-warning"></i> E-mail address is not valid.',
            3: '<i class="fa fa-warning"></i> E-mail address is not valid.',
            4: '<i class="fa fa-warning"></i> E-mail address is not valid.',
            5: '<i class="fa fa-warning"></i> E-mail address is not valid.'
        }

    }; // end ssAjaxChimp


    /* back to top
     * ------------------------------------------------------ */
    const ssBackToTop = function () {

        const pxShow = 800;
        const goTopButton = document.querySelector(".ss-go-top");

        if (!goTopButton) return;

        // Show or hide the button
        if (window.scrollY >= pxShow) goTopButton.classList.add("link-is-visible");

        window.addEventListener('scroll', function () {
            if (window.scrollY >= pxShow) {
                if (!goTopButton.classList.contains('link-is-visible')) goTopButton.classList.add("link-is-visible")
            } else {
                goTopButton.classList.remove("link-is-visible")
            }
        });

    }; // end ssBackToTop





    /* Initilize slider
   * ------------------------------------------------------ */
    const owlCaruselInint = function () {
        $(".owl-carousel").owlCarousel({
            loop: true,
            nav: true,
            margin: 10,
            video: true,
            center: true,
            dots: true,
            touchDrag: true,
            autoHeight: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                760: {
                    items: 3
                }
            }
        });
    };
    /* end initilize slider
       * ------------------------------------------------------ */

    const metrica = function () {
        const toCart = $(".single_add_to_cart_button");
        const orderBtn = $('.checkout-button');
        const confirmBtn = $("#place_order");
        const title = $('.product_title');
        const singleProductForm = $('.variations_form cart')
        toCart.on('click', function (e) {
            localStorage.setItem('added', true);
            console.log('added')
            ym(85226839, 'reachGoal', 'korzina');
            _tmr.push({ type: 'reachGoal', id: 3305747, goal: 'addtocart' })
        })
        $(document.body).on('show_variation', function () {
            _tmr.push({ type: 'reachGoal', id: 3305747, goal: 'viewProduct' });
        })

        confirmBtn.on('click', function (e) { console.log(e); ym(85226839, 'reachGoal', 'zakaz'); _tmr.push({ type: 'reachGoal', id: 3305747, goal: 'purchase' }); });
        orderBtn.on('click', function () { ym(85226839, 'reachGoal', 'zakaz1'); });
    };

    const eraseDefaultCity = () => {
        $('#billing_city').val('')
    }

    const openLink = function () {

        $('a.clickBuyButton').click(() => {
            window.open('https://vk.com/app5898182_-204107197#s=1981623/?utm_source=website')
        })
        $('.vk-link').click(() => {
            window.open('https://vk.com/app5898182_-204107197#s=1981623/?utm_source=website')
        })
    };

    const showPopup = () => {
        const opacity = $('.opacity-banner'),
            subscribe = $('.banner'),
            subBtn = $('.close');
        const showPopup = () => {
            if (!opacity.hasClass('show')) {
                opacity.addClass('show')
                subscribe.addClass('visible')
                localStorage.setItem('is_shown_free_delivery_popup', 'true')
            }
        }
        const closePopup = () => {
            opacity.removeClass('show')
            subscribe.removeClass('visible')
        }
        let timeOutId;
        if (!localStorage.getItem('is_shown_free_delivery_popup')) {
            const popUptime = setTimeout(showPopup, 5000)
            timeOutId = popUptime
        } else {
            clearTimeout(timeOutId)
        }
        subscribe.click((e) => { e.stopPropagation() })
        subBtn.click((e) => { closePopup() })
        opacity.click(closePopup)
    }

    /* Initialize
     * ------------------------------------------------------ */

    (function ssInit() {
        ssPreloader();
        ssAlertBoxes();
        ssSearch();
        owlCaruselInint();
        ssMobileMenu();
        ssMasonry();
        ssBricksAnimate();
        ssSlickSlider();
        ssSmoothScroll();
        ssAjaxChimp();
        ssBackToTop();
        openLink();
        metrica();
        eraseDefaultCity();
        showPopup();
    })();

})

    (jQuery);