//----sticky-header
$(function () {
    if ($('.sticky-header').length) {
        var _this = $('.sticky-header'),
            adminbar = $('body.admin-bar'),
            stickyPos = _this.offset().top,
            afterFixed = $('.js-after-fixed');

        _this.after("<div class='after-fixed'></div>");
        $('.after-fixed').css('padding-top', $('.fixed').height());
        console.log('stickypos', stickyPos)
        stickyPos = adminbar.length ? stickyPos - 32: stickyPos;
        console.log('stickypos', stickyPos)
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



        // _this.after(afterFixed);
        if (afterFixed) {
            afterFixed.css('padding-top', $('.fixed').height());
        }
    }
})
