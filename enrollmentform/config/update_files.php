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
    
           
    $PSA_TEXT = "";
    $Form137_TEXT = "";
    $Form138_TEXT = "";
    $Diploma_TEXT = "";
    $GoodMoral_TEXT = "";
    $BarangayClearance_TEXT = "";
    $MedicalClearance_TEXT = "";
    $IDPicture_TEXT = "";
    if($PSA == ""){
        $PSA_TEXT = $PSA_prev;
        $PSA = $PSA_prev;
        
    }else{
        $PSA_TEXT = $PSA;
    }
    if($Form137 == ""){
        $Form137_TEXT = $Form137_prev;
        $Form137 = $Form137_prev;
    }else{
        $Form137_TEXT = $Form137;
    }
    
    if($Form138 == ""){
        $Form138_TEXT = $Form138_prev;
        $Form138 = $Form138_prev;
    }else{
        $Form138_TEXT = $Form138;
    }
    
    if($Diploma == ""){
        $Diploma_TEXT = $Diploma_prev;
        $Diploma = $Diploma_prev;
    }else{
        $Diploma_TEXT = $Diploma;
    }
    
    if($GoodMoral == ""){
        $GoodMoral_TEXT = $GoodMoral_prev;
        $GoodMoral = $GoodMoral_prev;
    }else{
        $GoodMoral_TEXT = $GoodMoral;
    }
    
    if($BarangayClearance == ""){
        $BarangayClearance_TEXT = $BarangayClearance_prev;
        $BarangayClearance = $BarangayClearance_prev;
    }else{
        $BarangayClearance_TEXT = $BarangayClearance;
    }
    
    if($MedicalClearance == ""){
        $MedicalClearance_TEXT = $MedicalClearance_prev;
        $MedicalClearance = $MedicalClearance_prev;
    }else{
        $MedicalClearance_TEXT = $MedicalClearance;
    }
    
    if($IDPicture == ""){
        $IDPicture_TEXT = $IDPicture_prev;
        $IDPicture = $IDPicture_prev;
    }else{
        $IDPicture_TEXT = $IDPicture;
    }
    
    
    
    if($cat == "REGULAR"){
        $updatefileregular = "UPDATE `regulardocumentsneed` SET `PSA`='$PSA_TEXT',`Form137`='$Form137_TEXT',`Form138`='$Form138_TEXT',`Diploma`='$Diploma_TEXT',`GoodMoral`='$GoodMoral_TEXT',`BarangayClearance`='$BarangayClearance_TEXT',`MedicalClearance`='$MedicalClearance_TEXT',`IDPicture`='$IDPicture_TEXT' WHERE `StudentID` = '$StudentID1'; ";
        $update1 = mysqli_query($con, $updatefileregular);
        
        $location = "../../files/$StudentID1/";
      
        if(!file_exists($location)){
            mkdir($location,0777,true);
        }
       
        if($update1){
            //PSA
            if(file_exists($location.$PSA)){
                
                move_uploaded_file($PSA_temp, $location.$PSA);  
            }else{
            move_uploaded_file($PSA_temp, $location.$PSA);
            if(is_file($location.$PSA_prev) == "true"){ 
                unlink($location.$PSA_prev); 
                
            }
            }
            //FORM137
            if(file_exists($location.$Form137)){
           
            move_uploaded_file($Form137_temp, $location.$Form137);  
            }else{
            move_uploaded_file($Form137_temp, $location.$Form137);
            if(is_file($location.$Form137_prev) == "true"){
                unlink($location.$Form137);     
            } 
           
            }
            //form138
            if(file_exists($location.$Form138)){
            
            move_uploaded_file($Form138_temp, $location.$Form138);
            }else{
            move_uploaded_file($Form138_temp, $location.$Form138);
            if(is_file($location.$Form138_prev) == "true"){
                unlink($location.$Form138_prev);
               
            }

            }
            //diploma
            if(file_exists($location.$Diploma)){
           
            move_uploaded_file($Diploma_temp, $location.$Diploma);
               
            }else{
            
            move_uploaded_file($Diploma_temp, $location.$Diploma);
            if(is_file($location.$Diploma_prev) == "true"){
                unlink($location.$Diploma_prev);
                
                }
     
            }
            //goodmoral
            if(file_exists($location.$GoodMoral)){
            
             move_uploaded_file($GoodMoral_temp, $location.$GoodMoral);
            }else{
            move_uploaded_file($GoodMoral_temp, $location.$GoodMoral);
            if(is_file($location.$GoodMoral_prev) == "true"){
                unlink($location.$GoodMoral_prev);
                 }
            }
            //bcert
            if(file_exists($location.$BarangayClearance)){
            
             move_uploaded_file($BarangayClearance_temp, $location.$BarangayClearance);
            }else{
            
            move_uploaded_file($BarangayClearance_temp, $location.$BarangayClearance);
            if(is_file($location.$BarangayClearance_prev)=="true"){
                unlink($location.$BarangayClearance_prev);
                
             }
            }
            //mcert
            if(file_exists($location.$MedicalClearance)){
            
            move_uploaded_file($MedicalClearance_temp, $location.$MedicalClearance);
            }else{
            
            move_uploaded_file($MedicalClearance_temp, $location.$MedicalClearance);
            if(is_file($location.$MedicalClearance_prev) == "true"){ 
                unlink($location.$MedicalClearance_prev);
                  
                }
            }
            //idpic
            if(file_exists($location.$IDPicture)){
            
                
            move_uploaded_file($IDPicture_temp, $location.$IDPicture);
            }else{
            
            move_uploaded_file($IDPicture_temp, $location.$IDPicture);
            if(is_file($location.$IDPicture_prev) == "true"){
                unlink($location.$IDPicture_prev);
            
            }
            }
            }
            sleep(10);
          ///echo "<script> location.replace('../success.php');</script>";
        }
    
    
    
    }//another cat
else{
    echo "<script>alert('prob here')</script>";
}

?>