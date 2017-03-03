<?php


  echo "<html
        <head>
           <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
           <title>Matt and Lee's Project 5</title>
       </head>
          <body>";
 ?>

  <?php

    session_start();

    if(isset($_SESSION["user"])){?>



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
          $str .= "<td id='".$post["postID"]."T'>".$post["postTitle"]."</td>";
          $str .= "<td id='".$post["postID"]."D'>".$post["postDesc"]."</td>";
          $str .= "<td>".$post["postTime"]."</td>";
          if($_SESSION["user"]==$post["user"]){
            $str .= "<td><button onclick=\"seeUpDatePostOption('".$post["postID"]."')\">Update Post</button></td>";
          }else{
            if($_SESSION["user"]=="admin"){
                $str .= "<td><button onclick=\"deletePost('".$post["postID"]."')\">Delete Post</button></td>";
            }else{
              $str .= "<td></td>";
            }
          }

          $lastPostID = $post["postID"];
          $str .= "</tr>";
        }
        $str .= "</table>";
        echo $str;
       ?>
   </div>
   <div id="user" style="display:none";><?php echo $_SESSION["user"]; ?></div>
   <div id="lastPostID" style="display:none";><?php echo $lastPostID; ?></div>



    <br/>
    <?php if($_SESSION["user"]!="admin"){ ?>

      <form id="updatePost"  style="display:none"; >
         <h2>Update Post</h2>
         Post Title:<br><input type="text" id="UpostTitle">
         <p>Post Description</p>
         <textarea id="UpostDesc" rows = "3" cols = "80">Your text here</textarea>
         <br>
         <button type="button" onclick="updatePost()">Update Post</button>
      </form>

      <button id="postMaker" onclick="showMakePost()">Make a Post</button>
      <br/>
      <form id="makeAPost"  style="display:none"; >
         <h2>Make a Post</h2>
         Post Title:<br><input type="text" id="postTitle">
         <p>Post Description</p>
         <textarea id="postDesc" rows = "3" cols = "80">Your text here</textarea>
         <br>
         <button type="button" onclick="makePost()">Make a Post</button>
      </form>
    <?php } ?>
    <br/>
    <button id="inbox" onclick="inbox()">Inbox</button>
    <button id="send" onclick="send()">Send Message</button>
    <input type="button" value="Log Out" onclick="logOut()">

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




  <?php }else{?>
    <p>You have not logged in yet!</p>
  <?php }?>


<?php  echo " </body> <script src=\"actions.js\"></script> </html>";?>
