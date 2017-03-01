

$( document ).ready(function() {
    console.log( "ready!" );
});


function signUp(){

  var info = {"username": $("#username").val(), "password": $("#password").val() };

  $.ajax({
      url: 'signUp.php',
      type: "POST",
      data: info,
      success: function(data) {
        console.log(data);

        $("#signUpMenu").css("display","none");
        $("#loginMenu").css("display","block");
      },
      error: function(data) {

      }
  });


}
