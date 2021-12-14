<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("../config/dbcon.php");
//year and yung subjects 


?>


<div class="content">
<div class="listsubject-main">
<div class="listsubject-header">
    <h1>CHOOSE COURSE </h1>
</div>
<div class="listsubject-body course">
        
                     <?php 
                     $selectcourse = "SELECT * FROM course";
                     $run_course = mysqli_query($con, $selectcourse);
                     if($run_course){
                         if($run_course && mysqli_num_rows($run_course) > 0 ){
                             while($row = mysqli_fetch_array($run_course))
                             {
                                 $coursename = $row['coursename'];
                                 $coursecode = $row['course_code'];
         
                                 echo "<div><a href='viewcurriculum.php?cour=$coursecode'><h4> $coursename</h4></a><hr></div>";
         
                             }
                         }
                     }
                 ?>
                
                

            
        </div>

</div>
</div>