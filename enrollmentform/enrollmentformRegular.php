<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php");
session_start();
include_once('dbcon.php');
if(isset($_POST['submit'])){
    $FullName_Last = mysqli_real_escape_string($con,$_POST['FullName-Last']);
    $FullName_First = mysqli_real_escape_string($con,$_POST['FullName-First']);
    $FullName_Middle = mysqli_real_escape_string($con,$_POST['FullName-Middle']);
    $Age = mysqli_real_escape_string($con,$_POST['Age']);
    $birthday = mysqli_real_escape_string($con,$_POST['birthday']);
    $birthplace = mysqli_real_escape_string($con,$_POST['birthplace']);
    $civilstatus = mysqli_real_escape_string($con,$_POST['civilstatus']);
    $gender = mysqli_real_escape_string($con,$_POST['gender']);
    $contactno = mysqli_real_escape_string($con,$_POST['contactno']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $address_name = mysqli_real_escape_string($con,$_POST['address-name']);
    $zip_code = mysqli_real_escape_string($con,$_POST['zip_code']);
    $mothername = mysqli_real_escape_string($con,$_POST['mothername']);
    $motherjob = mysqli_real_escape_string($con,$_POST['motherjob']);
    $fathername = mysqli_real_escape_string($con,$_POST['fathername']);
    $fatherjob = mysqli_real_escape_string($con,$_POST['fatherjob']);
    $guardianname = mysqli_real_escape_string($con,$_POST['guardianname']);
    $relationship = mysqli_real_escape_string($con,$_POST['relationship']);
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

    $category = "Regular";
    $firstcourse = mysqli_real_escape_string($con,$_POST['firstcourse']);
    $secondcourse = mysqli_real_escape_string($con,$_POST['secondcourse']);
    $thirdcourse = mysqli_real_escape_string($con,$_POST['thirdcourse']);

    //educationalinfo 
    $schoollastattended = mysqli_real_escape_string($con,$_POST['schoollastattended']);
    $schoollastattendedaddress = mysqli_real_escape_string($con,$_POST['schoollastattendedaddress']);
    $schoollastattendedlevel = mysqli_real_escape_string($con,$_POST['schoollastattendedlevel']);
    
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
    
}

?>


<a href="../login.php" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>

<div class="contents enroll">

<div class="enrollment-form">
    <div class="enrollment-form-bg">
        <form method="POST" enctype="multipart/form-data">
            <h2 style="text-align:center;">Enrollment Form For Regular Students</h2>

            <div class="form-data1">
                <div class="form-data-bg">
                    <div class="form-data-title">
                        <h3 style="text-align: center;">Personal Information</h3>
                    </div>
                    <hr>
                    <label for="FullName-Last">Last Name:</label>
                    <input type="text" name="FullName-Last" placeholder="DELA CRUZ/DELA CRUZ JR."
                        class="one-line" required> <br>
                    <label for="FullName-First">First Name:</label>
                    <input type="text" name="FullName-First" placeholder="JUAN" class="one-line"
                        required> <br>
                    <label for="FullName-Middle">Middle Name:</label>
                    <input type="text" name="FullName-Middle" placeholder="LUNA" class="one-line"
                        required> <br>
                    <label for="Age">Age:</label>
                    <input type="text" name="Age" placeholder="20" class="one-line" required> <br>
                    <label for="birthday">Birthdate:</label>
                    <input type="date" name="birthday" class="one-line">
                    <label for="birthplace">Place of Birthdate:</label>
                    <input type="text" name="birthplace" placeholder="Quezon City" class="one-line"
                        required> <br> 
                </div>
            </div>
            <div class="form-data2">
                <div class="form-data-bg">
                
                    <label for="civilstatus">Civil Status</label>
                    <select name="civilstatus" id="civilstatus_id" required>
                        <option value="">Please Select Here</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>

                    </select><br>
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender_id" required>
                        <option value="">Please Select Here</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>

                    </select><br>
                    <label for="contactno">Contact No:</label>
                    <input type="text" name="contactno" placeholder="09XXXXXXXXX" class="one-line"
                        required> <br>
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="fn.mn.ln@gmail.com"
                        class="one-line" required> <br><br>
                 
                </div>
            </div>
            <div class="form-data3">
                <div class="form-data-bg">
                
                
                <label for="address-name"> Address: </label>
                <input type="textarea" name="address-name"
                    placeholder="LOT NO. BLOCK NO. STREET, SUBDIVISION/VILLAGE, BARANGAY, TOWN, CITY, REGION" class="one-line" required> <br>
                <label for="zip_code"> Zip Code </label>
                <input type="text" name="zip_code" placeholder="1003" required class="one-line">
                <br>
              
                </div>
            </div>
            <div class="form-data4">
                <div class="form-data-bg">
                
                    <label for="mothername"> Mother's Name </label>
                    <input type="text"  name="mothername"
                    placeholder="First Name MI Last Name" class="one-line" required> <br>
                    <label for="motherjob"> Mother's Job </label>
                    <input type="text"  name="motherjob"
                    placeholder="Mother's Job" class="one-line" required> <br>
                    <label for="fathername"> Father's Name </label>
                    <input type="text" name="fathername"
                    placeholder="First Name MI Last Name" class="one-line" required> <br>
                    <label for="fatherjob"> Father's Job </label>
                    <input type="text"  name="fatherjob"
                    placeholder="Father's Job" class="one-line" required> <br>
                    <br>
 
            </div>
        </div>
            <div class="form-data5">
                <div class="form-data-bg">
                
                <label for="guardianname"> Guardian's Name </label>
                <input type="text"  name="guardianname"
                placeholder="First Name MI Last Name" class="one-line" required> <br>
                <label for="relationship">Relationship:</label>
                <select name="relationship" id="relationship_id" required>
                    <option value="Father"> Father </option>
                    <option value="Mother"> Mother </option>
                    <option value="Brother"> Brother </option>
                    <option value="Sister"> Sister </option>
                    <option value="Relatives"> Other Relatives </option>
                    <option value="Guardian"> Guardian </option>
                </select>
                <br>
                <label for="guardiancontactno"> Contact No. </label>
                <input type="text" name="guardiancontactno"
                placeholder="09XXXXXXXXX" class="one-line" required> <br> <br>

            </div>
            </div>
            <div class="form-data6">
                <div class="form-data-bg">
                    <div class="form-data-title">
                        <h3 style="text-align: center;">Educational Information</h3>
                    </div>
                    <hr>
                    <label for="schoollastattended"> Name of your Previous School </label>
                    <input type="text" name="schoollastattended"
                    placeholder="Name of the School" class="one-line" required> <br> <br>
                    <label for="schoollastattendedaddress"> School Address </label>
                    <input type="text" name="schoollastattendedaddress"
                    placeholder="Address of the School" class="one-line" required> <br> <br>
                    <label for="schoollastattendedlevel"> Highest Attained Level </label>
                    <input type="text" name="schoollastattendedlevel"
                    placeholder="Your Highest Year Level" class="one-line" required> <br> <br>
                </div>
                
            </div>   
            <div class="form-data7">
                <div class="form-data-bg">
                    <div class="form-data-title">
                        <h3 style="text-align: center;">Enrollment Information</h3>
                    </div>
                    <hr>
                    <label for="firstcourse"> First Choice of Course</label>
                    <select name="firstcourse" value=""> 
                        <option value=" ">First Choice of Course</option>  
                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                        <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                        <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                        <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                        <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
          
                    </select> <br> <br>
                    <label for="secondcourse"> Second Choice of Course</label>
                    <select name="secondcourse" value=""> 
                        <option value=" ">Second Choice of Course</option>  
                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                        <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                        <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                        <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                        <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
          
                    </select> <br> <br>
                    <label for="thirdcourse"> Third Choice of Course</label>
                    <select name="thirdcourse" value=""> 
                        <option value=" ">Third Choice of Course</option> 
                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                        <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                        <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                        <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                        <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                    </select><br><br>

                    
                </div>
                <h3 style="text-align:center">Documents Need</h3>
                <div class="form-data8">
                    
                    
                    <div class="file1">
                        <div class="filecat">
                            <label for="PSA">PSA Birth Certificate</label>
                            <input type="file" name="PSA" id="" class="choose" require>
                        </div>
                        <div class="filecat">
                            <label for="Form137">Form 137 w/ remarks ‘Copy for QCU’ (once enrolled)</label>
                            <input type="file" name="Form137" id="" class="choose" require>
                        </div>
                        <div class="filecat">
                            <label for="Form138">Form 138 – A</label>
                            <input type="file" name="Form138" id="" class="choose" require>
                        </div>
                        <div class="filecat">
                            <label for="Diploma">Diploma</label>
                            <input type="file" name="Diploma" id="" class="choose" require>
                        </div>
                    </div>
                    <div class="file1">
                        <div class="filecat">
                            <label for="GoodMoral">Certificate of Good Moral Character</label>
                            <input type="file" name="GoodMoral" id="" class="choose" require>
                        </div>
                        <div class="filecat">
                            <label for="BarangayClearance">Recent Barangay Clearance</label>
                            <input type="file" name="BarangayClearance" id="" class="choose" require>
                        </div>
                        <div class="filecat">
                            <label for="MedicalClearance">Medical Clearance issued by the University Health Office upon submission of medical requirements</label>
                            <input type="file" name="MedicalClearance" id="" class="choose" require>
                        </div>
                        <div class="filecat">
                            <label for="IDPicture">1pc. 2x2 with Name Tag – White Background</label>
                            <input type="file" name="IDPicture" id="" class="choose" require>
                        </div>
                    </div>
                    
                </div>
            </div>             
            <button type="submit" name="submit" style="background-color: #3366CC"> Submit </button>
    </div>

    </form>
</div>
</div>


<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>