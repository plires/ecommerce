$(document).ready(function(){

  $("#message").hide();
  $("#error").hide();

  $('.btn_delete').click(function(){

    var row = $(this).parents('tr');
    var id = row.data('id');
    var form = $('#form-delete');
    var url = form.attr('action').replace(':CART_DETAIL_ID', id) ;
    var data = form.serialize();
    row.fadeOut();

    $.post(url, data, function(result){
      console.log(result);

      $('#'+result.typeAlert).fadeIn();
      $('#'+result.typeAlert).html(result.message);
      setTimeout(function() {
      $('#'+result.typeAlert).fadeOut(800);
      },1300);

      if (!result.success) {
        row.fadeIn();
      }

    })

  });

});