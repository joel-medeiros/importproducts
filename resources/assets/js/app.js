
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function ($) {

  $.default = {
    /**
     * Generates an string random
     * @returns {string}
     */
    guide: function () {
      return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
    }
  };

  $.alert = {

    show: function(type, message, source){
      var
          html = [],
          id = $.default.guide(),
          alert = $(document).find("div#alert_content:first");

      if(source) {
        alert = $(source).hasClass('alert') ? $(source) : $(source).parents("div").find("div#alert_content:first-child");
      }

      html.push("<div id='" + id + "' class='alert " + type + " fade'>");
      html.push("  <a class='close' data-dismiss='alert' href='#'>×</a>");
      html.push("  <span class='alert-icon fa'></span>");
      html.push("  <span class='alert-content'>" + message + "</span>");
      html.push("</div>");
      alert.html(html.join(''));

      alertContent = $('#' + id);

      $('html, body').animate({scrollTop: alertContent.offset().top - '100px'}, 100);

      alertContent.delay(200).fadeIn("slow", function () {
        $(this).addClass('in');
      });
    },

    close: function (source) {
      if (source) {
        var alert = ($(source).hasClass('alert')) ? $(source) : $(source).parents("div").find("div#alert_content:first-child");
        if (alert) {
          alert.html('');
        }
      }

      $("div.alert").not(".alert-static").remove();
    },

    formValidateResponse: function(messageGroup, source){
      var messages = [];
      messages.push("<ul>");

      $.each(messageGroup, function(index, message){
        messages.push('<li>' + message + '</li>');
      });
      messages.push("</ul>");

      $.alert.show('alert-warning', messages.join(""), source);
    }
  };

  $.modal = {

    /**
     * Returns the modal element
     * @param id
     * @returns {*|jQuery|HTMLElement}
     */
    get: function(id){
      return $("#" + id);
    },

    load: {

      /**
       * create a new modal area
       * @param id
       * @param size
       * @returns {*|jQuery|HTMLElement}
       */
      area: function(id, size) {

        if(!id) id = $.default.guide();

        return $('<div class="modal fade" tabindex="-1" role="dialog" id="' + id + '">' +
            '<div class="modal-dialog" role="document">' +
            '</div>' +
            '</div>')
      },

      /**
       * load data inside a modal
       * @param route
       * @param source
       * @param id
       * @returns string
       */
      show: function (route, source, id) {

        if(!source) source = 'body';

        $.modal.load.area(id)
            .find('.modal-dialog')
            .html('') // clear
            .load(route, function () {
              $(this).parent().modal('show');
            })
            .appendTo(source);

        return id;
      },

      /**
       * close an oppened modal
       * @param id
       */
      close: function(id){
        $.modal.get(id).modal('destroy');
      }
    }

  };

  $.loading = {

    content: '<div class="loading-area"><div class="bg-loader"></div><div class="loader"></div></div>',

    show: function(){
      $('body').prepend($.loading.content);

    },
    close: function(){
      $(".loading-area").fadeOut().remove()
    }

  };

});