<?php
session_start();
$_SESSION["user"] = "";
echo session_destroy();
?>
