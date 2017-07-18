/**
 * Created by joel on 01/07/17.
 */
$.products = {

  index: {
    init: function () {

      $("button.show-modal").on("click", function () {
        var route = $(this).data('route');
        $.modal.load.show(route, 'modal-sm');
      });

      $("button.toggle").on("click", function(e){
        var
            message = $(this).data('message'),
            route = $(this).data('route'),
            method = $(this).data('method');

        bootbox.confirm(message,
            function(result){
              if(result) {

                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

                $.ajax({
                  url: route,
                  type: method
                })
                    .done(function (response) {
                      $.alert.show('alert-success', response.message);

                      setTimeout(function () {
                        window.location.reload();
                      }, 2000);

                    })
                    .fail(function (response) {
                      $.alert.show('alert-danger', response.responseJSON.message);
                    })
                    .always(function () {
                      $.loading.close();
                    })
                ;
              }
            });
      });

      $("input[type='file']#import-products").on("change", function(){
          $(this).parents('form').submit();
      });
    }
  },

  form: {

    /**
     * form events
     * @param form
     */
    init: function(form, disableAll){

      form.on("submit", function(e){
        e.preventDefault();

        $.loading.show();

        $.post(form.attr('action'), form.serialize())
            .done(function(response){
              form.find('input').attr('disabled', 'disabled');

              $.alert.show('alert-success', response.message, form);

              setTimeout(function(){
                window.location.reload();
              }, 2000);

            })
            .fail(function(response){
              switch (response.status){
                case 422:
                  $.alert.formValidateResponse(response.responseJSON.description, form);
                  break;
                default:
                  message = response.responseJSON.message;
                  if(typeof response.message  !== 'undefined')
                    $.alert.show('alert-danger', message, form);
                  break;
              }
            })
            .always(function(){
              $.loading.close();
            })
        ;

      });

      if(disableAll == 1){
        form.find('input, select, textarea').prop('disabled', 'disabled');
      }


    }
  }
};