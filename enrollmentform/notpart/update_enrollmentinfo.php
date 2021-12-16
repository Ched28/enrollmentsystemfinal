<?php 
session_start();
include_once("dbcon.php");
include_once("enc_dec.php");
$id = $_GET['id'];
$dec = qcu_decrypt($id);
function selectENID($con, $dec){
    $selectstudent = "SELECT * FROM `student_examresult` WHERE ExamCode = $dec LIMIT 1";

    $result_student = mysqli_query($con, $selectstudent);
    if(mysqli_num_rows($result_student)>0){
        if($row1 = mysqli_fetch_assoc($result_student)){
            $enrollnumber = $row1['enrollnumber'];
                return $enrollnumber;
        }
    }
    
}

if(isset($_POST['submit'])){
    $enrollnumber = selectENID($con, $dec);
    $firstcourse = strtoupper(mysqli_real_escape_string($con,$_POST['firstcourse']));
    $secondcourse = strtoupper(mysqli_real_escape_string($con,$_POST['secondcourse']));
    $thirdcourse = strtoupper(mysqli_real_escape_string($con,$_POST['thirdcourse']));
    $campus = strtoupper(mysqli_real_escape_string($con,$_POST['campus']));

    $updateenroll = "UPDATE `studentenrollmentinfo` SET `firstcourse`='$firstcourse',`secondcourse`='$secondcourse',`thirdcourse`='$thirdcourse',`campus`='$campus',`updatecount`=1,`needupdate`= 0 WHERE `enrollnumber`='$enrollnumber'";
    $run_update = mysqli_query($con, $updateenroll);
    if($run_update){
        echo "<script>location.replace('../success.php')</script>";
    }

}else{
    echo "<script>alert('Erorr')</script>";
}
?>