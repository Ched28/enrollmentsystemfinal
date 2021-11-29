<?php


session_start();
include_once('dbcon.php');
include_once("enc_dec.php");
$id = $_GET['id'];

if(isset($_POST['submit'])){
    
    $FullName_Last = strtoupper(mysqli_real_escape_string($con,$_POST['FullName-Last']));
    $FullName_First = strtoupper(mysqli_real_escape_string($con,$_POST['FullName-First']));
    $FullName_Middle = strtoupper(mysqli_real_escape_string($con,$_POST['FullName-Middle']));
    $Age = mysqli_real_escape_string($con,$_POST['Age']);
    $birthday = mysqli_real_escape_string($con,$_POST['birthday']);
    $birthplace = strtoupper(mysqli_real_escape_string($con,$_POST['birthplace']));
    $civilstatus = strtoupper(mysqli_real_escape_string($con,$_POST['civilstatus']));
    $gender = strtoupper(mysqli_real_escape_string($con,$_POST['gender']));
    $contactno = mysqli_real_escape_string($con,$_POST['contactno']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $address_name = strtoupper(mysqli_real_escape_string($con,$_POST['address-name']));
    $zip_code = mysqli_real_escape_string($con,$_POST['zip_code']);
    $mothername = strtoupper(mysqli_real_escape_string($con,$_POST['mothername']));
    $motherjob = strtoupper(mysqli_real_escape_string($con,$_POST['motherjob']));
    $fathername = strtoupper(mysqli_real_escape_string($con,$_POST['fathername']));
    $fatherjob = strtoupper(mysqli_real_escape_string($con,$_POST['fatherjob']));
    $guardianname = strtoupper(mysqli_real_escape_string($con,$_POST['guardianname']));
    $relationship = strtoupper(mysqli_real_escape_string($con,$_POST['relationship']));
    $guardiancontactno = mysqli_real_escape_string($con,$_POST['guardiancontactno']);
    //regular documents 
    
    $PSA = $_FILES['PSA']['name'];
    $PSA_temp = $_FILES['PSA']['tmp_name'];
    $Form137 = $_FILES['Form137']['name'];
    $Form137_temp = $_FILES['Form137']['tmp_name'];
    $Form138 = $_FILES['Form138']['name'];
    $Form138_temp = $_FILES['Form138']['tmp_name'];
    $Diploma = $_FILES['Diploma']['name'];
    $Diploma_temp = $_FILES['Diploma']['tmp_name'];
    $GoodMoral = $_FILES['GoodMoral']['name'];
    $GoodMoral_temp = $_FILES['GoodMoral']['tmp_name']; 
    $BarangayClearance = $_FILES['BarangayClearance']['name'];
    $BarangayClearance_temp = $_FILES['BarangayClearance']['tmp_name'];
    $MedicalClearance = $_FILES['MedicalClearance']['name'];
    $MedicalClearance_temp = $_FILES['MedicalClearance']['tmp_name'];
    $IDPicture = $_FILES['IDPicture']['name'];
    $IDPicture_temp = $_FILES['IDPicture']['tmp_name'];
    

    //enrollmentstatus 

    $category = strtoupper("Regular");
    $firstcourse = strtoupper(mysqli_real_escape_string($con,$_POST['firstcourse']));
    $secondcourse = strtoupper(mysqli_real_escape_string($con,$_POST['secondcourse']));
    $thirdcourse = strtoupper(mysqli_real_escape_string($con,$_POST['thirdcourse']));
    $campus = strtoupper(mysqli_real_escape_string($con,$_POST['campus']));
    //ExamCode

    $dec = qcu_decrypt($id);
    $ExamCode = $dec;
    

    //educationalinfo 
    $schoollastattended = strtoupper(mysqli_real_escape_string($con,$_POST['schoollastattended']));
    $schoollastattendedaddress = strtoupper(mysqli_real_escape_string($con,$_POST['schoollastattendedaddress']));
    $schoollastattendedlevel = strtoupper(mysqli_real_escape_string($con,$_POST['schoollastattendedlevel']));
    
    // queries
    //     $insertsql1 = "INSERT INTO `studentinfo`(`StudentID`, `FullName-Last`, `FullName-First`, `FullName-Middle`, `Age`, `birthday`, `birthplace`, `civilstatus`, `gender`, `contactno`, `email`, `address-name`, `zip_code`, `mothername`, `motherjob`, `fathername`, `fatherjob`, `guardianname`, `relationship`, `guardiancontactno`) VALUES ();";
    //     $select1 = "SELECT `StudentID` FROM `studentinfo`;";
    //$insertsql2 = "INSERT INTO `studenteducationalinfo`(`StudentID`, `schoollastattended`, `schoollastattendedaddress`, `schoollastattendedlevel`) VALUES ();";
   // $insertsql3 = "INSERT INTO `studentenrollmentinfo`(`ID`, `StudentID`, `category`, `firstcourse`, `secondcourse`, `thirdcourse`) VALUES ();";
//mysqli_real_escape_string($con,
    $enrollmentyear = date("Y");
    

    //select student id 
    $select1 = "SELECT * FROM `studentinfo` ORDER BY ID DESC LIMIT 1;";
    $checkresult = mysqli_query($con, $select1);
    if(mysqli_num_rows($checkresult)>0){
        if($row = mysqli_fetch_assoc($checkresult)){
            $tempid = $row['enrollnumber'];
            $get_numbers = str_replace("$enrollmentyear-", "", $tempid);
            $inc_number = $get_numbers+1;
            $get_string = str_pad($inc_number, 7, 0, STR_PAD_LEFT);
            $enrollnumber = "$enrollmentyear-$get_string";
            $remarks = "Information has been recorded";
            $insertsql1 = "INSERT INTO `studentinfo`(`enrollnumber`, `FullName-Last`, `FullName-First`, `FullName-Middle`, `Age`, `birthday`, `birthplace`, `civilstatus`, `gender`, `contactno`, `email`, `address-name`, `zip_code`, `mothername`, `motherjob`, `fathername`, `fatherjob`, `guardianname`, `relationship`, `guardiancontactno`) VALUES ('$enrollnumber', '$FullName_Last', '$FullName_First', '$FullName_Middle', '$Age', '$birthday', '$birthplace', '$civilstatus', '$gender', '$contactno', '$email', '$address_name', '$zip_code', '$mothername', '$motherjob', '$fathername', '$fatherjob', '$guardianname', '$relationship', '$guardiancontactno');";
            $insertsql2 = "INSERT INTO `studenteducationalinfo`(`enrollnumber`, `schoollastattended`, `schoollastattendedaddress`, `schoollastattendedlevel`) VALUES ('$enrollnumber', '$schoollastattended', '$schoollastattendedaddress', '$schoollastattendedlevel');";
            $insertsql3 = "INSERT INTO `studentenrollmentinfo`(`enrollnumber`, `category`, `firstcourse`, `secondcourse`, `thirdcourse`, `campus`) VALUES ('$enrollnumber', '$category', '$firstcourse', '$secondcourse', '$thirdcourse', '$campus');";
            $insertfile = "INSERT INTO `regulardocumentsneed`(`enrollnumber`, `PSA`, `Form137`, `Form138`, `Diploma`, `GoodMoral`, `BarangayClearance`, `MedicalClearance`, `IDPicture`) VALUES ('$enrollnumber', '$PSA', '$Form137', '$Form138', '$Diploma', '$GoodMoral', '$BarangayClearance', '$MedicalClearance', '$IDPicture');";
            $insertExamCodee = "INSERT INTO `student_examresult`(`enrollnumber`, `ExamCode`) VALUES ('$enrollnumber','$ExamCode');";
            $insertapproved = "INSERT INTO `studentapprovals`(`enrollnumber`,`remarks`) VALUES ('$enrollnumber','$remarks');";
            $query = $insertsql1;
            $query .=$insertsql2;
            $query .=$insertsql3;
            $query .=$insertExamCodee;
            $query .=$insertfile;
            $query .=$insertapproved;
            $insertqueries = $con->multi_query($query);
            $location = "../../files/ENROLLEES_FILES/$enrollnumber/";
            if(!file_exists($location)){
            mkdir($location,0777,true);
            }
            if ($insertqueries){
                move_uploaded_file($PSA_temp, $location.$PSA);
                move_uploaded_file($Form137_temp, $location.$Form137);
                move_uploaded_file($Form138_temp, $location.$Form138);
                move_uploaded_file($Diploma_temp, $location.$Diploma);
                move_uploaded_file($GoodMoral_temp, $location.$GoodMoral);
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
        $enrollnumberint = 1;
        $enrollnumber = "$enrollmentyear-000000$enrollnumberint";
        $remarks = "Information has been recorded";
        $insertsql1 = "INSERT INTO `studentinfo`(`enrollnumber`, `FullName-Last`, `FullName-First`, `FullName-Middle`, `Age`, `birthday`, `birthplace`, `civilstatus`, `gender`, `contactno`, `email`, `address-name`, `zip_code`, `mothername`, `motherjob`, `fathername`, `fatherjob`, `guardianname`, `relationship`, `guardiancontactno`) VALUES ('$enrollnumber', '$FullName_Last', '$FullName_First', '$FullName_Middle', '$Age', '$birthday', '$birthplace', '$civilstatus', '$gender', '$contactno', '$email', '$address_name', '$zip_code', '$mothername', '$motherjob', '$fathername', '$fatherjob', '$guardianname', '$relationship', '$guardiancontactno');";
        $insertsql2 = "INSERT INTO `studenteducationalinfo`(`enrollnumber`, `schoollastattended`, `schoollastattendedaddress`, `schoollastattendedlevel`) VALUES ('$enrollnumber', '$schoollastattended', '$schoollastattendedaddress', '$schoollastattendedlevel');";
        $insertsql3 = "INSERT INTO `studentenrollmentinfo`(`enrollnumber`, `category`, `firstcourse`, `secondcourse`, `thirdcourse`, `campus`) VALUES ('$enrollnumber', '$category', '$firstcourse', '$secondcourse', '$thirdcourse', '$campus');";
        $insertfile = "INSERT INTO `regulardocumentsneed`(`enrollnumber`, `PSA`, `Form137`, `Form138`, `Diploma`, `GoodMoral`, `BarangayClearance`, `MedicalClearance`, `IDPicture`) VALUES ('$enrollnumber', '$PSA', '$Form137', '$Form138', '$Diploma', '$GoodMoral', '$BarangayClearance', '$MedicalClearance', '$IDPicture');";
        $insertExamCodee = "INSERT INTO `student_examresult`(`enrollnumber`, `ExamCode`) VALUES ('$enrollnumber','$ExamCode');";
        $insertapproved = "INSERT INTO `studentapprovals`(`enrollnumber`,`remarks`) VALUES ('$enrollnumber','$remarks');";
        $query = $insertsql1;
        $query .=$insertsql2;
        $query .=$insertsql3;
        $query .=$insertExamCodee;
        $query .=$insertfile;
        $query .=$insertapproved;
        $location = "../../files/ENROLLEES_FILES/$enrollnumber/";
            if(!file_exists($location)){
            mkdir($location,0777,true);
            }

        if ($insertqueries = $con->multi_query($query)){
            move_uploaded_file($PSA_temp, $location.$PSA);
            move_uploaded_file($Form137_temp, $location.$Form137);
            move_uploaded_file($Form138_temp, $location.$Form138);
            move_uploaded_file($Diploma_temp, $location.$Diploma);
            move_uploaded_file($GoodMoral_temp, $location.$GoodMoral);
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
