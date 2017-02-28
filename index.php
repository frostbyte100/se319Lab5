<?php
  echo "<html
        <head>
           <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
           <title>Matt and Lee's Project 5</title>
       </head>
          <body>";
 ?>

  <form id="signUpMenu">
     <h1>SignUp</h1>
     User Name:<br><input type="text" id="username"><br><br>
     Password:<br><input type="text" id="password"><br><br>
     <input type="button" id="signUp-button" value="signUp">
  </form>


  <form id="loginMenu" style="display:none;">
     <h1>Login</h1>
     User Name:<br><input type="text" id="username"><br><br>
     Password:<br><input type="text" id="password"><br><br>
     <input type="button" id="login-button" value="Login">
  </form>


  <form id="loginMenu" style="display:none;">
     <h1>Make a Post</h1>
     Post Title:<br><input type="text" id="post"><br>
     <input type="button" id="login-button" value="Login">
  </form>






<?php  echo " </body>
 <script src=\"actions.js\"></script>
 </html>"
?>
