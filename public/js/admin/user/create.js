$(document).ready(function(){

  $('#main-form').submit(function(){

        $('.missing_alert').css('display', 'none');

       

        var data = $('#main-form').serialize();
        $('input').iCheck('disable');
        $('#main-form input, #main-form button').attr('disabled','true');
        $('#ajax-icon').removeClass('fa fa-save').addClass('fa fa-spin fa-refresh');

        Pace.track(function () {
            $.ajax({
              url: $('#main-form #_url').val(),
    		      headers: {'X-CSRF-TOKEN': $('#main-form #_token').val()},
    		      type: 'POST',
              cache: false,
    	        data: data,
              success: function (response) {
                var json = $.parseJSON(response);
                if(json.success){
                  $('#main-form #submit').hide();
                  $('#main-form #edit-button').attr('href', $('#main-form #_url').val() + '/' + json.user_id + '/edit');
                  $('#main-form #edit-button').removeClass('hide');
                  toastr.success('Usuario ingresado exitosamente');
                }
              },error: function (data) {
                var errors = data.responseJSON;
                $.each( errors.errors, function( key, value ) {
                  toastr.error(value);
                  return false;
                });
                $('input').iCheck('enable');
                $('#main-form input, #main-form button').removeAttr('disabled');
                $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-save');
              }
           });
        });

       return false;

    });
});
