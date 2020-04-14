$(document).ready(function(){

  $("#message").hide();
  const btnCancel = $("#btnCancel");
  const btnDelete = $("#btnDelete");

  $(".btn-confirm").on("click", function(){
    $("#modalDelete").modal('show');
  });

  $('.btn_delete').click(function(){

    var row = $(this).parents('tr');
    var id = row.data('id');
    var form = $('#form-delete');
    var url = form.attr('action').replace(':PRODUCT_ID', id) ;
    var data = form.serialize();
    row.fadeOut();

    $("#modal-btn-si").on("click", function(){
      
      $.post(url, data, function(result){
        $("#message").fadeIn();
        $("#message").html(result);
        setTimeout(function() {
        $("#message").fadeOut(800);
        },1300);
        $("#modalDelete").modal('hide');
      });
    });

    $("#modal-btn-no").on("click", function(){
      row.fadeIn();
      $("#modalDelete").modal('hide');
    });

    $("#modal-close").on("click", function(){
      row.fadeIn();
      $("#modalDelete").modal('hide');
    });

  });

});