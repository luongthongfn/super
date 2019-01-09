$(function() {
  var html = $('html, body'),
      navContainer = $('.nav-container'),
      navToggle = $('.nav-toggle'),
      navDropdownToggle = $('.has-dropdown');


  // Nav toggle
  navToggle.on('click', function(e) {
      var $this = $(this);
      e.preventDefault();
      $this.toggleClass('is-active');
      navContainer.toggleClass('is-visible');
      html.toggleClass('nav-open');
  });

  // Nav dropdown toggle
  navDropdownToggle.on('click', function() {
      var $this = $(this);
      $this.toggleClass('is-active').children('ul').toggleClass('is-visible');
  });

  // Prevent click events from firing on children of navDropdownToggle
  navDropdownToggle.on('click', '*', function(e) {
      e.stopPropagation();
  });


});

$(function () {
  // search dropdown button
  $('.drop-button, .dropdown-content .close').click(function (e) {
      e.preventDefault();
      $(this).parents('.search-drop').find('.dropdown-content').toggleClass('visible')
  })
  $(document).click(function (event) {
      // Check if clicked outside target
      if (!($(event.target).closest(".search-drop").length)) {
          // Hide target
          $(".dropdown-content").removeClass('visible');
      }
  });
})

$(function () {
  //----dropdown-multi-lv-menu
  $('.dropdown').click(function (e) {
      var thiss = $(this);
      thiss.toggleClass('is-active');
  });
  $('.dropdown.nested').on('click', '*', function (e) {
      e.stopPropagation();
  });

  //----sticky-header
  if ($('.sticky-header').length) {
      var _this = $('.sticky-header');
      _this.after("<div class='after-fixed'></div>");
      var stickyPos = _this.offset().top;
      $('.after-fixed').css('padding-top', $('.fixed').height());

      $(window).scroll(function () {
          if (window.innerWidth > 992) {
              if ($(window).scrollTop() >= stickyPos) {
                  _this.addClass('fixed');
                  $('.after-fixed').css('padding-top', $('.fixed').height());
              } else {
                  _this.removeClass('fixed');
                  $('.after-fixed').css('padding-top', '0px');
              }
          } else {
              _this.removeClass('fixed');
              $('.after-fixed').css('padding-top', '0px');
          }
      })
  }
})

// search-box


$(function () {
  $(document).ready(function (e) {
      $('.search-panel .dropdown-select').find('a').click(function (e) {
          e.preventDefault();
          var param = $(this).attr("href").replace("#", "");
          var concept = $(this).text();
          $('.search-panel span#search_concept-top').text(concept);
          $('.input-group #search_param').val(param);
      });
  });
  $(document).ready(function (e) {
      $('.search-panel .dropdown-menu').find('a').click(function (e) {
          e.preventDefault();
          var param = $(this).attr("href").replace("#", "");
          var concept = $(this).text();
          $('.search-panel span#search_concept').text(concept);
          $('.input-group #search_param').val(param);
      });
  });
})
