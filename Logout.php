<?php
session_start();
$_SESSION["valid"]="";
unset($_SESSION["valid"]);
$_SESSION["uname"]=="";
unset($_SESSION["uname"]);

header("Location:Login.php");


?>