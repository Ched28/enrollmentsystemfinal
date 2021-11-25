<?php 
include_once("dbcon.php");

session_start();
///passers 
$countpassers = "SELECT COUNT(ExamNo) as 'passers' FROM `studentexamresultstemp`;";
$resultpassers = mysqli_query($con, $countpassers);
if($resultpassers){
    if($resultpassers && mysqli_num_rows($resultpassers) > 0){

        while($row1 = mysqli_fetch_array($resultpassers)){
            $passers = $row1['passers'];
            $_SESSION['passers'] = $passers;
        }
    }
}

$countnewenrollees = "SELECT COUNT(StudentID) as 'enrollees' FROM `studentinfo`;";
$resultnewenrollees = mysqli_query($con, $countnewenrollees);

if($resultnewenrollees){
    if($resultnewenrollees && mysqli_num_rows($resultnewenrollees) > 0){
        while($row2 = mysqli_fetch_array($resultnewenrollees)){
            $newenrollees = $row2['enrollees'];
            $_SESSION['enroll'] = $newenrollees;
        }
    }
    
}

$countofficial = "SELECT COUNT(StudentID) as 'approved' FROM `studentapprovals` WHERE Approval = 'APPROVED';";
$resultofficial = mysqli_query($con, $countofficial);

if($resultofficial){

    if($resultofficial && mysqli_num_rows($resultofficial)> 0){
        while($row3 = mysqli_fetch_array($resultofficial)){
            $approved = $row3['approved'];
            $_SESSION['approved'] = $approved;
        }
    }
}

//regular 

$countregular = "SELECT COUNT(StudentID) AS cat FROM `studentenrollmentinfo` WHERE category = 'REGULAR';";
$resultregular = mysqli_query($con, $countregular);
if($resultregular){
    if($resultregular && mysqli_num_rows($resultregular) > 0){
        while($row4 = mysqli_fetch_array($resultregular)){
            $regular = $row4['cat'];
            $_SESSION['regular'] = $regular;
        }
    }
}

$counttransferee = "SELECT COUNT(StudentID) AS cat FROM `studentenrollmentinfo` WHERE category = 'TRANSFEREE';";
$resulttransferee = mysqli_query($con, $counttransferee);
if($resulttransferee){
    if($resulttransferee && mysqli_num_rows($resulttransferee) > 0){
        while($row5 = mysqli_fetch_array($resulttransferee)){
            $transferee = $row5['cat'];
            $_SESSION['transferee'] = $transferee;
        }
    }
}

$countreturnee = "SELECT COUNT(StudentID) AS cat FROM `studentenrollmentinfo` WHERE category = 'RETURNEE';";
$resultreturnee = mysqli_query($con, $countreturnee);
if($resultreturnee){
    if($resultreturnee && mysqli_num_rows($resultreturnee) > 0){
        while($row5 = mysqli_fetch_array($resultreturnee)){
            $returnee = $row5['cat'];
            $_SESSION['returnee'] = $returnee;
        }
    }
}

?>

    <div class="content-main">
    <div class="content-date"> <h3> As of <?php echo date("M d Y");?> </h3></div>
    <div class="content1">
     <h1> <?php echo $_SESSION['passers'];?>  <hr> </h1> 
     <span style="font-size: 1.3em;padding: 0;margin: 0;"> QCUCAT Passers </span>
         </div>
    <div class="content2">
         <h1> <?php echo $_SESSION['enroll'];?>  <hr> </h1> 
         <span style="font-size: 1.3em;padding: 0;margin: 0;"> New Enrollees </span>
        </div>
    <div class="content3">
         <h1> <?php echo $_SESSION['approved'];?>  <hr> </h1> 
         <span style="font-size: 1.3em;padding: 0;margin: 0;"> Officially Enrolled </span> 
        </div>
    <div class="content4">
     <h1> <?php echo $_SESSION['regular'];?>   <hr> </h1> 
     <span style="font-size: 1.3em;padding: 0;margin: 0;"> Regular </span>
         </div>
    <div class="content5"> 
        <h1> <?php  echo $_SESSION['transferee'];?>  <hr> </h1> 
        <span style="font-size: 1.3em;padding: 0;margin: 0;"> Transferees </span>
    </div>
    <div class="content6"> 
        <h1> <?php echo $_SESSION['returnee'];?><hr> </h1> 
        <span style="font-size: 1.3em;padding: 0;margin: 0;"> Returnees </span> 
    </div>
    </div>
