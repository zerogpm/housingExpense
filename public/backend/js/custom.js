$( document ).ready(function() {
  //Date picker
  $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });

  //select 2
  $(".select2").select2();
});