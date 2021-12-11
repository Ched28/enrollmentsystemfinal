<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("config/dbcon.php");

$campcode = $_GET['campcode'];
$courcode = $_GET['courcode'];


?>
<div class="content">
    <div class="section-dashboard">
    <div class="headsec">
        <h1> SECTION LIST </h1>
    </div>
    <div class="secbody section">
        <?php 
            $selectcourse = "SELECT * FROM sections WHERE campus_code ='$campcode' AND course_code = '$courcode'";
            $run_course = mysqli_query($con, $selectcourse);
            if($run_course){
                if($run_course && mysqli_num_rows($run_course) > 0 ){
                    while($row = mysqli_fetch_array($run_course))
                    {
                        
                        $campus_code = $row['campus_code'];
                        $course_code = $row['course_code'];
                        $year = $row['year'];
                        $code = $row['section_letter'];
                        $studentcount = $row['studentcount'];
                        $sectionname="$campus_code$course_code-$year$code";
                        echo "<div> <div><h3> $sectionname <br><span style='font-size: .8em;'> Number Of Students: &nbsp; $studentcount </span></h3></div> <div> <ul><li><a href='masterlist.php?sec=$sectionname'><i class='fas fa-list'></i> &nbsp; Master List</a></li>  <li><a href=''><i class='fas fa-calendar-alt'></i> &nbsp; Schedule </a></li></ul></div></div>";
                        
                    }
                }
            }
        ?>
        
    </div>
    </div>
</div>