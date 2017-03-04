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

<?php  echo " </body> <script src=\"actions.js\"></script> </html>";?>
