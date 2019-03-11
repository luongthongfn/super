(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

$(function () {
  var render = function () {
    var i = 0;
    return function () {
      i++;
      var template = "\n            <li id='item-".concat(i, "'>\n                <span class='delete'>&times;</span>\n                <input type='hidden' name='owl_slide[img][]' class='hidden_input_img'>\n                <label class='pickfile'>\n                    <input class='pick_img' type='button'>\n                </label>\n                <input type='hidden' name='owl_slide[thumb][]' class='hidden_input_thumb'>\n                <label class='pickthumb'>\n                    <input class='pick_thumb' type='button'>\n                </label>\n                <label>\n                    <span>Slide title</span>\n                    <input type='text' name='owl_slide[title][]'>\n                </label>\n                <label>\n                    <span>Slide Desc</span>\n                    <input type='text' name='owl_slide[desc][]'>\n                </label>\n                <label>\n                    <span>Slide link</span>\n                    <input type='text' name='owl_slide[link][]'>\n                </label>\n            </li>\n            ");
      $('.owl-list').append(template);
    };
  }();

  $('.add-item').click(render);
  $('.owl-list').on('click', '.delete', function () {
    $(this).parent().remove();
  });
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
    }); // Select images event

    file_frame.on('select', function () {
      var attachment = file_frame.state().get('selection').toJSON(),
          imgs_url = '',
          attachment_ids = [];
      $.each(attachment, function (index, item) {
        attachment_ids.push(item.id);
        imgs_url = item.url;
      });

      _this.parent().css('background-image', "url(".concat(imgs_url, ")"));

      setto.val(attachment_ids.join(','));
    });
    file_frame.open();
  });
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
    }); // Select images event

    file_frame.on('select', function () {
      var attachment = file_frame.state().get('selection').toJSON(),
          imgs_url = '',
          attachment_ids = [];
      $.each(attachment, function (index, item) {
        attachment_ids.push(item.id);
        imgs_url = item.url;
      });

      _this.parent().css('background-image', "url(".concat(imgs_url, ")"));

      setto.val(attachment_ids.join(','));
    });
    file_frame.open();
  });
});

},{}]},{},[1])

//# sourceMappingURL=../maps/adminSlideUpload.js.map
