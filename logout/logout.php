<?php

//logout page
session_start();
unset($_SESSION['email']);
header("location.login.php")


?>