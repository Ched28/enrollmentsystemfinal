<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php");
include_once("config/dbcon.php");
session_start();
include_once("config/enc_dec.php");
$id = $_GET['id'];



$dec = qcu_decrypt($id);
echo "<script>alert('$dec')</script>";
$selectstudent = "SELECT * FROM `student_examresult` WHERE ExamCode = $dec LIMIT 1";

$result_student = mysqli_query($con, $selectstudent);
if(mysqli_num_rows($result_student)>0){
    if($row1 = mysqli_fetch_assoc($result_student)){
        $enrollnumber = $row1['enrollnumber'];
        $select_cat = "SELECT * FROM `studentenrollmentinfo` WHERE enrollnumber = '$enrollnumber' LIMIT 1";
        $result_cat = mysqli_query($con, $select_cat);
        if($row2 = mysqli_fetch_assoc($result_cat)){
            $enrollnumber1 = $row2['enrollnumber'];
            $enc = qcu_encrypt($enrollnumber1);
            $categorytemp = $row2['category'];
            

            

?>


<main class="no-bg full-height">
<form method="POST" enctype="multipart/form-data" id="form" action="config/update_files_tr.php?id=<?php echo $enc;?>">
<table class="enrollment-form-table">
<tr>
    <td colspan="4">
    <div class="footer-title">
<img src="<?php  echo $iconsite;?>" alt=""> &nbsp;
<h2>UPDATE YOUR DOCUMENTS</h2> 
</div>
     
</tr>
<tr>
    <input type="hidden" name="hidden_cat" value="<?php echo $categorytemp?>">
<?php 
     
     $select_info = "SELECT * FROM `studentinfo` WHERE enrollnumber = '$enrollnumber1' LIMIT 1";
     $result_info = mysqli_query($con, $select_info);
     if($result_info){

     while($row = mysqli_fetch_array($result_info)){
         $lastname = $row['FullName-Last'];
         $firstname = $row['FullName-First'];
         $middlename = $row['FullName-Middle'];
        ?>
        <td colspan="4" style="text-align:center;">
        <span style="font-size: 1.5em;font-weight: bold;"><?php echo "$lastname &nbsp;"; ?></span>
        <span style="font-size: 1.5em;font-weight: bold;"><?php echo "$firstname &nbsp;";?> </span>
        <span style="font-size: 1.5em;font-weight: bold;"><?php echo "$middlename &nbsp;"; ?> </span>
        <span style="font-size: 1.5em;font-weight: bold;"><?php echo "$categorytemp &nbsp;"; ?> </span>
        
     </td>
     
        <?php 
         $select_regular= "SELECT * FROM `transfeeesdocumentsneed` WHERE enrollnumber = '$enrollnumber1' LIMIT 1";
         $result_regular= mysqli_query($con, $select_regular);
         while($row3 = mysqli_fetch_array($result_regular)){
            $PSA = $row3['PSA'];
            $TOR = $row3['TOR'];
            $CertificateofTransferCredential = $row3['CertificateofTransferCredential'];
            $SubjectDescription = $row3['SubjectDescription'];
            $GoodMoral = $row3['GoodMoral'];
            $BarangayClearance = $row3['BarangayClearance'];
            $MedicalClearance = $row3['MedicalClearance'];
            $IDPicture = $row3['IDPicture'];
            
  ?>

</tr>
<tr>
<td>
Here are the requrirements you submitted...
    <ol>
    <?php echo "<li><i class='far fa-file-pdf'></i> TRANSCRIPT OF RECORDS WITH REMARKS ‘COPY FOR QCU’ (ONCE ENROLLED): &nbsp; $TOR </li>"; ?> 
            <?php echo "<li><i class='far fa-file-pdf'></i> CERTIFICATE OF TRANSFER CREDENTIAL / HONORABLE DISMISSAL: &nbsp; $CertificateofTransferCredential </li>" ; ?> 
            <?php echo "<li><i class='far fa-file-pdf'></i> SUBJECT DESCRIPTION: &nbsp; $SubjectDescription </li>"; ?> 
           <?php echo " <li><i class='far fa-file-pdf'></i> PSA: &nbsp; $PSA </li>"; ?> 
            <?php echo "<li><i class='far fa-file-pdf'></i> GOOD MORAL: &nbsp; $GoodMoral </li>"; ?> 
            <?php echo "<li><i class='far fa-file-pdf'></i> BARANGAY CLEARANCE: &nbsp; $BarangayClearance </li>"; ?> 
           <?php echo " <li><i class='far fa-file-pdf'></i> MEDICAL CLEARANCE: &nbsp; $MedicalClearance </li>"; ?> 
           <?php echo " <li><i class='far fa-file-pdf'></i> ID PICTURE: &nbsp; $IDPicture </li>"; ?> 
            </ol>
            Update your Documents Here:
            <p> TRANSCRIPT OF RECORDS WITH REMARKS ‘COPY FOR QCU’ (ONCE ENROLLED)
            <?php 

            if($TOR != ""){
              echo '<span style="font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #00AC17;border-radius:10px;"><i class="fas fa-save"> </i> ALREADY UPLOADED </span>';
            }else{
              echo "<span style='font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #FFB703;border-radius:10px;'><i class='fas fa-exclamation-circle'></i> UPLOAD YOUR FILE HERE </span>";
            }
            ?>
            </p> 
            <input type="file" name="TOR" id="" class="choose" value="<?php echo $TOR;?>" accept=".pdf,.docx">
            <input type="hidden" name="TOR_prev" value="<?php echo $TOR;?>">
            <p> CERTIFICATE OF TRANSFER CREDENTIAL / HONORABLE DISMISSAL 
            <?php 
            if($CertificateofTransferCredential != ""){
              echo '<span style="font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #00AC17;border-radius:10px;"><i class="fas fa-save"> </i> ALREADY UPLOADED </span>';
            }else{
            echo "<span style='font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #FFB703;border-radius:10px;'><i class='fas fa-exclamation-circle'></i> UPLOAD YOUR FILE HERE </span>";
            }
            ?>
            </p> 
            <input type="file" name="CertificateofTransferCredential" id="" class="choose" value="<?php echo $CertificateofTransferCredential;?>" accept=".pdf,.docx">
            <input type="hidden" name="CertificateofTransferCredential_prev" value="<?php echo $CertificateofTransferCredential;?>">
            <p> SUBJECT DESCRIPTION <?php 

            if($SubjectDescription != ""){
            echo '<span style="font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #00AC17;border-radius:10px;"><i class="fas fa-save"> </i> ALREADY UPLOADED </span>';
            }else{
            echo "<span style='font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #FFB703;border-radius:10px;'><i class='fas fa-exclamation-circle'></i> UPLOAD YOUR FILE HERE </span>";
            }
            ?></p>
            <input type="file" name="SubjectDescription" id="" class="choose" value="<?php echo $SubjectDescription;?>" accept=".pdf,.docx">
            <input type="hidden" name="SubjectDescription_prev" value="<?php echo $SubjectDescription;?>">
            <p> PSA 
            <?php 

            if($PSA != ""){
            echo '<span style="font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #00AC17;border-radius:10px;"><i class="fas fa-save"> </i> ALREADY UPLOADED </span>';
            }else{
            echo "<span style='font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #FFB703;border-radius:10px;'><i class='fas fa-exclamation-circle'></i> UPLOAD YOUR FILE HERE </span>";
            }
            ?>
            </p>
            <input type="file" name="PSA" id="" class="choose" value="<?php echo $PSA;?>" accept=".pdf,.docx">
            <input type="hidden" name="PSA_prev" value="<?php echo $PSA;?>">
            <p> CERTIFICATE OF GOOD MORAL CHARACTER 
            <?php 
            if($GoodMoral != ""){
            echo '<span style="font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #00AC17;border-radius:10px;"><i class="fas fa-save"> </i> ALREADY UPLOADED </span>';
            }else{
            echo "<span style='font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #FFB703;border-radius:10px;'><i class='fas fa-exclamation-circle'></i> UPLOAD YOUR FILE HERE </span>";
            }
            ?> </p>
            <input type="file" name="GoodMoral" id="" class="choose" value="<?php echo $GoodMoral;?>" accept=".pdf,.docx">
            <input type="hidden" name="GoodMoral_prev" value="<?php echo $GoodMoral;?>">
            <p> RECENT BARANGAY CLEARANCE 
            <?php 
            if($BarangayClearance != ""){
            echo '<span style="font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #00AC17;border-radius:10px;"><i class="fas fa-save"> </i> ALREADY UPLOADED </span>';
            }else{
            echo "<span style='font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #FFB703;border-radius:10px;'><i class='fas fa-exclamation-circle'></i> UPLOAD YOUR FILE HERE </span>";
            }
            ?> </p>
            <input type="file" name="BarangayClearance" id="" class="choose" value="<?php echo $BarangayClearance;?>" accept=".pdf,.docx">
            <input type="hidden" name="BarangayClearance_prev" value="<?php echo $BarangayClearance;?>">
            <p> MEDICAL CLEARANCE
            <?php 
            if($MedicalClearance != ""){
            echo '<span style="font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #00AC17;border-radius:10px;"><i class="fas fa-save"> </i> ALREADY UPLOADED </span>';
            }else{
            echo "<span style='font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #FFB703;border-radius:10px;'><i class='fas fa-exclamation-circle'></i> UPLOAD YOUR FILE HERE </span>";
            }
            ?> </p>
            <input type="file" name="MedicalClearance" id="" class="choose" value="<?php echo $MedicalClearance;?>" accept=".pdf,.docx">
            <input type="hidden" name="MedicalClearance_prev" value="<?php echo $MedicalClearance;?>">
            <p> 1PC 2X2 WITH NAME TAG – WHITE BACKGROUND 
            <?php 
            if($IDPicture != ""){
            echo '<span style="font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #00AC17;border-radius:10px;"><i class="fas fa-save"> </i> ALREADY UPLOADED </span>';
            }else{
            echo "<span style='font-size: .7em;font-weight: bold;padding: .3em;margin: .3em;color: black;background-color: #FFB703;border-radius:10px;'><i class='fas fa-exclamation-circle'></i> UPLOAD YOUR FILE HERE </span>";
            }
            ?>
            </p>
            <input type="file" name="IDPicture" id="" class="choose" value="<?php echo $IDPicture;?>" accept=".jpeg,.jpg,.png">
            <input type="hidden" name="IDPicture_prev" value="<?php echo $IDPicture;?>">
            <input type="hidden" name="hidden_studentID" value="<?php echo $enrollnumber ?>">
           <?php
            $_SESSION['enrollnumber'] = $enrollnumber;
            
             }
             //echo "<p> Looks like you haven't sent any documents</p>";
         ?>

         <?php 
            }
        }
            
        
      
       }
     
       }
     
       }
     
           ?>
    
