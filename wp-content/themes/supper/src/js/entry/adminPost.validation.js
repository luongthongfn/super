import validate from 'jquery-validation';
// console.log('run validate')

$(function () {
    var post = $('#post');
    if (post.length) {
        post.validate({
            focusInvalid: true,
            rules: {
                //key is name of input
                price: "required"
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("has-error");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("has-error")
            }
        })

        var checkbox = $('#flashsale');
        function flashsaleCheck() {

            if ( $(this).is(':checked') ) {
                $('#check-flashsale').show();
            } else {
                $('#check-flashsale').hide();
            }
        }

        flashsaleCheck.apply(checkbox);

        checkbox.change(flashsaleCheck)
    }
})
