window.onload = function () {
    /*Set the date we're counting down to*/
    $('.deal-countdown').each(function () {
        // console.time('countdown')
        var _this = $(this);
        var thisDealTime = $(this).attr('data-deal-time'); /*lay moc thoi gian*/
        var countDownFrom = new Date(thisDealTime).getTime();
        // console.log('deal from:', countDownFrom)
        /*Update the count down every 1 second*/
        var render = setInterval(function () {
            /*Get todays date and time*/
            var now = new Date().getTime(),
                distance, days, hours, minutes, seconds;

            /*Find the distance between now an the count down date*/
            distance = countDownFrom - now;
            /*Time calculations for days, hours, minutes and seconds*/
            if (distance > 0) {
                days = Math.floor(distance / (1000 * 60 * 60 * 24));
                hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 *
                    60 * 60));
                minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                seconds = Math.floor((distance % (1000 * 60)) / 1000);
            } else {
                days = hours = minutes = seconds = 0;
            }

            /*Output the result */
            _this.find('.day .num span').text(days);
            _this.find('.hour .num span').text(hours);
            _this.find('.min .num span').text(minutes);
            _this.find('.sec .num span').text(seconds);

            //stop when <= 0
            if (distance <= 0) {
                clearInterval(render);
            }
        }, 1000);
        // console.timeEnd('countdown')
    })
}
