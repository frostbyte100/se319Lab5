<?php

  echo "<html
        <head>
           <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
           <title>Matt and Lee's Project 5</title>
       </head>
          <body>
          <h1> Send Message </h1>
          ";

 session_start();
 //echo $_SESSION["user"];
 if(isset($_SESSION["user"])){?>

     <form id="sendMessage">
         To: <input type="text" id="sendTo">
         <p>Message:</p>
         <textarea id="messageBody" rows="3" cols="80">Your message here</textarea>
         <br><input type="button" onclick="" value="Send">
         <a href="/se319lab5/viewPosts.php"><input type="button" value="Back"></a>
    </form>

    <div id="user" style="display:none";><?php echo $_SESSION["user"];?></div>

<?php }else{?>
<p>You are not logged in!</p>
<?php }?>

<?php  echo " </body> <script src=\"actions.js\"></script> </html>";?>
