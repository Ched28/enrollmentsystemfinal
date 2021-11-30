<?php

session_start();
if($_SESSION['email']){
    echo "Welcome user" . $_SESSION["email"];
}
else{
    header("location:login.php"); //login page
}
?>

<a href="Logout.php"></a> //Button(Change to button)