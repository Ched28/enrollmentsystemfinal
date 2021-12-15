<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("../config/dbcon.php");


$sectionname = $_GET['sec'];
$sem = $sem1;
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
    | <span style="font-size: 1em;">      <a href="section_subjlist.php?sec=<?php echo $sectionname;?>" style="text-decoration:none;color: black;">  Go to Subject List</a></span>
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
    <th>Start of Schedule</th>
    <th>End of The Schedule</th>
    
    <th>Category</th>

    <th></th>
</tr>
<tbody id="enrollees_data">

     
    <?php 
    $course_code = substr($sectionname, 2,2);
    $year = substr($sectionname, 5,1);
    $sem = $sem1;
        $select_genacc = "SELECT `genacc_year`.`subjectcode`, `genacc_subject`.`subjecttitle`, `genacc_subject`.`units`, `schedule_table`.`day`, `schedule_table`.`timestart`, `schedule_table`.`timestop`, `schedule_table`.`schedule_cat` FROM `schedule_table` INNER JOIN `genacc_subject` ON `schedule_table`.`subjectcode` = `genacc_subject`.`subjectcode` INNER JOIN `genacc_year` ON `genacc_subject`.`subjectcode` = `genacc_year`.`subjectcode` WHERE `schedule_table`.`sectionname` = '$sectionname' AND `genacc_year`.`year` = '$year' AND `genacc_year`.`sem` = '$sem';";
        $run_selectgenacc = mysqli_query($con, $select_genacc);
        if($run_selectgenacc){
            if($run_selectgenacc && mysqli_num_rows($run_selectgenacc) > 0){
                while($row4 = mysqli_fetch_array($run_selectgenacc)){
                    $subjectcode = $row4['subjectcode'];
                    $subjecttitle = $row4['subjecttitle'];
                    $units = $row4['units'];
                    $day = $row4['day'];
                    $timestart = $row4['timestart'];
                    $timestop = $row4['timestop'];
                    $schedule_cat = $row4['schedule_cat'];
                    ?>
                    <tr>
                    <td><?php echo $subjectcode; ?></td>
                    <td><?php echo $subjecttitle; ?></td>
                    <td><?php echo $units; ?></td>
                    <td><?php echo $day; ?></td>
                    <td><?php echo $timestart; ?></td>
                    <td><?php echo $timestop; ?></td>
                    <td><?php echo $schedule_cat; ?></td>
               
                    </tr>
                    <?php 
                    
                }
            }
        }

        $select_short = selectshortCourse($con, $course_code);
        $course_leg = "_subject";
        $coursefinal = $select_short . $course_leg;
        $select_course_sub = "SELECT `$coursefinal`.`subjectcode`, `$coursefinal`.`subjecttitle`, `$coursefinal`.`units`, `schedule_table`.`day`, `schedule_table`.`timestart`, `schedule_table`.`timestop`, `schedule_table`.`schedule_cat` FROM `schedule_table` INNER JOIN `$coursefinal` ON `schedule_table`.`subjectcode` = `$coursefinal`.`subjectcode` WHERE `schedule_table`.`sectionname` = '$sectionname' AND `$coursefinal`.`year` = '$year' AND `$coursefinal`.`sem` = '$sem';";
        $run_select_course = mysqli_query($con, $select_course_sub);
                    if($run_select_course){
                        if($run_select_course && mysqli_num_rows($run_select_course) > 0){
                            while($row6 = mysqli_fetch_array($run_select_course)){
                                $subjectcode = $row6['subjectcode'];
                                $subjecttitle = $row6['subjecttitle'];
                                $units = $row6['units'];
                                $day = $row6['day'];
                                $timestart = $row6['timestart'];
                                $timestop = $row6['timestop'];
                                $schedule_cat = $row6['schedule_cat'];
                                ?>
                                <tr>
                                <td><?php echo $subjectcode; ?></td>
                                <td><?php echo $subjecttitle; ?></td>
                                 <td><?php echo $units; ?></td>
                                <td><?php echo $day; ?></td>
                                <td><?php echo $timestart; ?></td>
                                <td><?php echo $timestop; ?></td>
                                <td><?php echo $schedule_cat; ?></td>
                                
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