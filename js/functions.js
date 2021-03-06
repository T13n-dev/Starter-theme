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
    var $termSearch = false;

    class Tstarter {
        constructor() {
            this.backToTop();
            this.cateMenuToggle();
            this.megaMenuPosition();
            this.miniCartToggle();
            this.fixedHeader();
            this.megaSearch(); // ! main search theme
            // Carousel
            this.slider();
            this.productsCarousel();
            this.itemsBannerCarousel();
            this.itemsBannerCarouselSecondary();
            this.blogsCarousel();
            this.brandCarousel();
            this.thumbsCarousel();
            this.relatedCarousel();
            // Product
            this.minus_plus_product_qty();

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

        getTermsearch() {
            return this.$termSearch;
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

        /**
         * Search Ajax 
         * 
         * @version 1.0.0
         */
        megaSearch() {
            if ( $('.t-search__category').length == 0 ) return;

            // Handler click on cate list
            $('.t-search__select-box').on('click', function(e) {
                e.preventDefault();

                $('.t-search__dropdown').toggleClass('t-search__dropdown-display');
            });
            $('.t-search__dropdown li').on('click', function() {
                var data_slug = $( this ).find('a').data('slug');
                var data_name = $( this ).find('a').html();

                $('.t-search__label').html( data_name );
                $('#t_product_cat').val( data_slug );

                $('.t-search__dropdown').removeClass('t-search__dropdown-display');

                // Handle Cate to do search againt when search field has word
                if ( Helper.lengthSearch( $('.t-search__field').val() ) ) {
                    $termSearch = true;
                    Tstarter.doSearch();
                }
            });
      
            // Checking if mouse click out cate list or seacrh results
            $body.mouseup( function(e) {
                e.preventDefault();
                
                if( !$('.t-search__category').is(e.target) && $('.t-search__category').has(e.target).length === 0 ) {
                    if( $('.t-search__dropdown').hasClass('t-search__dropdown-display') ) {
                        $('.t-search__dropdown').removeClass('t-search__dropdown-display');
                    }
                }

                if( !$('.t-search__results').is(e.target) && $('.t-search__results').has(e.target).length === 0 ) {
                    if( $('.t-search__results-list').length !==  0 ) {
                        $('.t-search__results').empty();
                    }
                }
            });


            // Appending div for search group 
            $('.t-search__group').append('<div class="t-search__results"></div>');

            $('.t-search__field').on( 'keyup', Helper.debounce(() => {
                if (  Helper.lengthSearch( $('.t-search__field').val() ) ) {
                    $termSearch = true;
                    Tstarter.doSearch();
                } else {
                    $('.t-search__results').empty();    
                    $termSearch = false;
                }
            }, 500));       
        }

        static doSearch() {
            let query = $('.t-search__field').val();
            let slug = $('#t_product_cat').val();

            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: {
                    action: 'ajax_search',
                    query: query,
                    slug: slug
                },
                success: function( result ) {
                    if( $termSearch ) {
                        $('.t-search__results').html( result );
                    }
                },
                beforeSend: function() {
                    $('.t-search__button > button').addClass('loading');  
                },
                complete: function() {
                    $('.t-search__button > button').removeClass('loading');
                }
            });
        }
        
        // ! Truyền tham số vào để config trong redux framework
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
                    768: {
                        items: 3
                    },
                    992: {
                        items: 4
                    },
                    1200: {
                        items: 5
                    }
                }
            });
        };

        itemsBannerCarousel() {
            let $itemsBannerCarousel = $(".t-banner-products__items");

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
                    768: {
                        items: 2
                    },
                    992: {
                        items: 2
                    },
                    1200: {
                        items: 4
                    }
                }
            });
        }

        itemsBannerCarouselSecondary() {
            let $itemsBannerCarousel = $(".t-banner-products-secondary__items");

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
                navContainer: '.t-banner-products-secondary .t-product-carousel__nav',
                navElement: 'div',
                autoplay: false,
                responsiveClass: true,
                margin: 5,
                responsive: {
                    0: {
                        items: 2
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 2
                    },
                    1200: {
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
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    992: {
                        items: 2
                    },
                    1200: {
                        items: 2
                    }
                }
            });
        }

        brandCarousel() {
            let $brandsCarousel = $(".t-brand-carousel__brands");

            if ($brandsCarousel.length === 0)  return;

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
                        items: 3
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 4
                    },
                    1200: {
                        items: 6
                    }
                }
            });
        }

        thumbsCarousel() {
            $('.product .flex-control-thumbs').addClass('owl-carousel owl-theme');
            $('.product .flex-control-thumbs').owlCarousel({
                loop: true,
                items: 3,
                dots: false,
                nav: true,
                margin: 15,
                responsive: {
                    320: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    991: {
                        items: 3
                    },
                    1299: {
                        items: 3
                    }
                }
            });
        }

        relatedCarousel() {
            const $relatedCarousel = $(".t-single__related-items");

            if ($relatedCarousel.length === 0)  return;
            $relatedCarousel.owlCarousel({
                loop: false,
                items: 5,
                dots: false,
                nav: true,
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
                        items: 5
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

        /**
         * Minus and bonus product quantity
         */
        minus_plus_product_qty() {
            $('.t-single__quantity').on('click', '.t-single__quantity--minus', function (e) {
                var qty  = $(this).parent().find('input.t-single__quantity--total');
                var val  = parseInt(qty.val());
                var step = qty.attr('step');
                step     = 'undefined' !== typeof(step) ? parseInt(step) : 1;
                if (val > 0) {
                    qty.val(val - step).change();
                }
            });
            $('.t-single__quantity').on('click', '.t-single__quantity--plus', function (e) {
                var qty  = $(this).parent().find('input.t-single__quantity--total');
                var val  = parseInt(qty.val());
                var step = qty.attr('step');
                step     = 'undefined' !== typeof(step) ? parseInt(step) : 1;
                qty.val(val + step).change();
            });
        }
    }

    class Helper {
        // Limiting the rate at function can fire
        // https://davidwalsh.name/javascript-debounce-function
     
        static debounce(callback, wait) {
            let timeout;
            return (...args) => {
                const context = this;
                clearTimeout(timeout);
                timeout = setTimeout(() => callback.apply(context, args), wait);
            };
        }

        static lengthSearch( val ) {
            let minLength = 2;
            if ( val.length > minLength ) return true;
            return false;
        }
    }

    new Tstarter();
});

