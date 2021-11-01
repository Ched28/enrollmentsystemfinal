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
    <li class="ul-list"> <i class="fas fa-user-shield"> &nbsp; </i>  Admin </li>
    <li class="ul-list"><i class="fas fa-chart-line"></i> &nbsp; Dashboard </li>
    <li class="ul-list"><i class="fas fa-list-ol"></i> &nbsp; List of Enrollees </li>
    <li class="ul-list"><i class="far fa-folder"></i> &nbsp; Documents </li>
    

</ul>
</main>
<div class="content">
    <div class="content-main">
    <div class="content-date"> <h3> As of <script> document.write(new Date().toDateString()); </script> </h3></div>
    <div class="content1">
     <h1> 100 <br><span style="font-size: .3em;padding: 0;margin: 0;"> out of</span> <br></h1> <span style="font-size: 2em;padding: 0;margin: 0;"> 500 Examinees </span>
         </div>
    <div class="content2"> <h5> Enrolled </h5></div>
    <div class="content3"> <h5> Officially Enrolled  </h5> </div>
    </div>
</div>


<?php //include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); <i class="fas fa-percentage"></i> ?>