jQuery(function($) {
  // var bodyWidth = document.body.clientWidth;

  // $('.wrap-t-slider').css('width', bodyWidth);

  // $( window ).resize(function () {
  //   var bodyWidth = document.body.clientWidth;
  //   $('.wrap-t-slider').css('width', bodyWidth);
  // });
  $(".t-slider").slick({
    arrows: true,
    dots: false,
    autoplay: true,
    autoplaySpeed: 5000,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: "linear"
  });

  $(".t-product-carousel__products").owlCarousel({
    loop: true,
    items: 5,
    dots: false,
    nav: false,
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

  $(".t-banner-products__items").owlCarousel({
    loop: true,
    items: 4,
    dots: false,
    nav: false,
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
  
});
