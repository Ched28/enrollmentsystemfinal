<?php 
include_once("dbcon.php");
include_once("enc_dec.php");
$id = $_GET['id'];
$dec = qcu_decrypt($id);
if(isset($_POST['update'])){
    $cat = mysqli_real_escape_string($con,$_POST['hidden_cat']);
    $StudentID1 = $dec;
    $PSA_prev = $_POST['PSA_prev'];
    $Form137_prev = $_POST['Form137_prev'];
    $Form138_prev = $_POST['Form138_prev'];
    $Diploma_prev = $_POST['Diploma_prev'];
    $GoodMoral_prev = $_POST['GoodMoral_prev'];
    $BarangayClearance_prev = $_POST['BarangayClearance_prev'];
    $MedicalClearance_prev = $_POST['MedicalClearance_prev'];
    $IDPicture_prev = $_POST['IDPicture_prev'];
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
    $location = "../../files/";

    if($cat == "REGULAR"){
        $updatefileregular = "UPDATE `regulardocumentsneed` SET `PSA`='$PSA',`Form137`='$Form137',`Form138`='$Form138',`Diploma`='$Diploma',`GoodMoral`='$GoodMoral',`BarangayClearance`='$BarangayClearance',`MedicalClearance`='$MedicalClearance',`IDPicture`='$IDPicture' WHERE `StudentID` = '$StudentID1'; ";
        $update1 = mysqli_query($con, $updatefileregular);
        echo "<script>alert('update here')</script>";
        if($update1){
            //PSA
            if(file_exists($location.$PSA)){
                if(is_file("../../files/".$PSA_prev) == "true"){ 
                    unlink("../../files/".$PSA_prev); 
                    move_uploaded_file($PSA_temp, $location.$PSA);  
                }
            }else{
            move_uploaded_file($PSA_temp, $location.$PSA);
            }
            //FORM137
            if(file_exists($location.$Form137)){
            if(is_file("../../files/".$Form137_prev)== "true"){
                unlink("../../files/".$Form137_prev);
                move_uploaded_file($Form137_temp, $location.$Form137);  
            } 
            }else{
            move_uploaded_file($Form137_temp, $location.$Form137);
           
            }
            //form138
            if(file_exists($location.$Form138)){
            if(is_file("../../files/".$Form138_prev)== "true"){
                unlink("../../files/".$Form138_prev);
                move_uploaded_file($Form138_temp, $location.$Form138);
            }
            }else{
            move_uploaded_file($Form138_temp, $location.$Form138);

            }
            //diploma
            if(file_exists($location.$Diploma)){
            if(is_file("../../files/".$Diploma_prev) == "true"){
            unlink("../../files/".$Diploma_prev);
            move_uploaded_file($Diploma_temp, $location.$Diploma);
            }
               
            }else{
            
            move_uploaded_file($Diploma_temp, $location.$Diploma);
     
            }
            //goodmoral
            if(file_exists($location.$GoodMoral)){
            unlink("../../files/".$GoodMoral_prev);
            move_uploaded_file($GoodMoral_temp, $location.$GoodMoral);   
            }else{
            
            
            move_uploaded_file($GoodMoral_temp, $location.$GoodMoral);
         
            }
            //bcert
            if(file_exists($location.$BarangayClearance)){
                unlink("../../files/".$BarangayClearance_prev);
            move_uploaded_file($BarangayClearance_temp, $location.$BarangayClearance);   
            }else{
            
            move_uploaded_file($BarangayClearance_temp, $location.$BarangayClearance);
     
            }
            //mcert
            if(file_exists($location.$MedicalClearance)){
                unlink("../../files/".$MedicalClearance_prev);
            move_uploaded_file($MedicalClearance_temp, $location.$MedicalClearance);   
            }else{
            
            move_uploaded_file($MedicalClearance_temp, $location.$MedicalClearance);
        
            }
            //idpic
            if(file_exists($location.$IDPicture)){
                $un = "../../files/".$IDPicture_prev;
                if(is_file($un)){
            unlink($un);
            move_uploaded_file($IDPicture_temp, $location.$IDPicture);
            }
            else{
                
            }
            }else{
            
            move_uploaded_file($IDPicture_temp, $location.$IDPicture);
          
            }
            }
           // echo "<script> location.replace('../success.php');</script>";
        }
    
    
    
    }//another cat
else{
    echo "<script>alert('prob here')</script>";
}

?>