$(document).ready(function() {
  // This command is used to initialize some elements and make them work properly
  $.material.init();

  $('button#delete').on('click', function(){
      swal({
        title: "Are you sure?",
        text: "You will not be able to recover this course!",         type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
      },
      function(){
        $("#myform").submit();
      });
  });

  $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
  });

});

