  <?php
    function login_succeed($u,$p){

      $myfile = fopen("users.txt", "r") or die("Unable to open file!");
      while (($line = fgets($myfile)) !== false) {
        // process the line read.
        $credentials = explode(":",$line);
        if($credentials[0]==$u && $credentials[1]==$p){
          fclose($myfile);
          session_start();
          $_SESSION["user"] = $u;
          return true;
        }

      }
      fclose($myfile);
      return false;
    }

    header('Content-type: application/json');
    $username = $_POST["username"];
    $password = $_POST["password"];

    //echo json_encode( $username );
    //echo json_encode( $password );

    $data1 = "True";
    $data2 = "False";

    // echo "hello";
    if ( login_succeed($username, $password)){
      echo json_encode( $data1 ); // prints zero-based JS array: ["a","b","c"] // accessed in JS like: result[1] (returns "b")
    } else {
      echo json_encode( $data2 );
    }


   ?>
