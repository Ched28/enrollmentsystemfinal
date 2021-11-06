<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php");
session_start();
include_once('dbcon.php');


$id = $_GET['id'];
if(isset($_POST['upload'])){

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

   $PSAName = mysqli_real_escape_string($con, $PSA);
   $Form137Name = mysqli_real_escape_string($con, $Form137);
   $Form138Name = mysqli_real_escape_string($con, $Form138);
   $DiplomaName = mysqli_real_escape_string($con, $Diploma);
   $GoodMoralName = mysqli_real_escape_string($con, $GoodMoral);
   $BarangayClearanceName = mysqli_real_escape_string($con, $BarangayClearance);
   $MedicalClearanceName = mysqli_real_escape_string($con, $MedicalClearance);
   $IDPictureName  = mysqli_real_escape_string($con, $IDPicture);
   $select1 = "SELECT * FROM `studentinfo` WHERE id=$id LIMIT 1;";
    $checkresult = mysqli_query($con, $select1);
    if(mysqli_num_rows($checkresult)>0){
        if($row = mysqli_fetch_assoc($checkresult)){
            $tempid = $row['StudentID'];
            $studentid = $tempid;
           
            $insertfile = "INSERT INTO `regulardocumentsneed` (`StudentID`, `PSA`, `Form137`, `Form138`, `Diploma`, `GoodMoral`, `BarangayClearance`, `MedicalClearance`, `IDPicture`) VALUES ('$studentid', '$PSAName', '$Form137Name', '$Form138Name', '$DiplomaName', '$GoodMoralName', '$BarangayClearanceName', '$MedicalClearanceName', '$IDPictureName');";
            $insertqueries = $con->mysqli_query($insertfile);
            echo print_r($insertqueries);
            echo $PSAName;
           echo $Form137Name;
           echo $Form138Name;
           echo $DiplomaName;
           echo $GoodMoralName;
           echo $BarangayClearanceName;
           echo $MedicalClearanceName;
           echo $IDPictureName;
           echo $studentid;
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
            echo "<script> alert('error moving file1');</script>";
        }
        echo "<script> alert('error moving file2');</script>";

    }
    echo "<script> alert('error moving file4');</script>";
}
else{
echo "<script> alert('error moving file8');</script>";
}
?>
<a href="../login.php" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>

<div class="contents enroll">

<div class="enrollment-form">
    <div class="enrollment-form-bg">
        <form method="POST" enctype="multipart/form-data">
        <h3 style="text-align:center">Documents Need</h3>
                <div class="form-data8">
                    
                    
                    <div class="file1">
                        <div class="filecat">
                            <label for="PSA">PSA Birth Certificate</label>
                            <input type="file" name="PSA">
                        </div>
                        <div class="filecat">
                            <label for="Form137">Form 137 w/ remarks ‘Copy for QCU’ (once enrolled)</label>
                            <input type="file" name="Form137">
                        </div>
                        <div class="filecat">
                            <label for="Form138">Form 138 – A</label>
                            <input type="file" name="Form138">
                        </div>
                        <div class="filecat">
                            <label for="Diploma">Diploma</label>
                            <input type="file" name="Diploma">
                        </div>
                    </div>
                    <div class="file1">
                        <div class="filecat">
                            <label for="GoodMoral">Certificate of Good Moral Character</label>
                            <input type="file" name="GoodMoral">
                        </div>
                        <div class="filecat">
                            <label for="BarangayClearance">Recent Barangay Clearance</label>
                            <input type="file" name="BarangayClearance">
                        </div>
                        <div class="filecat">
                            <label for="MedicalClearance">Medical Clearance issued by the University Health Office upon submission of medical requirements</label>
                            <input type="file" name="MedicalClearance">
                        </div>
                        <div class="filecat">
                            <label for="IDPicture">1pc. 2x2 with Name Tag – White Background</label>
                            <input type="file" name="IDPicture">
                        </div>
                    </div>
                    
                </div>
                <button type="submit" name="upload" style="background-color: #3366CC"> Submit </button>
    </div>

    </form>
    </div>
</div>
    <?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>