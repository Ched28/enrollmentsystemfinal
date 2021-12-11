<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("../config/dbcon.php");
if(isset($_POST['entersubject'])){
    $subjectcode = mysqli_real_escape_string($con,$_POST['subjectcode']);
    $subjecttitle = mysqli_real_escape_string($con,$_POST['subjecttitle']);
    $prerequisite = mysqli_real_escape_string($con,$_POST['prerequisite']);
    $units = mysqli_real_escape_string($con,$_POST['units']);
    $lec = mysqli_real_escape_string($con,$_POST['lec']);
    $lab = mysqli_real_escape_string($con,$_POST['lab']);
    $year = mysqli_real_escape_string($con,$_POST['year']);
    $sem = mysqli_real_escape_string($con,$_POST['sem']);
    $course = mysqli_real_escape_string($con,$_POST['course']);

    function selectcourse($con, $course){
        $select_course = "SELECT * FROM `course` WHERE coursename = '$course';";
                $run_course = mysqli_query($con, $select_course);
                if($run_course){
                    if($run_course && mysqli_num_rows($run_course) > 0){
                        while($row2 = mysqli_fetch_array($run_course)){
                            $course = $row2['courseshort'];
    
                            return $course;
                        }
                    }
                }
      
    }

    if($course == "GENERAL ACADEMIC"){
        $insertgenacad = "INSERT INTO `genacc_subject`(`subjectcode`, `subjecttitle`, `units`, `lec`, `lab`, `prerequisite`) VALUES ('$subjectcode','$subjecttitle','$units','$lec','$lab','$prerequisite');";
        $run_insert = mysqli_query($con, $insertgenacad);
        if($run_insert){
            echo "<script>alert('A Subject has been added');</script>";
        }else{
            echo "<script>alert('Error Entering Subject Details!');</script>";
        }
    }
    else{
        $course1 = strtolower(selectcourse($con, $course));
        $course_leg = "_subject";
        $coursefinal = $course1 . $course_leg;
         $insertsubject = "INSERT INTO `$coursefinal`(`subjectcode`, `subjecttitle`, `units`, `lec`, `lab`, `prerequisite`, `year`, `sem`) VALUES ('$subjectcode','$subjecttitle','$units','$lec','$lab','$prerequisite','$year','$sem');";
         $run_insertsubject = mysqli_query($con, $insertsubject);
         if($run_insertsubject){
             echo "<script>alert('A Subject has been added');</script>";
         }else{
             echo "<script>alert('Error Entering Subject Details!');</script>";
         }
        //echo "<script>alert('$coursefinal');</script>";
    }
    
}
?>
<div class="content">
    <div class="addsubject-main">
        <div class="addsubject-header">
            <h1>ADD SUBJECT</h1>
            <hr>
        </div>
        <div class="addsubject-body">
            <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td colspan="3"> SUBJECT CODE </td>
                    <td colspan="3"> <input type="text"  name="subjectcode"></td>
                </tr>
                <tr>
                    <td colspan="3"> SUBJECT TITLE </td>
                    <td colspan="3">  <input type="text"  name="subjecttitle"></td>
                </tr>
                <tr>
                    <td colspan="3"> PREREQUISITE </td>
                    <td colspan="3"> <input type="text"  name="prerequisite"></td>
                </tr>
                <tr>
                    <td> UNITS </td>
                    <td> <input type="text"  name="units"></td>
                    <td> LEC </td>
                    <td> <input type="text"  name="lab"></td>
                    <td> LAB </td>
                    <td> <input type="text"  name="lec"></td>
                    
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td> YEAR </td>
                    <td> <input type="text"  name="year"></td>
                    <td> SEM </td>
                    <td> <input type="text"  name="sem"></td>
                    
                    
                </tr>
                <tr>
                <td colspan="3"> COURSE  </td> 
                <td colspan="3"> <select name="course" value="" required>
                <option value=" ">PLEASE SELECT COURSE</option>   
                <option value="GENERAL ACADEMIC">GENERAL ACADEMIC</option>  
                   <?php 
                        $selectcourse = "SELECT * FROM course";
                        $select_run = mysqli_query($con, $selectcourse);
                        if($select_run){
                          while($row = mysqli_fetch_array($select_run)){
                              $course = $row['coursename'];
                                  echo "<option value='$course'> $course </option>";
                          }
                        }
                   ?>
                    </select> </td>  
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="3"> <button type="submit" name="entersubject"> ADD SUBJECT </button></td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>