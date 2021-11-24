<?php 
    $enc = $_GET['file'];
    $enc2 = $_GET['id'];
    session_start();
    include_once("config/dbcon.php");
    include_once("config/enc_dec.php");

    $file = qcu_decrypt($enc);
    $id = qcu_decrypt($enc2);

    $location = "$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/files/$id/$file";

    header('Content-type:application/pdf');
    header('Content-Description:inline;filename="'.$location.'"');
    header('Content-Transfer-Encoding:binary');
    header('Accept-ranges:bytes');
    @readfile($location);

?>