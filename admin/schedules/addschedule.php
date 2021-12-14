<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("../config/dbcon.php");

$subj = $_GET['subj'];
$sectioname = $_GET['sec'];
$courshort = $_GET['cour'];
function getLecHours($con, $subj, $courshort){
    $select_short = $courshort;
    $course_leg = "_subject";
    $coursefinal = $select_short . $course_leg;
    $select_sub = "SELECT * FROM `$coursefinal` WHERE `subjectcode` = '$subj'";
    $run = mysqli_query($con, $select_sub);
    if($run){
        while($row = mysqli_fetch_array($run)){
            $lec = $row['lec'];

            return $lec;
        }   
    }

}
function getLabHours($con, $subj, $courshort){
    $select_short = $courshort;
    $course_leg = "_subject";
    $coursefinal = $select_short . $course_leg;
    $select_sub = "SELECT * FROM `$coursefinal` WHERE `subjectcode` = '$subj'";
    $run = mysqli_query($con, $select_sub);
    if($run){
        while($row = mysqli_fetch_array($run)){
            $lab = $row['lab'];
            return $lab;
        }   
    }

}

if(isset($_POST['entersched'])){
    $day = mysqli_real_escape_string($con,$_POST['day']);
    $lec = mysqli_real_escape_string($con,$_POST['lec']);
    $lab = mysqli_real_escape_string($con,$_POST['lab']);
    $lechours = getLecHours($con, $subj, $courshort);
    $labhours = getLabHours($con, $subj, $courshort);
    $firstlec = date('g:i a', strtotime($lec));
    $firstlab = date('g:i a', strtotime($lab));
    $finallec = date('g:i a',strtotime('+'.$lechours.' hour',strtotime($lec)));
    $finallab = date('g:i a',strtotime('+'.$labhours.' hour',strtotime($lab)));
    $subj1 = $subj;
   // $lec1 = $firstlec . "-" . $finallec;
    //$lab1 = $firstlab . "-" . $finallab; 
    $insertsched = "INSERT INTO `schedule_table`(`sectionname`, `subjectcode`, `day`, `timestart`, `timestop`, `schedule_cat`) VALUES ('$sectioname','$subj1','$day','$firstlec','$finallec', 'lec')";
    $run_insert = mysqli_query($con, $insertsched);
    if($run_insert){
        if($labhours != 0){
            $insertsched1 = "INSERT INTO `schedule_table`(`sectionname`, `subjectcode`, `day`, `timestart`, `timestop`, `schedule_cat`) VALUES ('$sectioname','$subj1','$day','$firstlab','$finallab', 'lab')";
            $run_insert1 = mysqli_query($con, $insertsched1);
            if($run_insert1){
                echo "<script>alert('Inserted Data Success');</script>";
            }else{
                echo "<script>alert('Inserted Data Success(LEC)');</script>";
            }
        }
       
    }else{
        echo "<script>alert('Error Inserted Data ');</script>";
    }
}
?>
<div class="content">
<div class="addsubject-main">
        <div class="addsubject-header">
            <h1>UPDATE SCHEDULE</h1>
            <hr>
        </div>
        <div class="addsubject-body">
            <form action="" method="post" enctype="multipart/form-data">
                <table style="width:100%;">
                    <tr>
                        <th>Subject </th>
                        <td>
                            <p><?php echo $subj;?></p>
                        </td>
                        <th>
                            Section
                        </th>
                        <td>
                            <p><?php echo $sectioname;?></p>
                        </td>
                        <th>
                            Subject Group: 
                        </th>
                        <td>
                          <p>  <?php echo $courshort;?></p>
                        </td>
                    </tr>
                    <tr>
                        <th> DAY </th>
                        <td> <select name="day" id="">
                            <option value="M"> Monday </option>
                            <option value="T"> Tuesday </option>
                            <option value="W"> Wednesday</option>
                            <option value="Th">Thursday</option>
                            <option value="F">Friday</option>
                            <option value="S">Saturday</option>
                        </select></td>
                        <th>LECTURE </th>
                        <td><input type="time" name="lec"></td>
                        <th> LABORATORY </th>
                        <td><input type="time" name="lab"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2"> <button type="submit" name="entersched"> UPDATE SCHEDULE</button></td>
                        
                    </tr>
                </table>
            </form>
</div>
</div>
</div>
