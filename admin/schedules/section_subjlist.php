<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("../config/dbcon.php");


$sectionname = $_GET['sec'];
$sem = 1;
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
    <div class="enrollees">
    <div class="head-master">
    <div>
    <h1><?php echo $sectionname;?> SUBJECTS </h1>
    | <span style="font-size: 1em;"> Semester: <?php echo $sem?></span>
    </div>
    <div>
    <form method="POST" action="config/exporttoexcel.php?id=<?php echo $sectionname;?>">
    <ul>
       
    <li><button type="submit" name="excelbtn"><i class="fas fa-file-excel"></i> EXPORT TO EXCEL </button> </li>
    <li> <button type="submit" name="pdfbtn" formtarget="_blank" formaction= "config/exporttopdfmasterlist.php?id=<?php echo $sectionname;?>"><i class="fas fa-file-pdf"></i> PRINT AS PDF </button>  </li>
       
     </ul>
     </form>
    </div>
    </div>
    <div class="con">
<table>
<tr>
    <th>Subject Code </th>
    <th>Subject Title</th>
    <th>Units</th>
    <th>Day</th>
    <th>Lecture Time</th>
    <th>Laboratory Time </th>
    <th></th>

    <th></th>
</tr>
<tbody id="enrollees_data">

     
    <?php 
    $course_code = substr($sectionname, 2,2);
    $year = substr($sectionname, 5,1);
    $sem = 1;
        $select_genacc = "SELECT `genacc_year`.`subjectcode`, `genacc_subject`.`subjecttitle`, `genacc_subject`.`units` FROM `genacc_year` INNER JOIN `genacc_subject` ON `genacc_year`.`subjectcode` = `genacc_subject`.`subjectcode` WHERE `genacc_year`.`course_code` = '$course_code' AND `genacc_year`.`year` = '$year' AND `genacc_year`.`sem` = '$sem';";
        $run_selectgenacc = mysqli_query($con, $select_genacc);
        if($run_selectgenacc){
            if($run_selectgenacc && mysqli_num_rows($run_selectgenacc) > 0){
                while($row4 = mysqli_fetch_array($run_selectgenacc)){
                    $subjectcode = $row4['subjectcode'];
                    $subjecttitle = $row4['subjecttitle'];
                    $units = $row4['units'];
                    ?>
                    <tr>
                    <td><?php echo $subjectcode; ?></td>
                    <td><?php echo $subjecttitle; ?></td>
                    <td><?php echo $units; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="addschedule.php?subj=<?php echo $subjectcode?>&sec=<?php echo $sectionname; ?>&cour=genacc"> UPDATE </a></td>
                    </tr>
                    <?php 
                    
                }
            }
        }

        $select_short = selectshortCourse($con, $course_code);
        $course_leg = "_subject";
        $coursefinal = $select_short . $course_leg;
        $select_course_sub = "SELECT * FROM `$coursefinal` WHERE `year` = '$year' AND `sem`= '$sem'";
        $run_select_course = mysqli_query($con, $select_course_sub);
                    if($run_select_course){
                        if($run_select_course && mysqli_num_rows($run_select_course) > 0){
                            while($row6 = mysqli_fetch_array($run_select_course)){
                                $subjectcode = $row6['subjectcode'];
                                $subjecttitle = $row6['subjecttitle'];
                                $units = $row6['units'];
                                ?>
                                <tr>
                                <td><?php echo $subjectcode; ?></td>
                                <td><?php echo $subjecttitle; ?></td>
                                <td><?php echo $units; ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="addschedule.php?subj=<?php echo $subjectcode;?>&sec=<?php echo $sectionname; ?>&cour=<?php echo $select_short;?>"> UPDATE </a></td>
                                </tr>
                                <?php 

                                
                            }
                        }
                    }

    ?>

</tbody>
</div>

</div>
</div>