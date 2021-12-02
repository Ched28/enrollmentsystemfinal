<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("config/dbcon.php");

?>
<div class="content">
    <div class="section-dashboard">
    <div class="headsec">
        <h1> CAMPUS </h1>
    </div>
    <div class="secbody secbody-campus">
        <?php 
            $selectcampus = "SELECT * FROM campus";
            $run_campus = mysqli_query($con, $selectcampus);
            if($run_campus){
                if($run_campus && mysqli_num_rows($run_campus) > 0 ){
                    while($row = mysqli_fetch_array($run_campus))
                    {
                        $campusname = $row['campus_name'];
                        $campuscode = $row['campus_code'];

                        echo "<div><a href='campus_course.php?campcode=$campuscode'><h2> $campusname</h2></a></div>";

                    }
                }
            }
        ?>
        
    </div>
    </div>
</div>