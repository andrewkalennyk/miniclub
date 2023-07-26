AOS.init({
    duration: 800,
    easing: 'slide'
});

(function ($) {

    "use strict";

    var isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function () {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };


    $(window).stellar({
        responsive: true,
        parallaxBackgrounds: true,
        parallaxElements: true,
        horizontalScrolling: false,
        hideDistantElements: false,
        scrollProperty: 'scroll'
    });


    var fullHeight = function () {

        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function () {
            $('.js-fullheight').css('height', $(window).height());
        });

    };
    fullHeight();

    // loader
    var loader = function () {
        setTimeout(function () {
            if ($('#ftco-loader').length > 0) {
                $('#ftco-loader').removeClass('show');
            }
        }, 1);
    };
    loader();

    // Scrollax
    $.Scrollax();

    var carousel = function () {
        $('.carousel-car').owlCarousel({
            center: false,
            loop: true,
            autoplay: true,
            items: 1,
            margin: 30,
            stagePadding: 0,
            startPosition: 0,
            nav: false,
            navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
        $('.carousel-testimony').owlCarousel({
            center: true,
            loop: true,
            items: 1,
            margin: 30,
            stagePadding: 0,
            nav: false,
            navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
        $('.carousel-local-club').owlCarousel({
            loop: true,
            items: 5,
            infinite:true,
            nav: false,
            autoplayTimeout:4000,
            startPosition: 1,
            autoplay: false,
            navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 5
                }
            }
        });

    };
    carousel();

    $('nav .dropdown').hover(function () {
        var $this = $(this);
        // 	 timer;
        // clearTimeout(timer);
        $this.addClass('show');
        $this.find('> a').attr('aria-expanded', true);
        // $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
        $this.find('.dropdown-menu').addClass('show');
    }, function () {
        var $this = $(this);
        // timer;
        // timer = setTimeout(function(){
        $this.removeClass('show');
        $this.find('> a').attr('aria-expanded', false);
        // $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
        $this.find('.dropdown-menu').removeClass('show');
        // }, 100);
    });


    $('#dropdown04').on('show.bs.dropdown', function () {
    });

    // scroll
    var scrollWindow = function () {
        $(window).scroll(function () {
            var $w = $(this),
                st = $w.scrollTop(),
                navbar = $('.ftco_navbar'),
                sd = $('.js-scroll-wrap');

            if (st > 150) {
                if (!navbar.hasClass('scrolled')) {
                    navbar.addClass('scrolled');
                }
                LogoChanger.showDark();
            }
            if (st < 150) {
                if (navbar.hasClass('scrolled')) {
                    navbar.removeClass('scrolled sleep');
                }
                LogoChanger.showWhite();
            }
            if (st > 350) {
                if (!navbar.hasClass('awake')) {
                    navbar.addClass('awake');
                }

                if (sd.length > 0) {
                    sd.addClass('sleep');
                }
            }
            if (st < 350) {
                if (navbar.hasClass('awake')) {
                    navbar.removeClass('awake');
                    navbar.addClass('sleep');
                }
                if (sd.length > 0) {
                    sd.removeClass('sleep');
                }
            }
        });
    };
    scrollWindow();

    var LogoChanger = {
        lw : $('#logo-w'),
        ld : $('#log-d'),
        showWhite: function () {
            LogoChanger.ld.hide();
            LogoChanger.lw.show();
        },
        showDark: function () {
            LogoChanger.ld.show();
            LogoChanger.lw.hide();
        }
    };


    var isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function () {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    var counter = function () {

        $('#section-counter, .hero-wrap, .ftco-counter').waypoint(function (direction) {

            if (direction === 'down' && !$(this.element).hasClass('ftco-animated')) {

                var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
                $('.number').each(function () {
                    var $this = $(this),
                        num = $this.data('number');
                    $this.animateNumber(
                        {
                            number: num,
                            numberStep: comma_separator_number_step
                        }, 7000
                    );
                });

            }

        }, {offset: '95%'});

    }
    counter();


    var contentWayPoint = function () {
        var i = 0;
        $('.ftco-animate').waypoint(function (direction) {

            if (direction === 'down' && !$(this.element).hasClass('ftco-animated')) {

                i++;

                $(this.element).addClass('item-animate');
                setTimeout(function () {

                    $('body .ftco-animate.item-animate').each(function (k) {
                        var el = $(this);
                        setTimeout(function () {
                            var effect = el.data('animate-effect');
                            if (effect === 'fadeIn') {
                                el.addClass('fadeIn ftco-animated');
                            } else if (effect === 'fadeInLeft') {
                                el.addClass('fadeInLeft ftco-animated');
                            } else if (effect === 'fadeInRight') {
                                el.addClass('fadeInRight ftco-animated');
                            } else {
                                el.addClass('fadeInUp ftco-animated');
                            }
                            el.removeClass('item-animate');
                        }, k * 50, 'easeInOutExpo');
                    });

                }, 100);

            }

        }, {offset: '95%'});
    };
    contentWayPoint();


    // navigation
    var OnePageNav = function () {
        $(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function (e) {
            e.preventDefault();

            var hash = this.hash,
                navToggler = $('.navbar-toggler');
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 700, 'easeInOutExpo', function () {
                window.location.hash = hash;
            });


            if (navToggler.is(':visible')) {
                navToggler.click();
            }
        });
        $('body').on('activate.bs.scrollspy', function () {
            console.log('nice');
        })
    };
    OnePageNav();


    // magnific popup
    $('.image-popup').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
        }
    });

    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });


    $('#book_pick_date,#book_off_date').datepicker({
        'format': 'm/d/yyyy',
        'autoclose': true
    });
    $('#time_pick').timepicker();

    $(".scroll-to").click(function(e) {
        e.preventDefault();
        let target = $(this).data('scroll');
        if (target) {
            window.console.log($("."+ target).offset().top);
            $([document.documentElement, document.body]).animate({
                scrollTop: $("."+ target).offset().top - $(".ftco_navbar").outerHeight()
            }, 1000);
        }
    });

    $(document).on("click", '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    /*document.addEventListener("DOMContentLoaded", function () {
        var languageDropdown = document.getElementById("languageDropdown");
        languageDropdown.addEventListener("touchstart", function (e) {
            e.preventDefault();
            $(this).dropdown("toggle");
        });
    });*/


})(jQuery);

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

