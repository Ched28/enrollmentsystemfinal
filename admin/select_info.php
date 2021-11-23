<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
?>
<div class="content">
<?php
include_once("config/dbcon.php");
$id = $_GET['id'];
$selectinfo = "SELECT * FROM `studentinfo` WHERE ID = '$id' LIMIT 1";
$select_run = mysqli_query($con, $selectinfo);

if($select_run){
    if($select_run && mysqli_num_rows($select_run) > 0){
        while($row = mysqli_fetch_array($select_run)){
            $studentid = $row['StudentID'];
            $lastname = $row['FullName-Last'];
            $firstname = $row['FullName-First'];
            $middlename = $row['FullName-Middle'];
            $age = $row['Age'];
            $birthday = $row['birthday'];
            $birthplace = $row['birthplace'];
            $civilstatus = $row['civilstatus'];
            $gender = $row['gender'];
            $contactno = $row['contactno'];
            $email = $row['email'];
            $address = $row['address-name'];
            $zipcode = $row['zip_code'];
            $mothername = $row['mothername'];
            $motherjob  = $row['motherjob'];
            $fathername = $row['fathername'];
            $fatherjob  = $row['fatherjob'];
            $guardianname = $row['guardianname'];
            $relationship  = $row['relationship'];
            $guardiancontactno = $row['guardiancontactno'];

            ?>
            <div class = "enrollees_indi">

            <div class="enrollees_indihead">
            <h1><?php echo $studentid."&nbsp; <span style='font-size: .7em;'>$lastname, $firstname $middlename</span>"; ?></h1>
            
            
            <hr>
            </div>
            </div>
        <?php    
        }
        
    }
}
?>
</div>