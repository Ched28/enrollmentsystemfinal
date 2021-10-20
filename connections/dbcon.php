<?php
$dbhost = "localhost";
$dbuname = "root";
$dbpass = "";
$dbname = "enrollment";

if(!$con = mysqli_connect($dbhost, $dbuname, $dbpass, $dbname)){
die("failed to connect!");


}
echo 'Database Connected successfully';
?>