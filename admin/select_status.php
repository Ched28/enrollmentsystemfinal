<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("config/dbcon.php");
include_once("config/enc_dec.php");

$id = $_GET['id'];
$dec = qcu_decrypt($id);

function selectcourse($con, $firstcourse){
    $select_course = "SELECT * FROM `course` WHERE coursename = '$firstcourse';";
            $run_course = mysqli_query($con, $select_course);
            if($run_course){
                if($run_course && mysqli_num_rows($run_course) > 0){
                    while($row2 = mysqli_fetch_array($run_course)){
                        $courseshort = $row2['courseshort'];

                        return $courseshort;
                    }
                }
            }
  
}

$select_status = "SELECT studentapprovals.StudentID, `studentinfo`.`FullName-Last`, `studentinfo`.`FullName-First`, `studentinfo`.`FullName-Middle`, studentenrollmentinfo.category, studentenrollmentinfo.firstcourse, studentenrollmentinfo.campus, student_sections.sectionname FROM studentapprovals INNER JOIN studentinfo ON studentapprovals.StudentID = studentinfo.StudentID INNER JOIN studentenrollmentinfo ON studentinfo.StudentID = studentenrollmentinfo.StudentID INNER JOIN student_sections ON studentenrollmentinfo.StudentID = student_sections.StudentID WHERE studentapprovals.StudentID = '$dec'";
$run_select = mysqli_query($con, $select_status);
if($run_select){
    if($run_select && mysqli_num_rows($run_select) > 0){
        while($row = mysqli_fetch_array($run_select)){
            $stid = $row['StudentID'];
            $lastname = $row['FullName-Last'];
            $firstname = $row['FullName-First'];
            $middlename = $row['FullName-Middle'];
            $category = $row['category'];
            $campus = $row['campus'];
            $sectionname = $row['sectionname'];
            $firstcourse = $row['firstcourse'];
            $course = selectcourse($con, $firstcourse);
            $year = substr($sectionname, 5,1);
            $code = substr($sectionname, 6,1);

            ?>
<div class="content">
    <div class="approval-form">
        <div class="headapp">
            <h1> STUDENT INFORMATION SUMMARY </h1>
        </div>
        <div class="appbody">
                <table style="padding: 2em;">
                    <tr>
                        <td colspan="2"> <h1> Student ID: </h1></td>
                        <td colspan="2"> <h1> <?php echo $stid; ?></h1></td>
                    </tr>
                    <tr>
                        <td>  LAST NAME:</td>
                        <td>  <?php echo $lastname;?></td>
                        <td>  SECTION:</td>
                        <td> <a href="select_sections.php?sec=<?php echo $sectionname;?>"><?php echo $sectionname;?></a></td>
                        
                    </tr>
                    <tr>
                        <td>  FIRST NAME:</td>
                        <td>  <?php echo $firstname;?></td>
                        <td>  CATEGORY:</td>
                        <td>   <?php echo $category; ?></td>
                    </tr>
                    <tr>
                        <td>  MIDDLE NAME:</td>
                        <td>  <?php echo $middlename;?></td>
                        <td>  CAMPUS:</td>
                        <td> <?php echo $campus;?></td>
                        
                    </tr>
                    <tr>
                    <td>  YEAR:</td>
                        <td> <?php echo "$year$code";?></td>
                    <td>  COURSE:</td>
                        <td> <?php echo $course;?></td>
                    </tr>
                    <tr>
                        <td> REGFORM</td>
                        <td> <a href=""> CREATE PDF</a></td>
                        <td> SEND EMAIL</td>
                        <td> <a href=""> SEND </a></td>
                    </tr>
                    

                </table>
        </div>
    </div>
</div>
<?php
}
    }
}
?>