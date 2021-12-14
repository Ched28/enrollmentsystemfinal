<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("../config/dbcon.php");

$coursecode = $_GET['cour'];

function selectshortCourse($con, $coursecode){
    if($coursecode == "GA"){
        $course1 = "genacc";
        return $course1;
    }else{
        $selectcourse = "SELECT * FROM `course` WHERE course_code = '$coursecode'";
        $run_course = mysqli_query($con,$selectcourse);
        if($run_course){
            if($run_course && mysqli_num_rows($run_course) > 0){
                while($row = mysqli_fetch_array($run_course)){
                    $course1 = strtolower($row['courseshort']);

                    return $course1;
                }
            }
        }
    }
}

?>
<div class="content">
 <div class="listsubject-main">
        <div class="listsubject-header">
            <h1> LIST OF SUBJECTS </h1>
            <hr>
        </div>
        <div class="listsubject-body section">
            <?php
                 $course1 = strtolower(selectshortCourse($con, $coursecode));
                 $course_leg = "_subject";
                 $coursefinal = $course1 . $course_leg; 
                $selectsubjects = "SELECT * FROM `$coursefinal`";
                $run_subjects = mysqli_query($con, $selectsubjects);
                if($run_subjects){
                    if($run_subjects && mysqli_num_rows($run_subjects) > 0){
                        while($row = mysqli_fetch_array($run_subjects)){

                            $subjecttitle = $row['subjecttitle'];
                            $id = $row['id'];
                            echo "<div> <div><h3> $subjecttitle </h3></div> <div> <ul> <li> <a href='updatesubject.php?id=$id&cour=$course1'><i class='fas fa-edit'></i></a> </li> <li><a href=''><i class='fas fa-list'></i></a></li> </ul></div></div>";
                        
                        }
                    }
                }
            
            ?>
            <a href='' target="_TOP" class="fixed-button" style="text-decoration: none;color:white;"> <i class="fas fa-arrow-up"></i> TOP  </a>
        </div>
</div>

</div>