$( document ).ready(function() {
  //Date picker
  $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });

  //select 2
  $(".select2").select2();

  //Ajax save
  $('#transaction').submit(function(e) {
    e.preventDefault();
    var data = $(this).serialize();
    ajaxCall(data, '/transaction/save');
  });

  $('form.category').submit(function(e) {
    e.preventDefault();
    var data = $(this).serialize();
    ajaxCall(data,'/category/add')
  });

  function ajaxCall(data, url) {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type:'POST',
      url:url,
      data:data,
      success:function (data) {

        if(data.msg == 'error') {
          swal(
            data.msg,
            data.color,
            'error'
          );

          return
        }

        swal(
          'Good job!',
          data.msg,
          'success'
        ).then(function () {
          $('input:text, textarea').val('');
        });

        console.log(data);
      },
      error:function (data) {
        console.log(data);
      }
    })
  }
});