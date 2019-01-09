import owlCarousel from "owl.carousel2";
$(() => {
  $('.owl-dot').hover(function () {
    $('.slider_main').trigger('to.owl.carousel', [$(this).index(), 500]);
  }, );
  $(".slider_main").owlCarousel({
    items: 1,
    responsive: {
      1200: {
        item: 1
      }, // breakpoint from 1200 up
      982: {
        items: 1
      },
      768: {
        items: 1
      },
      480: {
        items: 1
      },
      0: {
        items: 1,
        nav: false
      }
    },
    slideBy: 1,
    loop: true,
    rewind: false,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    smartSpeed: 500, //slide speed smooth
    dots: true,
    dotsEach: true,
    dotsContainer: '#main-custom-dots',
    nav: true,
    navText: ['‹', '›'],
    // navText: ['<img src="img/but-p.png"/>', '<img src="img/but-n.png"/>'],
    // navText: ['<i class="fa fa-chevron-left"><i/>', '<i class="fa fa-chevron-right"><i/>'],
    // navSpeed: 250, //slide speed when click button
    autoWidth: false,
    margin: 0,
    lazyContent: false,
    lazyLoad: false,
    // animateIn: ['flipInX', 'flipInY', 'zoomIn', 'slideInDown', 'bounceIn', 'faderIn'],
    // animateOut: ['flipOutX', 'flipOutY', 'zoomOut', 'slideOutDown', 'bounceOut', 'faderOut'],
    animateIn: '',
    animateOut: '',
    center: false,
    URLhashListener: false,
    video: false,
    videoHeight: false,
    videoWidth: false,
  });

  $('.slider_prod_hot').owlCarousel({
    items: 4,
    responsive: {
      1200: {
        item: 4
      },
      982: {
        items: 3
      },
      768: {
        items: 3
      },
      480: {
        items: 2
      },
      0: {
        items: 1,
        nav: false
      }
    },
    slideBy: 1,
    loop: true,
    rewind: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    smartSpeed: 500,
    dots: false,
    dotsEach: false,
    nav: true,
    navText: ['‹', '›'],
    // navText: ['<img src="img/but-p.png"/>', '<img src="img/but-n.png"/>'],
    /*navText: ['<i class="fa fa-chevron-left"><i/>', '<i class="fa fa-chevron-right"><i/>'],*/
    /*navSpeed: 250, */
    autoWidth: false,
    margin: 0,
    stagePadding: 0,
    lazyContent: false,
    lazyLoad: false,
    animateIn: false,
    animateOut: false,
    center: false,
    URLhashListener: false,
    video: false,
    videoHeight: false,
    videoWidth: false,
  });

  $('.slider_deal').owlCarousel({
    items: 5,
    responsive: {
      1200: {
        item: 5
      },
      982: {
        items: 4
      },
      768: {
        items: 3
      },
      480: {
        items: 2
      },
      0: {
        items: 1,
        nav: false
      }
    },
    slideBy: 1,
    loop: false,
    rewind: true,
    center: false,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    smartSpeed: 500,
    dots: false,
    dotsEach: false,
    nav: true,
    navText: ['‹', '›'],
    // navText: ['<img src="img/but-p.png"/>', '<img src="img/but-n.png"/>'],
    /*navText: ['<i class="fa fa-chevron-left"><i/>', '<i class="fa fa-chevron-right"><i/>'],*/
    /*navSpeed: 250, */
    autoWidth: false,
    margin: 0,
    stagePadding: 1,
    lazyContent: false,
    lazyLoad: false,
    animateIn: false,
    animateOut: false,
    URLhashListener: false,
    video: false,
    videoHeight: false,
    videoWidth: false,
  });
  $('.slider_news').owlCarousel({
    items: 4,
    responsive: {
      1200: {
        item: 4
      },
      982: {
        items: 3
      },
      768: {
        items: 3
      },
      480: {
        items: 2
      },
      0: {
        items: 1,
        nav: false
      }
    },
    slideBy: 1,
    loop: true,
    rewind: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    smartSpeed: 500,
    dots: false,
    dotsEach: false,
    nav: true,
    navText: ['‹', '›'],
    // navText: ['<img src="img/but-p.png"/>', '<img src="img/but-n.png"/>'],
    /*navText: ['<i class="fa fa-chevron-left"><i/>', '<i class="fa fa-chevron-right"><i/>'],*/
    /*navSpeed: 250, */
    autoWidth: false,
    margin: 10,
    stagePadding: 1,
    center: false,
    lazyContent: false,
    lazyLoad: false,
    animateIn: false,
    animateOut: false,
    URLhashListener: false,
    video: false,
    videoHeight: false,
    videoWidth: false,
  });
})
