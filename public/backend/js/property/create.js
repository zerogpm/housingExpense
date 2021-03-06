$( document ).ready(function() {
  //Date picker
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });

  //select 2
  $(".select2").select2();

  //Ajax save
  $('#property').submit(function(e) {
    e.preventDefault();
    var data = $(this).serialize();
    ajaxCall(data);
  });

  function ajaxCall(data) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type:'POST',
      url:'/property',
      data:data,
      success:function (data) {

        swal(
          'Good job!',
          'You clicked the button!',
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