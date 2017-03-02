

$( document ).ready(function() {
    console.log( "ready!" );
});



function login(){

  var info = {"username": $("#username").val(), "password": $("#password").val() };

  $.ajax({
      url: 'checkLogin.php',
      type: "POST",
      data: info,
      success: function(data) {
        console.log(data);

        $("#loginMenu").css("display","none");
        $("#viewPosts").css("display","block");
      },
      error: function(data) {

      }
  });


}





function signUp(){

  window.location.href = "http://localhost:8080/se319lab5/login.php"  ;
  // var info = {"username": $("#username").val(), "password": $("#password").val() };
  //
  // $.ajax({
  //     url: 'Signup.php',
  //     type: "POST",
  //     data: info,
  //     success: function(data) {
  //       console.log(data);
  //
  //       $("#signUpMenu").css("display","none");
  //       $("#loginMenu").css("display","block");
  //     },
  //     error: function(data) {
  //
  //     }
  // });


}
