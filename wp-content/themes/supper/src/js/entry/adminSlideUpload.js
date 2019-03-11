$(function () {
    var render = (function () {
        var i = 0;
        return function () {
            i++;
            var template = `
            <li id='item-${i}'>
                <span class='delete'>&times;</span>
                <input type='hidden' name='owl_slide[img][]' class='hidden_input_img'>
                <label class='pickfile'>
                    <input class='pick_img' type='button'>
                </label>
                <input type='hidden' name='owl_slide[thumb][]' class='hidden_input_thumb'>
                <label class='pickthumb'>
                    <input class='pick_thumb' type='button'>
                </label>
                <label>
                    <span>Slide title</span>
                    <input type='text' name='owl_slide[title][]'>
                </label>
                <label>
                    <span>Slide Desc</span>
                    <input type='text' name='owl_slide[desc][]'>
                </label>
                <label>
                    <span>Slide link</span>
                    <input type='text' name='owl_slide[link][]'>
                </label>
            </li>
            `;
            $('.owl-list').append(template);
        }
    })()
    $('.add-item').click(render);
    $('.owl-list').on('click', '.delete', function () {
        $(this).parent().remove()
    })


    $('.owl-list').on('click', '.pick_img', function (event) {
        var _this = $(this),
            setto = $(this).parents('li').find('.hidden_input_img');

        event.preventDefault();

        if (file_frame) {
            file_frame.open();
            return;
        }

        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select Images',
            library: {},
            button: {
                text: 'Select slide img'
            },
            multiple: false
        });

        /*
         * Select images if it is selected, after you click button "pick_images" again
         */
        file_frame.on('open', function () {
            var prev_img_id = setto.val(),
                prev_img_id = prev_img_id.split(','),
                selection = file_frame.state().get('selection');

            $.each(prev_img_id, function (index, el) {
                var attachment = wp.media.attachment(el);
                !!attachment ? attachment.fetch() : null;
                selection.add(attachment ? [attachment] : []);
            });

        });

        // Select images event
        file_frame.on('select', function () {
            var attachment = file_frame.state().get('selection').toJSON(),
                imgs_url = '',
                attachment_ids = [];

            $.each(attachment, function (index, item) {
                attachment_ids.push(item.id);
                imgs_url = item.url;
            });
            _this.parent().css('background-image', `url(${imgs_url})`)
            setto.val(attachment_ids.join(','))

        });
        file_frame.open();
    })
    $('.owl-list').on('click', '.pick_thumb', function (event) {
        var _this = $(this),
            setto = $(this).parents('li').find('.hidden_input_thumb');

        event.preventDefault();

        if (file_frame) {
            file_frame.open();
            return;
        }

        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select Images',
            library: {},
            button: {
                text: 'Select slide thumb'
            },
            multiple: false
        });

        /*
         * Select images if it is selected, after you click button "pick_images" again
         */
        file_frame.on('open', function () {
            var prev_img_id = setto.val(),
                prev_img_id = prev_img_id.split(','),
                selection = file_frame.state().get('selection');

            $.each(prev_img_id, function (index, el) {
                var attachment = wp.media.attachment(el);
                !!attachment ? attachment.fetch() : null;
                selection.add(attachment ? [attachment] : []);
            });

        });

        // Select images event
        file_frame.on('select', function () {
            var attachment = file_frame.state().get('selection').toJSON(),
                imgs_url = '',
                attachment_ids = [];

            $.each(attachment, function (index, item) {
                attachment_ids.push(item.id);
                imgs_url = item.url;
            });
            _this.parent().css('background-image', `url(${imgs_url})`)
            setto.val(attachment_ids.join(','))

        });
        file_frame.open();
    })


})
