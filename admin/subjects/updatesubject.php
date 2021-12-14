<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("../config/dbcon.php");
$id = $_GET['id'];
$course1 = $_GET['cour'];
function selectshort($con, $course1){

    if($course1 != 'genacc'){
    $selectcourse1 = "SELECT * FROM course WHERE `courseshort` = '$course1'";
    $select_run1 = mysqli_query($con, $selectcourse1);
    if($select_run1){
    while($row = mysqli_fetch_array($select_run1)){
        $course2 = $row['course_code'];
            return $course2;                      
        }
    }
}else{
    $course2 = 'GA';
    return $course2;
}
}
if(isset($_POST['updatesubject'])){
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
        $updategenacad = "UPDATE `genacc_subject` SET `subjectcode`='$subjectcode',`subjecttitle`='$subjecttitle',`units`='$units',`lec`='$lec',`lab`='$lab',`prerequisite`='$prerequisite' WHERE `id` = $id";
        $run_update = mysqli_query($con, $updategenacad);
        if($run_update){
            echo "<script>alert('A Subject has been update');</script>";
        }else{
            echo "<script>alert('Error Entering Subject Details!');</script>";
        }
    }
    else{
        $course1 = strtolower(selectcourse($con, $course));
        $course_leg = "_subject";
        $coursefinal = $course1 . $course_leg;
         $updatesubject = "UPDATE `$coursefinal` SET `subjectcode`='$subjectcode',`subjecttitle`='$subjecttitle',`units`='$units',`lec`='$lec',`lab`='$lab',`prerequisite`='$prerequisite',`year`='$year',`sem`='$sem' WHERE `id` = $id";
         $run_updatesubject = mysqli_query($con, $updatesubject);
         if($run_updatesubject){
             echo "<script>alert('A Subject has been updated');</script>";
         }else{
             echo "<script>alert('Error Entering Subject Details!');</script>";
         }
        
    }
    $course4 = selectshort($con, $course1);
    echo "<script>location.replace('viewsubjects.php?cour=$course4');</script>";
    
}
?>
<div class="content">
    <div class="addsubject-main">
        <div class="addsubject-header">
            <h1>EDIT SUBJECT</h1>
            <hr>
        </div>
        <div class="addsubject-body">
            <form action="" method="post" enctype="multipart/form-data">
            <table>
                <?php
                    
                    if($course1 == "genacc"){
                        

                        $select_gen = "SELECT * FROM `genacc_subject` WHERE `id` = $id LIMIT 1";
                        $run_gen = mysqli_query($con, $select_gen);
                        if($run_gen){
                            if($run_gen && mysqli_num_rows($run_gen) > 0){
                                while($row = mysqli_fetch_array($run_gen)){
                                    $subjectcode = $row['subjectcode'];
                                    $subjecttitle = $row['subjecttitle'];
                                    $units = $row['units'];
                                    $lec = $row['lec'];
                                    $lab = $row['lab'];
                                    $prerequisite = $row['prerequisite'];
                                    $year = '0';
                                    $sem = '0';
                                    
                                
                        ?>
                        
                        <tr>
                        <td colspan="3"> SUBJECT CODE </td>
                        <td colspan="3"> <input type="text"  name="subjectcode" value="<?php echo $subjectcode;?>"></td>
                        </tr>
                        <tr>
                        <td colspan="3"> SUBJECT TITLE </td>
                        <td colspan="3">  <input type="text"  name="subjecttitle" value="<?php echo $subjecttitle;?>"></td>
                        </tr>
                        <tr>
                        <td colspan="3"> PREREQUISITE </td>
                        <td colspan="3"> <input type="text"  name="prerequisite" value="<?php echo $prerequisite;?>"></td>
                        </tr>
                        <tr>
                        <td> UNITS </td>
                        <td> <input type="text"  name="units" value="<?php echo $units;?>"></td>
                        <td> LEC </td>
                        <td> <input type="text"  name="lec" value="<?php echo $lec;?>"></td>
                        <td> LAB </td>
                        <td> <input type="text"  name="lab" value="<?php echo $lab;?>"></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td> YEAR </td>
                        <td> <input type="text"  name="year" value="<?php echo $year;?>"></td>
                        <td> SEM </td>
                        <td> <input type="text"  name="sem" value="<?php echo $sem;?>"></td>
                    
                    
                </tr>
                <tr>
                <td colspan="3"> COURSE  </td> 
                <td colspan="3"> <select name="course" value="" required>
                <option value=" ">PLEASE SELECT COURSE</option>   
                <option value="GENERAL ACADEMIC" selected>GENERAL ACADEMIC</option>  
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
               
            <?php 
            }
                }
            }
                    }else{
                    $course_leg = "_subject";
                    $coursefinal = $course1 . $course_leg; 
                    $select_sub_info = "SELECT * FROM `$coursefinal` WHERE `id` = $id LIMIT 1";
                    $run_sub_info = mysqli_query($con, $select_sub_info);
                    if($run_sub_info){
                        if($run_sub_info && mysqli_num_rows($run_sub_info) > 0){
                            while($row6 = mysqli_fetch_array($run_sub_info)){
                                $subjectcode = $row6['subjectcode'];
                                $subjecttitle = $row6['subjecttitle'];
                                $units = $row6['units'];
                                $lec = $row6['lec'];
                                $lab = $row6['lab'];
                                $prerequisite = $row6['prerequisite'];
                                $year = $row6['year'];
                                $sem = $row6['sem'];


                                ?>
                                 <tr>
                        <td colspan="3"> SUBJECT CODE </td>
                        <td colspan="3"> <input type="text"  name="subjectcode" value="<?php echo $subjectcode;?>"></td>
                        </tr>
                        <tr>
                        <td colspan="3"> SUBJECT TITLE </td>
                        <td colspan="3">  <input type="text"  name="subjecttitle" value="<?php echo $subjecttitle;?>"></td>
                        </tr>
                        <tr>
                        <td colspan="3"> PREREQUISITE </td>
                        <td colspan="3"> <input type="text"  name="prerequisite" value="<?php echo $prerequisite;?>"></td>
                        </tr>
                        <tr>
                        <td> UNITS </td>
                        <td> <input type="text"  name="units" value="<?php echo $units;?>"></td>
                        <td> LEC </td>
                        <td> <input type="text"  name="lec" value="<?php echo $lec;?>"></td>
                        <td> LAB </td>
                        <td> <input type="text"  name="lab" value="<?php echo $lab;?>"></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td> YEAR </td>
                        <td> <input type="text"  name="year" value="<?php echo $year;?>"></td>
                        <td> SEM </td>
                        <td> <input type="text"  name="sem" value="<?php echo $sem;?>"></td>
                    
                    
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
                              $courseshort = strtolower($row['courseshort']);
                                $outpt = "<option value='$course'";
                                if($course1 == $courseshort){
                                    $outpt .=" selected> $course </option>";
                                    echo $outpt;
                                }
                                
                                else{
                                    $outpt .="> $course </option>";
                                    echo $outpt;
                                }
                          }
                        }
                   ?>
                    </select> </td>  
                </tr>
                                <?php 
                            }
                        }
                    }
                    }
                ?>
            <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <button type="submit" name="updatesubject"> UPDATE SUBJECT </button></td>
                    <td> 
                        <?php 
                            $course4 = selectshort($con, $course1);
                        ?>
                    <button type="submit" formaction="viewsubjects.php?cour=<?php echo $course4?>" style="background-color:#c72344;color:white;"> GO BACK  </button></td>
                    
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>