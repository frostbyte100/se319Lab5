
<?php


  echo "<html
        <head>
           <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
           <title>Matt and Lee's Project 5</title>
       </head>
          <body>";
 ?>


  <form id="signUpMenu" action="Signup.php" enctype="multipart/form-data"  method="POST">
    <h1>SignUp</h1>
    User Name:<br><input type="text" id="username" name="username"><br><br>
    Password:<br><input type="text" id="password" type="password" name="password"><br><br>
    <input type="submit" id="submit" />
  </form>



  <?php  echo " </body> <script src=\"actions.js\"></script> </html>";?>

<?php

  include_once('secHelper.php');

  $rsa = new Crypt_RSA();
  $rsa->setPrivateKeyFormat(CRYPT_RSA_PRIVATE_FORMAT_PKCS1);
  $rsa->setPublicKeyFormat(CRYPT_RSA_PUBLIC_FORMAT_PKCS1);
  extract($rsa->createKey(1024)); /// makes $publickey and $privatekey available
  // echo $privatekey;
  // echo $publickey;
  //Private key
  $private_key = $privatekey;
  $public_key = $publickey;

  if(isset($_POST["username"]) && isset($_POST["username"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $line = $username.":".$password.":".$public_key.":".$private_key."\n";


    $myfile = fopen("users.txt", "r") or die("Unable to open file!");
    $line = $line . fread($myfile,filesize("users.txt"));
    fclose($myfile);

    $myfile = fopen("users.txt", "w");
    fwrite($myfile, $line);


    if ( fclose($myfile))
    {
        header("Location: login.php");
        exit;
    }
  }
 ?>
