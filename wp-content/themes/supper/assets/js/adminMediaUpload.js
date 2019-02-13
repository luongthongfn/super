(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

jQuery(document).ready(function ($) {
  /*
  We have a button which has id attribute "pick_images"
  When click the button, the wp media popup show. We choose images and press Select (like set featured image)
  */
  //feature media upload
  var attachment_feature_ids = [];
  $('#pick_feature').click(function (event) {
    event.preventDefault(); // Prevent reload page when click the button
    // Initialize.

    var file_frame = wp.media.frames.file_frame = wp.media({
      title: 'Select Images',
      // The title of frame
      library: {},
      // Library of images, like as post
      button: {
        text: 'Select'
      },
      multiple: false // Enable select multiple

    });
    /*
     * Select images if it is selected, after you click button "pick_images" again
     */

    file_frame.on('open', function () {
      var images = $('#feature_input').val();
      images = images.split(','); // Get all images id and split to an array
      // And select it

      var selection = file_frame.state().get('selection');
      $.each(images, function (index, el) {
        var attachment = wp.media.attachment(el);
        !!attachment ? attachment.fetch() : null;
        selection.add(attachment ? [attachment] : []);
      });
    }); // Select images event

    file_frame.on('select', function () {
      var attachment = file_frame.state().get('selection').toJSON(),
          imgs_html = ''; // Each selected image, push the id of image to an array and show image

      $.each(attachment, function (index, item) {
        attachment_feature_ids.push(item.id);
        imgs_html += '<li data-image-id="' + item.id + '">';
        imgs_html += '<img src="' + item.url + '" />';
        imgs_html += '<span class="dashicons dashicons-dismiss" data-id=' + item.id + '></span>'; // Button to remove image

        imgs_html += '</li>';
      });
      $('#feature_input').val(attachment_feature_ids.join(',')); // List of all images

      $('#display_feature').html(imgs_html); // Show images
    });
    $('#display_feature').on('click', '.dashicons-dismiss', function () {
      var id = $(this).data('id');
      attachment_feature_ids = attachment_feature_ids.filter(function (item) {
        return item != id;
      });
      $('#feature_input').val(attachment_feature_ids.join(','));
      $(this).parent('li').remove();
    }); // Open media popup

    file_frame.open();
  }); //icon media upload

  var attachment_icon_ids = [];
  $('#pick_icon').click(function (event) {
    event.preventDefault(); // Prevent reload page when click the button
    // Initialize.

    var file_frame = wp.media.frames.file_frame = wp.media({
      title: 'Select Images',
      // The title of frame
      library: {},
      // Library of images, like as post
      button: {
        text: 'Select'
      },
      multiple: false // Enable select multiple

    });
    /*
     * Select images if it is selected, after you click button "pick_images" again
     */

    file_frame.on('open', function () {
      var images = $('#icon_input').val();
      images = images.split(','); // Get all images id and split to an array
      // And select it

      var selection = file_frame.state().get('selection');
      $.each(images, function (index, el) {
        var attachment = wp.media.attachment(el);
        !!attachment ? attachment.fetch() : null;
        selection.add(attachment ? [attachment] : []);
      });
    }); // Select images event

    file_frame.on('select', function () {
      var attachment = file_frame.state().get('selection').toJSON(),
          imgs_html = ''; // Each selected image, push the id of image to an array and show image

      $.each(attachment, function (index, item) {
        attachment_icon_ids.push(item.id);
        imgs_html += '<li data-image-id="' + item.id + '">';
        imgs_html += '<img src="' + item.url + '" />';
        imgs_html += '<span class="dashicons dashicons-dismiss" data-id=' + item.id + '></span>'; // Button to remove image

        imgs_html += '</li>';
      });
      $('#icon_input').val(attachment_icon_ids.join(',')); // List of all images

      $('#display_icon').html(imgs_html); // Show images
    });
    $('#display_icon').on('click', '.dashicons-dismiss', function () {
      var id = $(this).data('id');
      attachment_icon_ids = attachment_icon_ids.filter(function (item) {
        return item != id;
      });
      $('#icon_input').val(attachment_icon_ids.join(','));
      $(this).parent('li').remove();
    }); // Open media popup

    file_frame.open();
  });
});

},{}]},{},[1])

//# sourceMappingURL=../maps/adminMediaUpload.js.map
