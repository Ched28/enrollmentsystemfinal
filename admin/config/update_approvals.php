<?php 
include_once("dbcon.php");
include_once("enc_dec.php");
$id = $_GET['id'];

$enrollnumber = qcu_decrypt($id);
$enrollmentyear = date("y");
if(isset($_POST['update'])){
$approval = mysqli_real_escape_string($con,$_POST['approvals']);
$remarks = mysqli_real_escape_string($con,$_POST['remarks']);

if($approval == "APPROVED"){
$selectstudentid = "SELECT * FROM `student_sections` ORDER BY ID DESC LIMIT 1;";
$select_idrun = mysqli_query($con,$selectstudentid);
if($select_idrun){
    if($select_idrun && mysqli_num_rows($select_idrun) > 0){
        while($row = mysqli_fetch_array($select_idrun)){
            $tempid = $row['StudentID'];
            $get_numbers = str_replace("$enrollmentyear-", "", $tempid);
            $inc_number = $get_numbers+1;
            $get_string = str_pad($inc_number, 4, 0, STR_PAD_LEFT);
            $studentid = "$enrollmentyear-$get_string";
            $inc = qcu_encrypt($studentid);
            //echo $studentid;
            $tempsection = $row['sectionname'];
            //
            
            $update1 = "UPDATE `studentinfo` SET `StudentID` = '$studentid' WHERE `studentinfo`.`enrollnumber` = '$enrollnumber';";
            $update2 = "UPDATE `studentenrollmentinfo` SET `StudentID` = '$studentid' WHERE `studentenrollmentinfo`.`enrollnumber` = '$enrollnumber';";
            $update3 = "UPDATE `studenteducationalinfo` SET `StudentID` = '$studentid' WHERE `studenteducationalinfo`.`enrollnumber` = '$enrollnumber';";
            $update4 = "UPDATE `studentapprovals` SET `StudentID`='$studentid',`Approval`='$approval',`remarks`='$remarks' WHERE `studentapprovals`.`enrollnumber` = '$enrollnumber';";
            $update5 = "UPDATE `student_examresult` SET `StudentID`='$studentid' WHERE `student_examresult`.`enrollnumber` = '$enrollnumber';";
            $query = $update1;
            $query .= $update2;
            $query .= $update3;
            $query .= $update4;
            $query .= $update5;


            $updatequeries = $con->multi_query($query);

            if($updatequeries){

                echo "<script>location.replace('selectionofsetions.php?stid=$inc');</script>";
            }
            
            



        }

    }else{
        $studentint = 1;
        
        $studentid = "$enrollmentyear-000$studentint";
        $inc = qcu_encrypt($studentid);
        $update1 = "UPDATE `studentinfo` SET `StudentID` = '$studentid' WHERE `studentinfo`.`enrollnumber` = '$enrollnumber';";
        $update2 = "UPDATE `studentenrollmentinfo` SET `StudentID` = '$studentid' WHERE `studentenrollmentinfo`.`enrollnumber` = '$enrollnumber';";
        $update3 = "UPDATE `studenteducationalinfo` SET `StudentID` = '$studentid' WHERE `studenteducationalinfo`.`enrollnumber` = '$enrollnumber';";
        $update4 = "UPDATE `studentapprovals` SET `StudentID`='$studentid',`Approval`='$approval',`remarks`='$remarks' WHERE `studentapprovals`.`enrollnumber` = '$enrollnumber';";
        $update5 = "UPDATE `student_examresult` SET `StudentID`='$studentid' WHERE `student_examresult`.`enrollnumber` = '$enrollnumber';";

        $query1 = $update1;
        $query1 .= $update2;
        $query1 .= $update3;
        $query1 .= $update4;
        $query1 .= $update5;


        $updatequeries1 = $con->multi_query($query1);

        if($updatequeries1){
            echo "<script>location.replace('selectionofsetions.php?stid=$inc');</script>";
        }

        
}
}
}
}
?>