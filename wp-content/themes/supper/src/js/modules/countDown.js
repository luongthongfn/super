window.onload = function () {
  /*Set the date we're counting down to*/
  $('.deal-countdown').each(function () {
    console.time('countdown')
    var _this = $(this);
    var thisDealTime = $(this).attr('data-deal-time'); /*lay moc thoi gian*/
    var countDownFrom = new Date(thisDealTime).getTime();
    /*Update the count down every 1 second*/
    var x = setInterval(function () {
      /*Get todays date and time*/
      var now = new Date().getTime();
      /*Find the distance between now an the count down date*/
      var distance = countDownFrom - now;
      /*Time calculations for days, hours, minutes and seconds*/
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 *
        60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      /*Output the result */
    //   _this.find('.day').find('.num').find('span').text(days);
    //   _this.find('.hour').find('.num').find('span').text(hours);
    //   _this.find('.min').find('.num').find('span').text(minutes);
    //   _this.find('.sec').find('.num').find('span').text(seconds);
      _this.find('.day .num span').text(days);
      _this.find('.hour .num span').text(hours);
      _this.find('.min .num span').text(minutes);
      _this.find('.sec .num span').text(seconds);
      if (distance < 0) {
        clearInterval(x);
      }
    }, 1000);
    console.timeEnd('countdown')
  })
}
