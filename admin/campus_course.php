<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("config/dbcon.php");

$campcode = $_GET['campcode'];
?>
<div class="content">
    <div class="section-dashboard">
    <div class="headsec">
        <h1> COURSES </h1>
    </div>
    <div class="secbody course">
        <?php 
            $selectcourse = "SELECT * FROM course";
            $run_course = mysqli_query($con, $selectcourse);
            if($run_course){
                if($run_course && mysqli_num_rows($run_course) > 0 ){
                    while($row = mysqli_fetch_array($run_course))
                    {
                        $coursename = $row['coursename'];
                        $coursecode = $row['course_code'];

                        echo "<div><a href='sectionlist.php?campcode=$campcode&courcode=$coursecode'><h4> $coursename</h4></a><hr></div>";

                    }
                }
            }
        ?>
        
    </div>
    </div>
</div>