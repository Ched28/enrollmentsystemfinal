<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("../config/dbcon.php");

$course1 = $_GET['cour'];

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


<div class="view-curr">
    <div class="view-head">
    <div class="logo">
        <?php 
            $select = "SELECT * FROM `course` WHERE `course_code`='$course1'";
            $run_course = mysqli_query($con, $select);
            if($run_course){
                while($row = mysqli_fetch_array($run_course)){
                    $coursename = $row['coursename'];
                    $course_code = $row['course_code'];
                    $courseshort = $row['courseshort'];
                    $courseimg = $row['img'];
           
        ?>
                <img class="qculogo"  src="../config/img/<?php echo $courseimg?>"> &nbsp;&nbsp;&nbsp;
                    <h3> <?php echo $coursename ?> |<span style="font-size:15px;">  Curriculum </span></h3>
                    <?php 
     }
    }
                    ?>
                    
                    
            </div>
            <table>
                     
                        <tr>
                            <th>SCHOOL YEAR:</th>
                            <td> 2021 - 2022</td>
                            <?php 
                                $selectcounts = "SELECT COUNT(`sections`.`course_code`) as sectionscount , SUM(`sections`.`studentcount`) as studentcount  FROM sections WHERE `sections`.`course_code` = '$course_code'";
                                $run_selectcouts = mysqli_query($con, $selectcounts);
                                if($run_selectcouts){
                                        if($run_selectcouts && mysqli_num_rows($run_selectcouts) > 0){
                                            while($row2 = mysqli_fetch_array($run_selectcouts)){
                                                $sectionscount = $row2['sectionscount'];
                                                $studentcount = $row2['studentcount'];

                                                echo "<th>TOTAL NO. OF SECTIONS: </th><td>$sectionscount</td><th>TOTAL NO. OF STUDENTS</th><td>$studentcount</td>";
                                            }
                                        }
                                }
                            ?>

                        </tr>
                        
                    </table>
    </div>
    <div class="view-body1">
    <h1> Major Subjects </h1> 
        <table>
            <tr>
                <th>Subject Code</th>
                <th> Units </th>
                <th> Year</th>
                <th> Semester</th>
            </tr>
            
                <?php 
                    $select_short = selectshortCourse($con, $course_code);
                    $course_leg = "_subject";
                    $coursefinal = $select_short . $course_leg;
                    $select_course_sub = "SELECT * FROM `$coursefinal`";
                    $run_select_course = mysqli_query($con, $select_course_sub);
                    if($run_select_course){
                        if($run_select_course && mysqli_num_rows($run_select_course) > 0){
                            while($row6 = mysqli_fetch_array($run_select_course)){
                                $subjectcode = $row6['subjectcode'];
                                $units = $row6['units'];
                                $year = $row6['year'];
                                $sem =  $row6['sem'];

                                echo "<tr><td>$subjectcode</td><td>$units</td><td>$year</td><td>$sem</td></tr>";

                                
                            }
                        }else{
                            echo "THERE ARE NO SUBJECTS! ";
                        }
                    }
                ?>
            
        </table>
    </div>
    <div class="view-body2">
    <h1> Minor Subjects </h1>
    <table>
            <tr>
                <th>Subject Code</th>
                <th> Units </th>
                <th> Year</th>
                <th> Semester</th>
            </tr>
            <?php 
                $select_gen_year = "SELECT * FROM `genacc_year` WHERE `course_code` = '$course_code'";
                $run_sgy = mysqli_query($con,$select_gen_year);
                if($run_sgy){
                    if($run_sgy && mysqli_num_rows($run_sgy) > 0){
                        while($row7 = mysqli_fetch_array($run_sgy)){
                            $subjectcode1 = $row7['subjectcode'];
                            $units1 = $row7['units'];
                            $year1 = $row7['year'];
                            $sem1 =  $row7['sem'];
                            echo "<tr><td>$subjectcode1</td><td>$units1</td><td>$year1</td><td>$sem1</td></tr>";

                        }
                    }else{
                        echo "THERE ARE NO SUBJECTS! ";
                    }
                }
            
            ?>
        </table>
    </div>
    <?php if($_SESSION['auth'] == 2){ ?>
    <div class="view-body3">
    <form method="POST" action="editingcurriculum.php?cour=<?php echo $course1?>">
        <div class="view-table1">
        <h3>EDIT CURRICULUM FOR MINOR SUBJECT</h3>
            <h4 style="text-align: left;"> CHOOSE SUBJECTS </h4>
            <table>
                
                <tr>
                    
                    <th></th>
                    <th>Subject Title</th>
                    <th>Subject Code</th>
                    
                    <th>Unit</th>
                    <th> Prerequisite </th>
                    
                </tr>
                <?php 
                    $select_gen = "SELECT * FROM `genacc_subject`";
                    $run_select_gen= mysqli_query($con, $select_gen);
                    if($run_select_gen){
                        if($run_select_gen && mysqli_num_rows($run_select_gen) > 0){
                            while($row8 = mysqli_fetch_array($run_select_gen)){
                                $subjecttitle = $row8['subjecttitle'];
                                $subjectcode = $row8['subjectcode'];
                                $units = $row8['units'];
                                $prere = $row8['prerequisite'];

                                echo "<tr><td><input type='checkbox' name='subj[]' value='$subjectcode' style='width: 16px;height: 24px;'></td><td>$subjecttitle</td><td>$subjectcode</td><td>$units</td><td>$prere</td><tr>"; 
                            }
                        }
                    }
                ?>
                
            </table>
           
                   
                    
            
                
        </div>
        <div class="view-table2">
                <table>
                    <tr>
                        <td>
                            SEMESTER
                        </td>
                        <td>
                            <select name="sem" id="">
                                <option value="1"> 1st Semester </option>
                                <option value="2"> 2nd Semester </option>
                            </select>
                        </td>
                        <td>
                            YEAR
                        </td>
                        <td>
                        <select name="year" id="">
                                <option value="1"> 1st Year </option>
                                <option value="2"> 2nd Year </option>
                                <option value="3"> 3rd Year </option>
                                <option value="4"> 4th Year </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"><button type="submit" name="entercurr" style="background-color:#00AC17;"> EDIT </button></td>
                        
                    </tr>
                </table>
        </div>
        </form>
      
    </div>

    <?php }?>
</div>
</div>