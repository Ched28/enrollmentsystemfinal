

<?php


session_start();
include_once('dbcon.php');


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
    $location = "../files/";

    //enrollmentstatus 

    $category = strtoupper("Regular");
    $firstcourse = strtoupper(mysqli_real_escape_string($con,$_POST['firstcourse']));
    $secondcourse = strtoupper(mysqli_real_escape_string($con,$_POST['secondcourse']));
    $thirdcourse = strtoupper(mysqli_real_escape_string($con,$_POST['thirdcourse']));

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
            
            $insertsql1 = "INSERT INTO `studentinfo`(`StudentID`, `FullName-Last`, `FullName-First`, `FullName-Middle`, `Age`, `birthday`, `birthplace`, `civilstatus`, `gender`, `contactno`, `email`, `address-name`, `zip_code`, `mothername`, `motherjob`, `fathername`, `fatherjob`, `guardianname`, `relationship`, `guardiancontactno`) VALUES ('$studentid', '$FullName_Last', '$FullName_First', '$FullName_Middle', '$Age', '$birthday', '$birthplace', '$civilstatus', '$gender', '$contactno', '$email', '$address_name', '$zip_code', '$mothername', '$motherjob', '$fathername', '$fatherjob', '$guardianname', '$relationship', '$guardiancontactno');";
            $insertsql2 = "INSERT INTO `studenteducationalinfo`(`StudentID`, `schoollastattended`, `schoollastattendedaddress`, `schoollastattendedlevel`) VALUES ('$studentid', '$schoollastattended', '$schoollastattendedaddress', '$schoollastattendedlevel');";
            $insertsql3 = "INSERT INTO `studentenrollmentinfo`(`StudentID`, `category`, `firstcourse`, `secondcourse`, `thirdcourse`) VALUES ('$studentid', '$category', '$firstcourse', '$secondcourse', '$thirdcourse');";
            $insertfile = "INSERT INTO `regulardocumentsneed`(`StudentID`, `PSA`, `Form137`, `Form138`, `Diploma`, `GoodMoral`, `BarangayClearance`, `MedicalClearance`, `IDPicture`) VALUES ('$studentid', '$PSA', '$Form137', '$Form138', '$Diploma', '$GoodMoral', '$BarangayClearance', '$MedicalClearance', '$IDPicture');";
            $query = $insertsql1;
            $query .=$insertsql2;
            $query .=$insertsql3;
            $query .=$insertfile;
            $insertqueries = $con->multi_query($query);
            
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
        $studentidint = 1;
        $studentid = "$enrollmentyear-000$studentidint";
        $insertsql1 = "INSERT INTO `studentinfo`(`StudentID`, `FullName-Last`, `FullName-First`, `FullName-Middle`, `Age`, `birthday`, `birthplace`, `civilstatus`, `gender`, `contactno`, `email`, `address-name`, `zip_code`, `mothername`, `motherjob`, `fathername`, `fatherjob`, `guardianname`, `relationship`, `guardiancontactno`) VALUES ('$studentid', '$FullName_Last', '$FullName_First', '$FullName_Middle', '$Age', '$birthday', '$birthplace', '$civilstatus', '$gender', '$contactno', '$email', '$address_name', '$zip_code', '$mothername', '$motherjob', '$fathername', '$fatherjob', '$guardianname', '$relationship', '$guardiancontactno');";
        $insertsql2 = "INSERT INTO `studenteducationalinfo`(`StudentID`, `schoollastattended`, `schoollastattendedaddress`, `schoollastattendedlevel`) VALUES ('$studentid', '$schoollastattended', '$schoollastattendedaddress', '$schoollastattendedlevel');";
        $insertsql3 = "INSERT INTO `studentenrollmentinfo`(`StudentID`, `category`, `firstcourse`, `secondcourse`, `thirdcourse`) VALUES ('$studentid', '$category', '$firstcourse', '$secondcourse', '$thirdcourse');";
        $insertfile = "INSERT INTO `regulardocumentsneed`(`StudentID`, `PSA`, `Form137`, `Form138`, `Diploma`, `GoodMoral`, `BarangayClearance`, `MedicalClearance`, `IDPicture`) VALUES ('$studentid', '$PSA', '$Form137', '$Form138', '$Diploma', '$GoodMoral', '$BarangayClearance', '$MedicalClearance', '$IDPicture');";
        $query = $insertsql1;
        $query .=$insertsql2;
        $query .=$insertsql3;
        $query .=$insertfile;
        

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
