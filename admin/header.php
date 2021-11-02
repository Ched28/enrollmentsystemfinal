<?php 
$cssfile2 = "/enrollmentsystemfinal/styles/all.css";
$iconsite = "/enrollmentsystemfinal/img/qcu.png";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $cssfile2;?>" type="text/css">
    <link rel="stylesheet" href="admin_styles.css" type="text/css">
    <link rel="icon" href="<?php echo $iconsite;?>" type="image/icon type">
    <title>QCU Admin Portal</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    </style>
</head>
<body>
    
<div class="container">

<nav>
            <div class="logo">
                <img class="qculogo"  src="<?php echo $iconsite;?>"> &nbsp;&nbsp;&nbsp;
                    <h3>Quezon City University | <span style="font-size:15px;">  Admin Portal</span></h3>
            </div>
            <ul class="nav-list">
                <li class="list-items">
                <a href="../login.php" class="login-btn"> Log Out &nbsp; <i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>

</nav>
<main>
<ul class="side-list">
    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "admin.php")?"active":"";?>"> <a href="admin.php"> <i class="fas fa-user-shield"> &nbsp; </i>  Admin</a> </li>
    <li class="ul-list"><a href="dashboard.php"> <i class="fas fa-chart-line"></i> &nbsp; Dashboard </a></li>
    <li class="ul-list"><a href="enrollees.php"> <i class="fas fa-list-ol"></i> &nbsp; List of Enrollees</a> </li>
    <li class="ul-list"><a href="documents.php"> <i class="far fa-folder"></i> &nbsp; Documents</a> </li>
    

</ul>
</main>





