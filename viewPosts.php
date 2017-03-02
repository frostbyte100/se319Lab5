<?php


  echo "<html
        <head>
           <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
           <title>Matt and Lee's Project 5</title>
       </head>
          <body>";
 ?>





  <div id="viewPosts" >

    <div id="allPost"></div>






    <form id="makeAPost" >
       <h1>Make a Post</h1>
       Post Title:<br><input type="text" id="post"><br>
       <label>Text Area</label>
          <textarea id = "myTextArea" rows = "3" cols = "80">Your text here</textarea>
       <input type="button" id="login-button" value="Login">
    </form>

  </div>







<?php  echo " </body> <script src=\"actions.js\"></script> </html>";?>
