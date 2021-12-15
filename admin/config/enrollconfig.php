<?php 

$select = "SELECT * FROM `enrollmentconfiguration`";
$run = mysqli_query($con, $select);
if($run){
    while($row = mysqli_fetch_array($run)){
        $schoolyear = $row['schoolyear'];
        $sem1 = $row['semester'];
        $switchcon = $row['switchconfig'];
        $countstudentsection = $row['countstudentsection'];
        $countstudentcourse = $row['countstudentcourse'];
    }
}

?>