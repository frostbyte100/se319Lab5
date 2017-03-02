<?php


  echo "<html
        <head>
           <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
           <title>Matt and Lee's Project 5</title>
       </head>
          <body>";
 ?>




  <form id="loginMenu" >
     <h1>Login</h1>
     User Name:<br><input type="text" id="username" name="username"><br><br>
     Password:<br><input type="text" id="password" name="password"><br><br>
    <button type="button" id="signUpButton" onclick="login()">Login</button>
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







<?php  echo " </body> <script src=\"actions.js\"></script> </html>";?>
