<?php

  include_once('ExampleCryptography.php');

  $rsa = new Crypt_RSA();
  $rsa->setPrivateKeyFormat(CRYPT_RSA_PRIVATE_FORMAT_PKCS1);
  $rsa->setPublicKeyFormat(CRYPT_RSA_PUBLIC_FORMAT_PKCS1);
  extract($rsa->createKey(1024)); /// makes $publickey and $privatekey available
  // echo $privatekey;
  // echo $publickey;
  //Private key
  $private_key = $privatekey;
  $public_key = $publickey;



  $username = $_POST["username"];
  $password = $_POST["password"];


  $line = $username.":".$password.":".$public_key.":".$private_key."\n";


  $myfile = fopen("users.txt", "r") or die("Unable to open file!");
  $line = $line . fread($myfile,filesize("users.txt"));
  fclose($myfile);

  $myfile = fopen("users.txt", "w");
  fwrite($myfile, $line);
  fclose($myfile);

  echo  json_encode($_POST);
 ?>
