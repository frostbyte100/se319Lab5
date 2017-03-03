<?php


  echo "<html
        <head>
           <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
           <title>Matt and Lee's Project 5</title>
       </head>
          <body>";
 ?>



  <?php //if(isset($_SESSION["user"])){?>



    <div id="allPost">
      <?php
        $json = file_get_contents("posts.txt");

        $json=str_replace('},]',"}]",$json);
        $data = json_decode($json, true);
        $lastPostID = 0;
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
          $str .= "<td><button onclick='updatePost(post".$post["postID"].")'>Update Post</button></td>";
          $lastPostID = $post["postID"];
          $str .= "</tr>";
        }
        $str .= "</table>";
        echo $str;
       ?>
   </div>
   <div id="user" style="display:none";>lee</div>
   <div id="lastPostID" style="display:none";><?php echo $lastPostID; ?></div>



   <form id="updatePost" >
      <h1>Make a Post</h1>
      Post Title:<br><input type="text" id="postTitle">
      <p>Text Area</p>
      <textarea id="postDesc" rows = "3" cols = "80">Your text here</textarea>
      <br>
      <button type="button" onclick="updatePost()">Update Post</button>
   </form>


    <form id="makeAPost" >
       <h1>Make a Post</h1>
       Post Title:<br><input type="text" id="postTitle">
       <p>Text Area</p>
       <textarea id="postDesc" rows = "3" cols = "80">Your text here</textarea>
       <br>
       <button type="button" onclick="makePost()">Make a Post</button>
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

  <input type="button" value="Log Out" onclick="logOut()">

  <?php //}else{?>

    <!-- <p>You have not logged in yet!</p> -->
  <?php //}?>


<?php  echo " </body> <script src=\"actions.js\"></script> </html>";?>
