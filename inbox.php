<?php

  echo "<html
        <head>
           <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
           <title>Matt and Lee's Project 5</title>
       </head>
          <body>
          <h1> Inbox </h1>
          ";

 session_start();
 //echo $_SESSION["user"];
 if(isset($_SESSION["user"])){?>

<div id="messages">
    <?php
        $json = file_get_contents("messages.txt");
        $json = str_replace('},]', "}]", $json);
        $data = json_decode($json, true);

        $str = "<table border=2>";
        $str .= "<tr>";
        $str .= "<td>From</td><td>Message</td>";
        $str .= "</tr>";

        foreach ($data as $message){
            if($message["To"] == $_SESSION["user"]){
                $str .= "<tr>";
                $str .= "<td>".$message["From"]."</td>";
                $str .= "<td>".$message["Body"]."</td>";
                $str .= "</tr>";
            }
        }
        $str .=  "</table>";
        echo $str;
     ?>
</div>

<br>
<a href="/se319lab5/viewPosts.php"><input type="button" value="Posts"></a>

<?php }else{?>
  <p>You are not logged in!</p>
<?php }?>

 <?php  echo " </body> <script src=\"actions.js\"></script> </html>";?>
