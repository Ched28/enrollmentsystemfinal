<?php 
include_once("../config/dbcon.php");
$course1 = $_GET['cour'];
function selectunits($con, $subjectcode){
    $select = "SELECT `units` FROM  `genacc_subject` WHERE `subjectcode` = '$subjectcode'";
    $run = mysqli_query($con, $select);

    if($run)
    {
        if($run && mysqli_num_rows($run) > 0){
            while($row = mysqli_fetch_array($run)){
                $units = $row['units'];

                return $units;
            }
        }
    }
}
if(isset($_POST['entercurr'])){
    $subj = $_POST['subj'];
    $year = mysqli_real_escape_string($con,$_POST['year']);
    $sem = mysqli_real_escape_string($con,$_POST['sem']);
    
    foreach($subj as $subjects){
        
        
        $units = selectunits($con, $subjects);
         $insertsubj = "INSERT INTO `genacc_year`(`subjectcode`, `units`, `year`, `sem`, `course_code`) VALUES ('$subjects','$units','$year','$sem','$course1')";
         $insertrun = mysqli_query($con, $insertsubj);
        }
         if($insertrun){
             echo "<script>alert('Inserted Successfully');</script>";
            

         }else{
             echo "<script>alert('Data Not Inserted');</script>";
         }
    echo "<script>location.replace('viewcurriculum.php?cour=$course1')</script>";
}

?>