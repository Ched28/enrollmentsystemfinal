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
    <li> <div class="logo" style="padding:0;">
                <img class="qculogo"  src="<?php echo $iconsite;?>"> &nbsp;&nbsp;&nbsp;
                    <h3> Welcome | <span style="font-size:18px;">  Admin</span></h3>
            </div></li>
    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "dashboard.php")?"active":"";?>"><a href="dashboard.php"> <i class="fas fa-chart-line"></i> &nbsp; Dashboard </a></li>
    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "passers.php")?"active":"";?>"><a href="passers.php"> <i class="fas fa-stream"></i> &nbsp; QCUCAT Results </a></li>
    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "enrollees.php") || (basename($_SERVER['PHP_SELF']) == "select_info.php") || (basename($_SERVER['PHP_SELF']) == "approvals.php") || (basename($_SERVER['PHP_SELF']) == "select_status.php")?"active":"";?>"><a href="enrollees.php"> <i class="fas fa-list-ol"></i> &nbsp; Manage New Enrollees</a> </li>
    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "sections.php") || (basename($_SERVER['PHP_SELF']) == "campus_course.php") || (basename($_SERVER['PHP_SELF']) == "sectionlist.php")?"active":"";?>"><a href="sections.php"> <i class="fas fa-user-friends"></i>&nbsp; Manage Section</a> </li>
    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "subjects.php")?"active":"";?>"><a href="subjects.php"> <i class="fas fa-book-open"></i> &nbsp; Manage Subject</a> </li>
    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "student_acc.php")?"active":"";?>"><a href="student_acc.php"> <i class="far fa-user"></i>&nbsp; Manage Student Account</a> </li>
    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "admin.php")?"active":"";?>"> <a href="admin.php"> <i class="fas fa-user-shield"> </i>&nbsp; Account </a> </li>
    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "settings.php")?"active":"";?>"><a href="settings.php"> <i class="fas fa-wrench"></i>&nbsp; Settings </a> </li>
    

</ul>
</main>





