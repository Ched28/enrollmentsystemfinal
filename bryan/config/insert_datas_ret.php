<?php


session_start();
include_once('dbcon.php');
include_once("enc_dec.php");
$id = $_GET['id'];

if(isset($_POST['submit'])){
    
    $student_id = strtoupper(mysqli_real_escape_string($con,$_POST['student_id_place']));

    //returnee documents 
    
    $TrueCopyofGrades = $_FILES['TrueCopyofGrades']['name'];
    $TrueCopyofGrades_temp = $_FILES['TrueCopyofGrades']['tmp_name'];
    $BarangayClearance = $_FILES['BarangayClearance']['name'];
    $BarangayClearance_temp = $_FILES['BarangayClearance']['tmp_name'];
    $MedicalClearance = $_FILES['MedicalClearance']['name'];
    $MedicalClearance_temp = $_FILES['MedicalClearance']['tmp_name'];
    $IDPicture = $_FILES['IDPicture']['name'];
    $IDPicture_temp = $_FILES['IDPicture']['tmp_name'];
    $PSA = $_FILES['PSA']['name'];
    $PSA_temp = $_FILES['PSA']['tmp_name'];
    

    //enrollmentstatus 

    $course = strtoupper(mysqli_real_escape_string($con,$_POST['course']));
    $yrlevel = strtoupper(mysqli_real_escape_string($con,$_POST['yrlevel']));

    //ExamCode

    $dec = qcu_decrypt($id);
    $ExamCode = $dec;

    
    // queries
    //     $insertsql1 = "INSERT INTO `studentinfo`(`StudentID`, `FullName-Last`, `FullName-First`, `FullName-Middle`, `Age`, `birthday`, `birthplace`, `civilstatus`, `gender`, `contactno`, `email`, `address-name`, `zip_code`, `mothername`, `motherjob`, `fathername`, `fatherjob`, `guardianname`, `relationship`, `guardiancontactno`) VALUES ();";
    //     $select1 = "SELECT `StudentID` FROM `studentinfo`;";
    //$insertsql2 = "INSERT INTO `studenteducationalinfo`(`StudentID`, `schoollastattended`, `schoollastattendedaddress`, `schoollastattendedlevel`) VALUES ();";
   // $insertsql3 = "INSERT INTO `studentenrollmentinfo`(`ID`, `StudentID`, `category`, `firstcourse`, `secondcourse`, `thirdcourse`) VALUES ();";
//mysqli_real_escape_string($con,
    $enrollmentyear = date("y");
    

    //select student id 
    $select1 = "SELECT * FROM `studentinfo` ORDER BY ID DESC LIMIT 1;";
    $checkresult = mysqli_query($con, $select1);
    if(mysqli_num_rows($checkresult)>0){
        if($row = mysqli_fetch_assoc($checkresult)){
            $tempid = $row['StudentID'];
            $get_numbers = str_replace("$enrollmentyear-", "", $tempid);
            $inc_number = $get_numbers+1;
            $get_string = str_pad($inc_number, 4, 0, STR_PAD_LEFT);
            $studentid = "$enrollmentyear-$get_string";
            $remarks = "Information has been recorded";
            /*	$insertsql1 = "INSERT INTO `studentinfo`(`StudentID`, `FullName-Last`, `FullName-First`, `FullName-Middle`, `Age`, `birthday`, `birthplace`, `civilstatus`, `gender`, `contactno`, `email`, `address-name`, `zip_code`, `mothername`, `motherjob`, `fathername`, `fatherjob`, `guardianname`, `relationship`, `guardiancontactno`) VALUES ('$studentid', '$FullName_Last', '$FullName_First', '$FullName_Middle', '$Age', '$birthday', '$birthplace', '$civilstatus', '$gender', '$contactno', '$email', '$address_name', '$zip_code', '$mothername', '$motherjob', '$fathername', '$fatherjob', '$guardianname', '$relationship', '$guardiancontactno');";
            $insertsql2 = "INSERT INTO `studenteducationalinfo`(`StudentID`, `schoollastattended`, `schoollastattendedaddress`, `schoollastattendedlevel`) VALUES ('$studentid', '$schoollastattended', '$schoollastattendedaddress', '$schoollastattendedlevel');";
            $insertsql3 = "INSERT INTO `studentenrollmentinfo`(`StudentID`, `category`, `firstcourse`, `secondcourse`, `thirdcourse`) VALUES ('$studentid', '$category', '$firstcourse', '$secondcourse', '$thirdcourse');";	*/
            $insertfile = "INSERT INTO `returneesdocumentsneed`(`StudentID`, `Course`, `YrLevel`, `PSA`, `TrueCopyofGrades`, `BarangayClearance`, `MedicalClearance`, `IDPicture`) VALUES ('$student_id', '$course', '$yrlevel', '$PSA', '$TrueCopyofGrades', '$BarangayClearance', '$MedicalClearance', '$IDPicture');";
            $insertExamCodee = "INSERT INTO `student_examresult`(`StudentID`, `ExamCode`) VALUES ('$student_id','$ExamCode');";
            $insertapproved = "INSERT INTO `studentapprovals`(`StudentID`,`remarks`) VALUES ('$student_id','$remarks');";
            //	$query = $insertsql1;
            //	$query .=$insertsql2;
            //	$query .=$insertsql3;
            $query .=$insertExamCodee;
            $query .=$insertfile;
            $query .=$insertapproved;
            $insertqueries = $con->multi_query($query);
            $location = "../../files/$studentid/";
            if(!file_exists($location)){
            mkdir($location,0777,true);
            }
            if ($insertqueries){
                move_uploaded_file($PSA_temp, $location.$PSA);
                move_uploaded_file($TrueCopyofGrades_temp, $location.$TrueCopyofGrades);
                move_uploaded_file($BarangayClearance_temp, $location.$BarangayClearance);
                move_uploaded_file($MedicalClearance_temp, $location.$MedicalClearance);
                move_uploaded_file($IDPicture_temp, $location.$IDPicture);


            }else{

                echo "<script> alert('error moving file');</script>";
            }

        
        }
        else{
            echo "<script> alert('error checkresult');</script>";
        }
    } else{
        $studentidint = 1;
        $studentid = "$enrollmentyear-000$studentidint";
        $remarks = "Information has been recorded";
        /*	$insertsql1 = "INSERT INTO `studentinfo`(`StudentID`, `FullName-Last`, `FullName-First`, `FullName-Middle`, `Age`, `birthday`, `birthplace`, `civilstatus`, `gender`, `contactno`, `email`, `address-name`, `zip_code`, `mothername`, `motherjob`, `fathername`, `fatherjob`, `guardianname`, `relationship`, `guardiancontactno`) VALUES ('$studentid', '$FullName_Last', '$FullName_First', '$FullName_Middle', '$Age', '$birthday', '$birthplace', '$civilstatus', '$gender', '$contactno', '$email', '$address_name', '$zip_code', '$mothername', '$motherjob', '$fathername', '$fatherjob', '$guardianname', '$relationship', '$guardiancontactno');";
            $insertsql2 = "INSERT INTO `studenteducationalinfo`(`StudentID`, `schoollastattended`, `schoollastattendedaddress`, `schoollastattendedlevel`) VALUES ('$studentid', '$schoollastattended', '$schoollastattendedaddress', '$schoollastattendedlevel');";
            $insertsql3 = "INSERT INTO `studentenrollmentinfo`(`StudentID`, `category`, `firstcourse`, `secondcourse`, `thirdcourse`) VALUES ('$studentid', '$category', '$firstcourse', '$secondcourse', '$thirdcourse');";	*/
            $insertfile = "INSERT INTO `returneesdocumentsneed`(`StudentID`, `Course`, `YrLevel`, `PSA`, `TrueCopyofGrades`, `BarangayClearance`, `MedicalClearance`, `IDPicture`) VALUES ('$student_id', '$course', '$yrlevel', '$PSA', '$TrueCopyofGrades', '$BarangayClearance', '$MedicalClearance', '$IDPicture');";
        $insertExamCodee = "INSERT INTO `student_examresult`(`StudentID`, `ExamCode`) VALUES ('$student_id','$ExamCode');";
        $insertapproved = "INSERT INTO `studentapprovals`(`StudentID`,`remarks`) VALUES ('$student_id','$remarks');";
        //	$query = $insertsql1;
        //	$query .=$insertsql2;
        //	$query .=$insertsql3;
        $query .=$insertExamCodee;
        $query .=$insertfile;
        $query .=$insertapproved;
        $location = "../../files/$studentid/";
            if(!file_exists($location)){
            mkdir($location,0777,true);
            }

        if ($insertqueries = $con->multi_query($query)){
                move_uploaded_file($PSA_temp, $location.$PSA);
                move_uploaded_file($TrueCopyofGrades_temp, $location.$TrueCopyofGrades);
                move_uploaded_file($BarangayClearance_temp, $location.$BarangayClearance);
                move_uploaded_file($MedicalClearance_temp, $location.$MedicalClearance);
                move_uploaded_file($IDPicture_temp, $location.$IDPicture);

        }else{

            echo "<script> alert('error moving file');</script>";
        }

    }
    sleep(10);
    echo "<script> location.replace('../success.php');</script>";

}
?>