</td>
</tr>
<tr>
    <td colspan="3"><button type="button" class="model-confirm" style="background-color: #00AC17;color: white;"> Confirm </button></td>

    </tr>
</table>
<div class="modal-bg">
  <div class="modal">
  <div class="footer-title modal-footer">
<img src="<?php  echo $iconsite;?>" alt=""> &nbsp;
<h2>CONFIRMATION</h2> 

</div>
<div class="modal-p">
  <h4>BEFORE YOU SUBMIT:</h4>
<ol> 
<li> Once you submit, you are agreeing that the QCU Online Portal has a right to record your personal information/datas that you entered here.</li>
<li> Once you submit, you are confirming all the details that you entered in this online form are real. </li>
</ol>
<div class="br">
  <br>
  <br>
</div>
<table style="width:100%;">
  <tr>
    
    <td colspan="2"><button type="submit" name="update" class="submit" style="background-color: #00AC17;color: white;"> Update </button> </td>
    <td colspan="2"><button type="button" name="cancel_btn" class="cancel_btn" style="background-color: #e82048;color: white;" > Go Back </button></td>
  </tr>
</table>

<!-- -->

  </div>
  </div>
</div>
</form>
</main>
<script type="text/javascript">
  var Confirm_btn = document.querySelector('.model-confirm');
var ModalBg = document.querySelector('.modal-bg');
var Cancel_btn = document.querySelector('.cancel_btn');
var Submit_btn = document.querySelector('.submit');

Confirm_btn.addEventListener('click', function(){
  ModalBg.classList.add('modal_active');

}); 
Cancel_btn.addEventListener('click', function(){
  ModalBg.classList.remove('modal_active');

}); 
Submit_btn.addEventListener('click', function(){
  ModalBg.classList.remove('modal_active');

}); 
  </script>
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>

