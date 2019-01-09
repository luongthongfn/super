$(window).on('load', function () {
  function Render_img() {
    'use strict';
    if ($('.imgRow').length) {
      console.log('row')
      $(".reRenderImg img").css('height', 'auto');
      $(".imgRow").each(function () {
        var thisRow,
          imgs,
          w,
          h,
          ratio;

        thisRow = $(this);
        imgs = thisRow.find(".reRenderImg img");

        w = imgs.width();
        h = imgs.height();
        ratio = h / w;

        imgs.height(Math.ceil(ratio * parseInt(w)));
      });
    }
  }

  var t;

  function debounce_render() {
    clearTimeout(t);
    t = setTimeout(Render_img, 100);
  }

  $(function () {
    debounce_render();

    var url = window.location.href;
    // $('.menu-item  a').parent().removeClass('active');
    $('.menu-item  a[href="' + url + '"]').parent().addClass('active');
  });

  $(window).resize(function () {
    debounce_render();
  });

})
