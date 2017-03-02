<?php


  echo "<html
        <head>
           <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
           <title>Matt and Lee's Project 5</title>
       </head>
          <body>";
 ?>



  <?php //if(isset($_SESSION["user"])){?>


    <div id="user" style="display:none";>lee</div>
    <div id="lastPostID" style="display:none";>0</div>
    <div id="allPost">
      <?php
        $json = file_get_contents("posts.txt");

        $json=str_replace('},]',"}]",$json);
        $data = json_decode($json, true);
        //print_r($data);
        //echo $data;
        $str  = "<table  border=2>";
        $str .= "<tr>";
        $str .= "<td>PostTitle</td><td>PostDesc</td><td>PostTime</td><td>Update</td>";
        $str .= "</tr>";
        foreach ($data as $post){
          // echo $post;
          $str .= "<tr>";
          $str .= "<td>".$post["postTitle"]."</td>";
          $str .= "<td>".$post["postDesc"]."</td>";
          $str .= "<td>".$post["postTime"]."</td>";
          $str .= "<td><button onclick='updatePost(".$post["postID"].")'>Update Post</button></td>";
          $str .= "</tr>";
        }
        $str .= "</table>";
        echo $str;
       ?>
   </div>






    <form id="makeAPost" >
       <h1>Make a Post</h1>
       Post Title:<br><input type="text" id="postTitle">
       <p>Text Area</p>
       <textarea id="postDesc" rows = "3" cols = "80">Your text here</textarea>
       <button type="button"  value="Login">Make a Post</button>
    </form>

    <button id="send" onclick="send">Send</button>
    <form id="sendMessage" style="display:none;" >
       <h1>Send a Message</h1>
       To:<br>
       <input type="text" id="to">
       From:<br>
       <input type="text" id="from">
       <p>Body</p>
       <textarea id="body" rows = "3" cols = "80">Your text here</textarea>
       <br>
       <button type="button" id="submitMessage">Submit</button>
    </form>

  </div>


  <?php //}else{?>

    <!-- <p>You have not logged in yet!</p> -->
  <?php //}?>


<?php  echo " </body> <script src=\"actions.js\"></script> </html>";?>
