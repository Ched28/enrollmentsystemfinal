<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("config/dbcon.php");
include_once("config/enc_dec.php");

$id = $_GET['id'];
$dec = qcu_decrypt($id);

function getYear($con, $campuscode){

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
            $c
        }
    }
}
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
                        <td colspan="2"> <h1> 21-0001</h1></td>
                    </tr>
                    <tr>
                        <td>  LAST NAME:</td>
                        <td>  </td>
                        <td>  SECTION:</td>
                        <td> </td>
                        
                    </tr>
                    <tr>
                        <td>  FIRST NAME:</td>
                        <td>  </td>
                        <td>  CATEGORY:</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>  MIDDLE NAME:</td>
                        <td>  </td>
                        <td>  CAMPUS:</td>
                        <td> </td>
                        
                    </tr>
                    <tr>
                    <td>  YEAR:</td>
                        <td> </td>
                    <td>  COURSE:</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> REGFORM</td>
                        <td> <a href=""> VIEW PDF</a></td>
                        <td> SEND EMAIL</td>
                        <td> <a href=""> SEND </a></td>
                    </tr>
                    

                </table>
        </div>
    </div>
</div>