<?php
  session_start();
  echo "<html
        <head>
           <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
           <title>Matt and Lee's Project 5</title>
       </head>
          <body>";
 ?>


  <form id="signUpMenu" >
     <h1>SignUp</h1>
     User Name:<br><input type="text" id="username" name="username"><br><br>
     Password:<br><input type="text" id="password" name="password"><br><br>
     <input type="button" id="signUp-button" value="signUp">
  </form>

  <div id="exPost0">
    <h2>Example Post Look</h2>
    <p>Post Title:</p>
    <input type="text" id="exPostTitle0">
    <p>
    <label>Text Area</label><br>
    <textarea id = "myTextArea" rows = "3"  cols = "80">Your text here</textarea>
    </p>
  </div>


  <form id="loginMenu" style="display:none;">
     <h1>Login</h1>
     User Name:<br><input type="text" id="username" name="username"><br><br>
     Password:<br><input type="text" id="password" name="password"><br><br>
     <input type="button" id="login-button" value="Login">
  </form>


  <div id="viewPosts" style="display:none;">

    <div id="allPost"></div>






    <form id="makeAPost" style="display:none;">
       <h1>Make a Post</h1>
       Post Title:<br><input type="text" id="post"><br>
       <label>Text Area</label>
          <textarea> id = "myTextArea"
                  rows = "3"
                  cols = "80">Your text here</textarea>
       <input type="button" id="login-button" value="Login">
    </form>

  </div>







<?php  echo " </body>
 <script src=\"actions.js\"></script>
 </html>"
?>
