$( document ).ready(function() {
    console.log( "ready!" );
});

function deletePost(pID){
  var user = $("#user").text();
  var post = {"action":2, "postID": parseInt(pID) };
  $.ajax({
      url: 'updatePosts.php',
      type: "POST",
      data: post,
      success: function(data) {
        console.log(data);
        var json = JSON.parse(data);
        console.log(json);
        var d = createTable(json,user);
        console.log(d);
        $("#allPost").html( d );
        $("#lastPostID").html(json.length-1);
      },
      error: function(data) {
        console.log(data);
      }
  });

}

function seeUpDatePostOption(pID){
  $("#updatPostID").html(pID);
  $("#updatePost").css("display","inline");
  //$("#postMaker").css("display","none");
  // $("#makeAPost").css("display", "inline");
}

function makePost(){
  var user = $("#user").text();
  var postID = parseInt($("#lastPostID").text()) + 1;
  var postTitle = $("#postTitle").val();
  var postDesc = $("#postDesc").val();
  var time = new Date();

  var postTime = time.toString();

  var post = {"action": 1, "postID": postID, "user": user, "postTitle":postTitle,"postDesc":postDesc,"postTime":postTime };

  $.ajax({
      url: 'updatePosts.php',
      type: "POST",
      data: post,
      success: function(data) {
        console.log(data);
        var json = JSON.parse(data);
        console.log(json);
        $("#allPost").html(createTable(json,user));
        $("#lastPostID").html(postID);
        $("#postMaker").css("display","inline");
        $("#makeAPost").css("display", "none");
      },
      error: function(data) {
          console.log(data);

      }
  });
}

function updatePost(pID){

  var user = $("#user").text();
  var postID = parseInt($("#updatPostID").text());
  var postTitle = $("#UpostTitle").val();
  var postDesc = $("#UpostDesc").val();
  var time = new Date();

  var postTime = time.toString();

  var post = {"action":0, "postID": postID, "user": user, "postTitle":postTitle,"postDesc":postDesc,"postTime":postTime };

  $.ajax({
      url: 'updatePosts.php',
      type: "POST",
      data: post,
      success: function(data) {
        console.log(data);
        var json = JSON.parse(data);
        console.log(json);
        $("#allPost").html(createTable(json, user));

        $("#updatePost").css("display","none");
        $("#postMaker").css("display","inline");
        $("#makeAPost").css("display", "none");
      },
      error: function(data) {
          console.log(data);

      }
  });
}

function createTable(data, user){
  var str = "";
  var lastPostID = 0;
  str  = "<table  border=2>";
  str += "<tr>";
  str += "<td>PostTitle</td><td>PostDesc</td><td>PostTime</td><td>Update</td>";
  str += "</tr>";

  for (var obj in data) {
    str += "<tr>";
    str += "<td id='"+data[obj]["postID"]+"T'>"+data[obj]["postTitle"]+"</td>";
    str += "<td id='"+data[obj]["postID"]+"D'>"+data[obj]["postDesc"]+"</td>";
    str += "<td>"+data[obj]["postTime"]+"</td>";
    if(user==data[obj]["user"]){
      str += "<td><button onclick=\"seeUpDatePostOption('"+data[obj]["postID"]+"')\">Update Post</button></td>";
    }else{
      if(user=="admin"){
          str += "<td><button onclick=\"deletePost('"+data[obj]["postID"]+"')\">Delete Post</button></td>";
      }else{
        str += "<td></td>";
      }
    }
    str += "</tr>";
  }

  str += "</table>";
  return str;
}

function showMakePost(){
  $("#postMaker").css("display","none");
  $("#makeAPost").css("display", "inline");


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

function sendMessage(){
    var fromUser = $("#user").text();
    var toUser = $("#sendTo").val();
    var message = $("#messageBody").val();
    var post = {"From": fromUser, "To": toUser, "Body": message};

    $.ajax({
        url: 'send.php',
        type: "POST",
        data: post,
        success: function(data) {
          window.location.href = "http://localhost:8080/se319lab5/viewPosts.php";
        },
        error: function(data) {
            console.log(data);
        }
    });

}
