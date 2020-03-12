/**
 * Tstarter Class
 *
 * ! todo Đăng ký tham số để config luôn hiện tại thì chưa 
 */
jQuery(function ($) {
    const $body = $(document.body),
        $window = $(window),
        $windowWidth = $(window).width();
        $windowHeight = $(window).height();
    var windowWidth = window.innerWidth;

    class Tstarter {

        constructor() {
            this.backToTop();
            this.cateMenuToggle();
            this.megaMenuPosition();
            this.slider();
            this.productsCarousel();
            this.itemsBannerCarousel();
            this.blogsCarousel();
            this.brandCarousel();
            this.miniCartToggle();
            this.fixedHeader();

            /**
             * Page Loader
             */
            $window.on("load", function () {
                setTimeout(function () {
                    $(".t-loader").hide();
                    $('html, body').css("overflow", 'visible');
                }, 1000);
            });
        }

        backToTop() {
            $window.on('scroll', function (e) {
                var button = $('.t-backtotop');

                if ($window.scrollTop() > 150 && $windowWidth > 767) {
                    button.fadeIn(400);
                } else {
                    button.fadeOut(400);
                }
            });

            $('.t-backtotop').click(function () {
                $('html,body').animate({
                    scrollTop: 0
                }, 600);
            });
        }


        cateMenuToggle() {
            var $cateList = $('.t-header__category-list');
            var $sideBar = $cateList.siblings();

            $cateList.on("click", function () {
                $sideBar.slideToggle('slow');
            });
        }

        megaMenuPosition() {
            var $megaDropdown = $('.t-menu__megamenu-inner');

            if ($megaDropdown.length === 0) {
                return;
            }

            for (let i = 0; i < $megaDropdown.length; i++) {
                var right = ($megaDropdown[i].getBoundingClientRect().width - (windowWidth - $megaDropdown[i].getBoundingClientRect().left)) > 0;

                if (right) {
                    $megaDropdown[i].style.cssText = "right: 50%; transform: translate(50%, 0)";
                }
            }
        }

        // ! truyền tham số vào để config trong redux framework
        slider() {
            var $slider = $(".t-slider");

            if ($slider.length === 0) {
                return;
            }

            $slider.slick({
                arrows: true,
                dots: false,
                autoplay: true,
                autoplaySpeed: 5000,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: "linear"
            });
        }

        productsCarousel() {
            var $productCarousel = $(".t-product-carousel__products");

            if ($productCarousel.length === 0) {
                return;
            }

            $productCarousel.owlCarousel({
                loop: true,
                items: 5,
                nav: true,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                navContainer: '.t-product-items .t-product-carousel__nav',
                navElement: 'div',
                dots: false,
                autoplay: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    770: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    },
                    1300: {
                        items: 5
                    }
                }
            });
        };

        itemsBannerCarousel() {
            var $itemsBannerCarousel = $(".t-banner-products__items");

            if ($itemsBannerCarousel === 0) {
                return;
            }

            $itemsBannerCarousel.owlCarousel({
                loop: true,
                items: 4,
                dots: false,
                nav: true,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                navContainer: '.t-banner-products .t-product-carousel__nav',
                navElement: 'div',
                autoplay: false,
                responsiveClass: true,
                margin: 5,
                responsive: {
                    0: {
                        items: 2
                    },
                    770: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    },
                    1300: {
                        items: 4
                    }
                }
            });
        }

        blogsCarousel() {
            var $blogsCarousel = $('.t-blog-items__blogs');

            if ($blogsCarousel.length === 0) {
                return;
            }

            $blogsCarousel.owlCarousel({
                loop: true,
                items: 4,
                dots: false,
                nav: true,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>'
                ],
                navContainer: '.t-blog-items .t-blog-carousel__nav',
                navElement: 'div',
                autoplay: false,
                responsiveClass: true,
                margin: 5,
                responsive: {
                    0: {
                        items: 2
                    },
                    770: {
                        items: 2
                    },
                    1000: {
                        items: 2
                    },
                    1300: {
                        items: 2
                    }
                }
            });
        }

        brandCarousel() {
            var $brandsCarousel = $(".t-brand-carousel__brands");

            if ($brandsCarousel.length === 0) {
                return;
            }

            $brandsCarousel.owlCarousel({
                loop: true,
                items: 4,
                dots: false,
                nav: false,
                autoplay: true,
                responsiveClass: true,
                margin: 5,
                responsive: {
                    0: {
                        items: 2
                    },
                    770: {
                        items: 2
                    },
                    1000: {
                        items: 2
                    },
                    1300: {
                        items: 6
                    }
                }
            });
        }

        miniCartToggle() {
            const $cartBtn = $('.t-header__my-cart');
            const $accountBtn = $('.t-header__account-link'); 

            $cartBtn.on("click", function () {
                $('.t-header__cart-dropdown').slideToggle('slow');
            });

            $accountBtn.on("click", function () {
                $('.t-header__account-dropdown').slideToggle('slow');
            });

        }

        fixedHeader() {
            if ( $windowWidth > 768 ) {
                
                var $headerNavTop = $('.t-header__top');
                var $headerNavBottom = $('.t-header__bottom');

                if ( $body.is( '.t-header--sticky-top' )  ) {
                    console.log('sticky-top');
                }

                if ( $body.is( '.t-header--sticky-bottom' )  ) {
                    
                    var toolbarOffset  = $body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0;
                    var mastheadOffsetBottom = $( '.t-header__bottom' ).offset().top - toolbarOffset;

                    $window.on( 'scroll', function() {

                        if ( ( window.scrollY > mastheadOffsetBottom ) ) {
                            $headerNavBottom.addClass( 't-header__bottom--fixed' );
                        } else {
                            $headerNavBottom.removeClass( 't-header__bottom--fixed' );
                        }
                    } );
                }

                if ( $body.is( '.t-header--sticky-top' )  ) {
                    
                    var toolbarOffset  = $body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0;
                    var mastheadOffsetTop = $( '.t-header__top' ).offset().top - toolbarOffset;

                    $window.on( 'scroll', function() {

                        if ( ( window.scrollY > mastheadOffsetTop ) ) {
                            $headerNavTop.addClass( 't-header__top--fixed' );
                        } else {
                            $headerNavTop.removeClass( 't-header__top--fixed' );
                        }
                    } );
                }


            }
        }
    }

    new Tstarter();
});
