<?php 
include_once("dbcon.php");


$selectinfo = "SELECT * FROM `studentinfo`";
$select_run = mysqli_query($con, $selectinfo);

if($select_run){
    if($select_run && mysqli_num_rows($select_run) > 0){
        while($row = mysqli_fetch_array($select_run)){
            $studentid = $row['StudentID'];
        }
    }
}
?>