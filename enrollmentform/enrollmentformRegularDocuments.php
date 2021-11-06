<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php");
session_start();
include_once('dbcon.php');


if(isset($_POST['submit'])){
   //regular documents 
   $enrollmentyear = date("y");
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

   $select1 = "SELECT * FROM `studentinfo` ORDER BY ID DESC LIMIT 1;";
    $checkresult = mysqli_query($con, $select1);
    if(mysqli_num_rows($checkresult)>0){
        if($row = mysqli_fetch_assoc($checkresult)){
            $tempid = $row['StudentID'];
            $get_numbers = str_replace("$enrollmentyear-", "", $tempid);
            $inc_number = $get_numbers+1;
            $get_string = str_pad($inc_number, 4, 0, STR_PAD_LEFT);
            $studentid = "$enrollmentyear-$get_string";

            $insertfile = "INSERT INTO `regulardocumentsneed`(`StudentID`, `PSA`, `Form137`, `Form138`, `Diploma`, `GoodMoral`, `BarangayClearance`, `MedicalClearance`, `IDPicture`) VALUES ('$studentid', '$PSA', '$Form137', '$Form138', '$Diploma', '$GoodMoral', '$BarangayClearance', '$MedicalClearance', '$IDPicture');";
            $insertqueries = $con->mysqli_query($insertfile);
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
    }
}
?>
<a href="../login.php" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>

<div class="contents enroll">

<div class="enrollment-form">
    <div class="enrollment-form-bg">
        <form method="POST" enctype="multipart/form-data" id="form">
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
                <button type="submit" name="submit" style="background-color: #3366CC"> Submit </button>
    </div>

    </form>
    </div>
</div>
    <?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>