<?php 




//for($a = 1;$a<=100;$a++){
  //  $enrollmentyear = date("y");
   //$getstring = str_pad($a, 4, 0, STR_PAD_LEFT);
   //$id = "$enrollmentyear-$getstring";
   //echo "$id <br>";


//}


//$idint = 0001; 

//echo "21-$idint";

include_once('dbcon.php');
//$lastid = $con->insert_id;
//$enrollmentyear = date("y");
//$select1 = "SELECT * FROM `studentinfo` ORDER BY ID DESC LIMIT 1;";
 //   $checkresult = mysqli_query($con, $select1);
  //  if(mysqli_num_rows($checkresult)>0){
    //    if($row = mysqli_fetch_assoc($checkresult)){
      //      $tempid = $row['StudentID'];
        //    echo $tempid;
          //  echo "<br>";
          //  $get_numbers = str_replace("$enrollmentyear-", "", $tempid);
           // echo $get_numbers;
           // echo "<br>";
            // $inc_number = $get_numbers+1;
            // echo $inc_number;
            //echo "<br>";
            ///$get_string = str_pad($inc_number, 4, 0, STR_PAD_LEFT);
            //echo $get_string;
            ///echo "<br>";
            //$studentid = "$enrollmentyear-$get_string";
            //echo $studentid;
        //}
    //}
//     $PSA = $_FILES['PSA']['name'];
//     $PSA_temp = $_FILES['PSA']['tmp_name'];
//     $Form137 = $_FILES['Form137']['name'];
//     $Form137_temp = $_FILES['Form137']['tmp_name'];
//     $Form138 = $_FILES['Form138']['name'];
//     $Form138_temp = $_FILES['Form138']['tmp_name'];
//     $Diploma = $_FILES['Diploma']['name'];
//     $Diploma_temp = $_FILES['Diploma']['tmp_name'];
//     $GoodMoral = $_FILES['GoodMoral']['name'];
//     $GoodMoral_temp = $_FILES['GoodMoral']['tmp_name']; 
//     $BarangayClearance = $_FILES['BarangayClearance']['name'];
//     $BarangayClearance_temp = $_FILES['BarangayClearance']['tmp_name'];
//     $MedicalClearance = $_FILES['MedicalClearance']['name'];
//     $MedicalClearance_temp = $_FILES['MedicalClearance']['tmp_name'];
//     $IDPicture = $_FILES['IDPicture']['name'];
//     $IDPicture_temp = $_FILES['IDPicture']['tmp_name'];
//     $location = "../files/";
//     $enrollmentyear = date("y");
//     $select1 = "SELECT * FROM `studentinfo` ORDER BY ID DESC LIMIT 1;";
//     $checkresult = mysqli_query($con, $select1);
//     if(mysqli_num_rows($checkresult)>0){
//         if($row = mysqli_fetch_assoc($checkresult)){
//             $tempid = $row['StudentID'];
//             $get_numbers = str_replace("$enrollmentyear-", "", $tempid);
//             $inc_number = $get_numbers+1;
//             $get_string = str_pad($inc_number, 4, 0, STR_PAD_LEFT);
//             $studentid = "$enrollmentyear-$get_string";
//     $insertfile = "INSERT INTO `regulardocumentsneed`(`StudentID`, `PSA`, `Form137`, `Form138`, `Diploma`, `GoodMoral`, `BarangayClearance`, `MedicalClearance`, `IDPicture`) VALUES ('$studentid', '$PSA', '$Form137', '$Form138', '$Diploma', '$GoodMoral', '$BarangayClearance', '$MedicalClearance', '$IDPicture');";
//     $insertqueries = $con->mysqli_query($insertfile);
//     if ($insertqueries){
//         move_uploaded_file($PSA_temp, $location.$PSA);
//         move_uploaded_file($Form137_temp, $location.$Form137);
//         move_uploaded_file($Form138_temp, $location.$Form138);
//         move_uploaded_file($Diploma_temp, $location.$Diploma);
//         move_uploaded_file($GoodMoral_temp, $location.$GoodMoral);
//         move_uploaded_file($BarangayClearance_temp, $location.$BarangayClearance);
//         move_uploaded_file($MedicalClearance_temp, $location.$MedicalClearance);
//         move_uploaded_file($IDPicture_temp, $location.$IDPicture);

//     }else{

//         echo "<script> alert('error moving file');</script>";
//     }
// }
//     }
// ?>
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php"); ?>
<main class="no-bg">
<style type="text/css">
tr{
    border: 1px solid black;
}
</style>
<table> 
<tr colspan="4">
<td>
<h1>ENROLLMENT FORM FOR REGULAR ENROLLEES</h1>
<div class="danger">
<h3>BEFORE YOU FILL UP THE FORM:</h3>
<ol> 
<li>Once you submit, you are agreeing to the terms and conditions here in QCU Online Portal. </li>
<li> Once you submit, you are confirming all the details that you entered in this online form. </li>
</ol>
</div>
All of your personal information, and documents are protected by RA No. 10173 or the Data Privacy Act of 2012
GUIDELINES ON THE REQUIREMENTS: 

1. The File should be on Portable Document Format (.pdf) and on Joint Photographic Experts Group Format (.jpeg/.jpg). Another file format should not be accepted. 
2. All of the files should name by the requiredfile_lastname_firstname.pdf (Example: PSA_ROWY_CHEDRICK.pdf) should be on the CAPITAL LETTERS. 

</td>
</tr>
</table> 
</main>
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>



