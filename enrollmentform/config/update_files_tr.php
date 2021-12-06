<?php 
include_once("dbcon.php");
include_once("enc_dec.php");
$id = $_GET['id'];
$dec = qcu_decrypt($id);
if(isset($_POST['update'])){
    $cat = mysqli_real_escape_string($con,$_POST['hidden_cat']);
    $enrollnumber1 = $dec;
    $TOR_prev = $_POST['TOR_prev'];
    $CertificateofTransferCredential_prev = $_POST['CertificateofTransferCredential_prev'];
    $SubjectDescription_prev = $_POST['SubjectDescription_prev'];
    $PSA_prev = $_POST['PSA_prev'];
    $GoodMoral_prev = $_POST['GoodMoral_prev'];
    $BarangayClearance_prev = $_POST['BarangayClearance_prev'];
    $MedicalClearance_prev = $_POST['MedicalClearance_prev'];
    $IDPicture_prev = $_POST['IDPicture_prev'];
    $TOR = $_FILES['TOR']['name'];
    $TOR_temp = $_FILES['TOR']['tmp_name'];
    $CertificateofTransferCredential = $_FILES['CertificateofTransferCredential']['name'];
    $CertificateofTransferCredential_temp = $_FILES['CertificateofTransferCredential']['tmp_name'];
    $SubjectDescription = $_FILES['SubjectDescription']['name'];
    $SubjectDescription_temp = $_FILES['SubjectDescription']['tmp_name'];
    $PSA = $_FILES['PSA']['name'];
    $PSA_temp = $_FILES['PSA']['tmp_name'];
    $GoodMoral = $_FILES['GoodMoral']['name'];
    $GoodMoral_temp = $_FILES['GoodMoral']['tmp_name']; 
    $BarangayClearance = $_FILES['BarangayClearance']['name'];
    $BarangayClearance_temp = $_FILES['BarangayClearance']['tmp_name'];
    $MedicalClearance = $_FILES['MedicalClearance']['name'];
    $MedicalClearance_temp = $_FILES['MedicalClearance']['tmp_name'];
    $IDPicture = $_FILES['IDPicture']['name'];
    $IDPicture_temp = $_FILES['IDPicture']['tmp_name'];
    
           
    $TOR_TEXT = "";
    $CertificateofTransferCredential_TEXT = "";
    $SubjectDescription_TEXT = "";
    $PSA_TEXT = "";
    $GoodMoral_TEXT = "";
    $BarangayClearance_TEXT = "";
    $MedicalClearance_TEXT = "";
    $IDPicture_TEXT = "";
    if($TOR == ""){
        $TOR_TEXT = $TOR_prev;
        $TOR = $TOR_prev;
        
    }else{
        $TOR_TEXT = $TOR;
    }
    if($CertificateofTransferCredential == ""){
        $CertificateofTransferCredential_TEXT = $CertificateofTransferCredential_prev;
        $CertificateofTransferCredential = $CertificateofTransferCredential_prev;
    }else{
        $CertificateofTransferCredential_TEXT = $CertificateofTransferCredential;
    }
    
    if($SubjectDescription == ""){
        $SubjectDescription_TEXT = $SubjectDescription_prev;
        $SubjectDescription = $SubjectDescription_prev;
    }else{
        $SubjectDescription_TEXT = $SubjectDescription;
    }
    
    if($PSA == ""){
        $PSA_TEXT = $PSA_prev;
        $PSA = $PSA_prev;
    }else{
        $PSA_TEXT = $PSA;
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
    
    
    
    
        $updatefileregular = "UPDATE `transfeeesdocumentsneed` SET `PSA`='$PSA_TEXT', `TOR`='$TOR_TEXT', `CertificateofTransferCredential`= '$CertificateofTransferCredential_TEXT', `SubjectDescription`= '$SubjectDescription_TEXT', `GoodMoral`= '$GoodMoral_TEXT', `BarangayClearance`='$BarangayClearance_TEXT', `MedicalClearance`='$MedicalClearance_TEXT', `IDPicture`='$IDPicture_TEXT' WHERE `enrollnumber` = '$enrollnumber1'; ";
        $update1 = mysqli_query($con, $updatefileregular);
        
        $location = "../../files/ENROLLEES_FILES/$enrollnumber1/";
      
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
            if(file_exists($location.$TOR)){
           
            move_uploaded_file($TOR_temp, $location.$TOR);  
            }else{
            move_uploaded_file($TOR_temp, $location.$TOR);
            if(is_file($location.$TOR_prev) == "true"){
                unlink($location.$TOR_prev);     
            } 
           
            }
            //form138
            if(file_exists($location.$CertificateofTransferCredential)){
            
            move_uploaded_file($CertificateofTransferCredential_temp, $location.$CertificateofTransferCredential);
            }else{
            move_uploaded_file($CertificateofTransferCredential_temp, $location.$CertificateofTransferCredential);
            if(is_file($location.$CertificateofTransferCredential_prev) == "true"){
                unlink($location.$CertificateofTransferCredential_prev);
               
            }

            }
            //diploma
            if(file_exists($location.$SubjectDescription)){
           
            move_uploaded_file($SubjectDescription_temp, $location.$SubjectDescription);
               
            }else{
            
            move_uploaded_file($SubjectDescription_temp, $location.$SubjectDescription);
            if(is_file($location.$SubjectDescription_prev) == "true"){
                unlink($location.$SubjectDescription_prev);
                
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
            $remarks = "DOCUMENTS HAS BEEN PASSED // TO BE APPROVED";
            $update_status = "UPDATE `studentapprovals` SET `remarks`='$remarks' WHERE enrollnumber = '$enrollnumber1';";
            mysqli_query($con, $update_status);
            }
            sleep(10);
          echo "<script> location.replace('../success.php');</script>";
        
    
    
    
    }//another cat
else{
    echo "<script>alert('prob here')</script>";
}

?>