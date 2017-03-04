<?php


 $action = $_POST["action"];
 if($action==1){

   //ADDING a post
   $postID = $_POST["postID"];
   $user = $_POST["user"];
   $postTitle = $_POST["postTitle"];
   $postDesc = $_POST["postDesc"];
   $postTime = $_POST["postTime"];

   $json = file_get_contents("posts.txt");

   if($json==""){
     $data = [];
     $newPost = array("postID"=> $_POST["postID"], "user"=> $_POST["user"], "postTitle"=> $_POST["postTitle"], "postDesc"=> $_POST["postDesc"], "postTime"=> $_POST["postTime"]);
     array_push($data, $newPost);

     file_put_contents('posts.txt', json_encode($data));
     //  header('Content-type: application/json');
     echo json_encode( $data );
   }else{
     $json=str_replace('},]',"}]",$json);
     $data = json_decode($json, true);

     $newPost = array("postID"=> $_POST["postID"], "user"=> $_POST["user"], "postTitle"=> $_POST["postTitle"], "postDesc"=> $_POST["postDesc"], "postTime"=> $_POST["postTime"]);

     array_push($data, $newPost);

     file_put_contents('posts.txt', json_encode($data));
     //  header('Content-type: application/json');
      echo json_encode( $data );
   }



   //  echo "<pre>";
   //  print_r($data);
   //  echo "</pre>";

 }else if($action==0){
   $json = file_get_contents("posts.txt");

   $json=str_replace('},]',"}]",$json);
   $data = json_decode($json, true);

   $postID = $_POST["postID"];
   $data[$postID] = array("postID"=> $_POST["postID"], "user"=> $_POST["user"], "postTitle"=> $_POST["postTitle"], "postDesc"=> $_POST["postDesc"], "postTime"=> $_POST["postTime"]);

   file_put_contents('posts.txt', json_encode($data));
  //  header('Content-type: application/json');
   echo json_encode( $data );

  //  echo "<pre>";
  //  print_r($data);
  //  echo "</pre>";
 }else if($action==2){
   //Deleting a post
   $json = file_get_contents("posts.txt");

   $json=str_replace('},]',"}]",$json);
   $data = json_decode($json, true);

   unset($data[$_POST["postID"]]);
  //  foreach ($data as $post){
  //    if($post["postID"]==$_POST["postID"]){
  //
  //    }
  //  }
   if(count($data)==0){
     file_put_contents('posts.txt', "");
    //  header('Content-type: application/json');
      $data = [];
      $newPost = array("postID"=> "", "user"=> "", "postTitle"=> "", "postDesc"=> "", "postTime"=> "");
      array_push($data, $newPost);
      echo json_encode( $data );
   }else{
     file_put_contents('posts.txt', json_encode($data));
    //  header('Content-type: application/json');
     echo json_encode( $data );
  }

  //  echo "<pre>";
  //  print_r($data);
  //  echo "</pre>";

 }



 ?>
