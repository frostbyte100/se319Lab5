<?php


 $isNew = $_POST["isNew"];
 if($isNew==1){
   $postID = $_POST["postID"];
   $user = $_POST["user"];
   $postTitle = $_POST["postTitle"];
   $postDesc = $_POST["postDesc"];
   $postTime = $_POST["postTime"];

   $json = file_get_contents("posts.txt");

   $json=str_replace('},]',"}]",$json);
   $data = json_decode($json, true);

   $newPost = array("postID"=> $_POST["postID"], "user"=> $_POST["user"], "postTitle"=> $_POST["postTitle"], "postDesc"=> $_POST["postDesc"], "postTime"=> $_POST["postTime"]);

   array_push($data, $newPost);

   file_put_contents('posts.txt', json_encode($data));
   echo json_encode( $data );
 }else{
   $json = file_get_contents("posts.txt");

   $json=str_replace('},]',"}]",$json);
   $data = json_decode($json, true);

   $postID = $_POST["postID"];
   $data[$postID] = array("postID"=> $_POST["postID"], "user"=> $_POST["user"], "postTitle"=> $_POST["postTitle"], "postDesc"=> $_POST["postDesc"], "postTime"=> $_POST["postTime"]);

   file_put_contents('posts.txt', implode($data));
   echo json_encode( $data );

 }



 ?>
