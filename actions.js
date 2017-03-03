

$( document ).ready(function() {
    console.log( "ready!" );
});

function deletePost(pID){
  var post = {"action":2, "postID": pID };
  $.ajax({
      url: 'updatePosts.php',
      type: "POST",
      data: post,
      success: function(data) {
        console.log(data);
      },
      error: function(data) {
        console.log(data);
      }
  });

}
function updatePost(pID){




  var user = $("#user").text();
  var postID = parseInt($("#lastPostID").text());
  var postTitle = $("#postTitle").val();
  var postDesc = $("#postDesc").val();
  var time = new Date();

  var postTime = time.toString();

  var post = {"action":0, "postID": postID, "user": user, "postTitle":postTitle,"postDesc":postDesc,"postTime":postTime };
  console.log(post);

  $.ajax({
      url: 'updatePosts.php',
      type: "POST",
      data: post,
      success: function(data) {
        window.location.href = "http://localhost:8080/se319lab5/viewPosts.php"  ;
      },
      error: function(data) {
          console.log(data);

      }
  });
}


function showMakePost(){
  $("#postMaker").css("display","none");
  $("#makeAPost").css("display", "inline");


}


function makePost(){
  var user = $("#user").text();
  var postID = parseInt($("#lastPostID").text());
  var postTitle = $("#postTitle").val();
  var postDesc = $("#postDesc").val();
  var time = new Date();

  var postTime = time.toString();

  var post = {"action": 1, "postID": postID, "user": user, "postTitle":postTitle,"postDesc":postDesc,"postTime":postTime };
  console.log(post);

  $.ajax({
      url: 'updatePosts.php',
      type: "POST",
      data: post,
      success: function(data) {
        window.location.href = "http://localhost:8080/se319lab5/viewPosts.php"  ;
      },
      error: function(data) {
          console.log(data);

      }
  });
}


function login(){
  if($("#username").val() == "" || $("#password").val() == ""){
    alert("You need a username or password");
    return;
  }
  var info = {"username": $("#username").val(), "password": $("#password").val() };
  console.log(info);
  $.ajax({
      url: 'checkLogin.php',
      type: "POST",
      data: info,
      success: function(data) {
        // console.log("call back");
        // console.log(data);
        if(data=="True"){
          window.location.href = "http://localhost:8080/se319lab5/viewPosts.php"  ;
        }else{
          window.location.href = "http://localhost:8080/se319lab5/login.php";
        }

      },
      error: function(data) {
          console.log(data);
          $("#loginMenu").html(data.responseText);
      }
  });


}





function signUp(){

  // window.location.href = "http://localhost:8080/se319lab5/login.php"  ;
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

function logOut(){
    $.ajax({
        url: 'logout.php',
        type: "GET",
        success: function(data) {
          window.location.href = "http://localhost:8080/se319lab5/index.html";
        },
        error: function(data) {
            console.log(data);
        }
    });
}
