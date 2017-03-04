<?php

    session_start(); //Remove later
    include_once("secHelper.php");

    $myfile = @fopen("users.txt", "r") or die("Unable to open file!");

    while (($line = @fgets($myfile)) !== false) {
        $userInfo = explode(":", $line);

        if($userInfo[0] == $_POST["To"]){
            $key = $userInfo[2];
            $privateKey = $userInfo[3];
        }
    }

    fclose($myfile);

    $json = file_get_contents("messages.txt");
    $newMessage = array("From" => $_POST["From"], "To" => $_POST["To"], "Body" => utf8_encode(rsa_encrypt($_POST["Body"], $key)));

    if($json == ""){
        $data = [];
        array_push($data,$newMessage);
        echo "this was empty";
    } else {
        echo "this was not empty";
        $json = str_replace('},]', "}]", $json);
        $data = json_decode($json, true);
        array_push($data, $newMessage);
    }

    file_put_contents("messages.txt", json_encode($data));
?>
