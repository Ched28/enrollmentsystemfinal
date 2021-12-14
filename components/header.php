<?php 
$cssfile1 = "/enrollmentsystemfinal/styles/styles.css";
$cssfile2 = "/enrollmentsystemfinal/styles/all.css";
$iconsite = "/enrollmentsystemfinal/img/qcu.png";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $cssfile1;?>" type="text/css">
    <link rel="stylesheet" href="<?php echo $cssfile2;?>" type="text/css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    </style>
    <link rel="icon" href="<?php echo $iconsite;?>" type="image/icon type">
    <title>Quezon City University Online Portal</title>
</head>
<body>
    <div class="container">
<nav id="myHeader"> 
            <div class="logo">
                <img class="qculogo"  src="<?php echo $iconsite;?>"> &nbsp;&nbsp;&nbsp;
                  <a href="/enrollmentsystemfinal/index.php" style="text-decoration:none;color: white;">  <h3>Quezon City University | <span style="font-size:15px;">  Online Portal</span></h3></a>
            </div>
            <ul class="nav-list">
                <li class="list-items">
                    <h3>Good Life Starts Here</h3>
                </li>
                <li class="list-items"> 
                   <!-- <div class="nav-date"> 
                        <script > document.write(new Date().toDateString()); </script> 
                    </div>-->  
                </li>
       

            </ul>
          
</nav>
