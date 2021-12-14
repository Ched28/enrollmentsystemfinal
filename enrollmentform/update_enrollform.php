<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php");
session_start();
include_once("config/dbcon.php");
include_once("config/enc_dec.php");
$id = $_GET['id'];
$dec = qcu_decrypt($id);
function selectENID($con, $dec){
    $selectstudent = "SELECT * FROM `student_examresult` WHERE ExamCode = $dec LIMIT 1";

    $result_student = mysqli_query($con, $selectstudent);
    if(mysqli_num_rows($result_student)>0){
        if($row1 = mysqli_fetch_assoc($result_student)){
            $enrollnumber = $row1['enrollnumber'];
                return $enrollnumber;
        }
    }
    
}

?>



<br>
<br>
<main class="no-bg full-height">
<form method="POST" enctype="multipart/form-data" id="form" action="config/update_enrollmentinfo.php?id=<?php echo $id?>"  onsubmit="onSubmit()">
<table class="enrollment-form-table">
  <tr>
    <td colspan="4" style="padding: 1em;margin: 1em;">
      <H1>UPDATE YOUR ENROLLMENT INFO</H1>

    </td>
</tr>

<tr>
    <td colspan="4">
      <H3>ENROLLMENT INFORMATION</H3>
      <hr>
    </td>
</tr>
<tr>
  <?php 
  $enrollnumber = selectENID($con, $dec);
//  echo "<script>alert('$enrollnumber')</script>";
  //248789
  $select_enrollinfo = "SELECT * FROM `studentenrollmentinfo` WHERE `enrollnumber` = '$enrollnumber'";
  $run_selectinfo = mysqli_query($con, $select_enrollinfo);
  if($run_selectinfo){
      if($run_selectinfo && mysqli_num_rows($run_selectinfo) > 0){
            while($row3 = mysqli_fetch_array($run_selectinfo)){
                $firstcourse = $row3['firstcourse'];
                $secondcourse = $row3['secondcourse'];
                $thirdcourse = $row3['thirdcourse'];
                $campus = $row3['campus'];

  ?>
<td> FIRST CHOICE  </td> 
  <td colspan="3"> <select name="firstcourse" value="" required> 
  <option value=" ">First Choice of Course</option>  
                   <?php 
                        $selectcourse = "SELECT * FROM course";
                        $select_run = mysqli_query($con, $selectcourse);
                        if($select_run){
                          while($row = mysqli_fetch_array($select_run)){
                              $course = $row['coursename'];
                              $outpt = "<option value='$course'";
                              if($course == $firstcourse){
                                  $outpt .=" selected> $course </option>";
                                  echo $outpt;
                              }
                              
                              else{
                                  $outpt .="> $course </option>";
                                  echo $outpt;
                              }
                          }
                        }
                   ?>
                    </select>  </td>  
</tr>
<tr>
<td> SECOND CHOICE  </td> 
  <td colspan="3">  <select name="secondcourse" value="" required> 
                        <option value=" ">Second Choice of Course</option>  
                        <?php 
                        $selectcourse = "SELECT * FROM course";
                        $select_run = mysqli_query($con, $selectcourse);
                        if($select_run){
                          while($row = mysqli_fetch_array($select_run)){
                              $course = $row['coursename'];
                              $outpt = "<option value='$course'";
                              if($course == $secondcourse){
                                  $outpt .=" selected> $course </option>";
                                  echo $outpt;
                              }
                              
                              else{
                                  $outpt .="> $course </option>";
                                  echo $outpt;
                              }
                          }
                        }
                   ?>
                    </select>  </td>  
</tr>
<tr>
<td> THIRD CHOICE  </td> 
  <td colspan="3">  <select name="thirdcourse" value="" required> 
                        <option value=" ">Third Choice of Course</option> 
                        <?php 
                        $selectcourse = "SELECT * FROM course";
                        $select_run = mysqli_query($con, $selectcourse);
                        if($select_run){
                          while($row = mysqli_fetch_array($select_run)){
                              $course = $row['coursename'];
                              $outpt = "<option value='$course'";
                              if($course == $thirdcourse){
                                  $outpt .=" selected> $course </option>";
                                  echo $outpt;
                              }
                              
                              else{
                                  $outpt .="> $course </option>";
                                  echo $outpt;
                              }
                          }
                        }
                   ?>
                      </select>  </td>  
</tr>
<tr>
  <td> CAMPUS </td>
  <td colspan="3">
  <select name="campus" value="" required> 
                        <option value=" ">Select Campus</option> 
                        <?php 
                        $selectcourse = "SELECT * FROM campus";
                        $select_run = mysqli_query($con, $selectcourse);
                        if($select_run){
                          while($row = mysqli_fetch_array($select_run)){
                              $campus1 = $row['campus_name'];
                              $outpt = "<option value='$campus1'";
                              if($campus1 == $campus){
                                  $outpt .=" selected> $campus1 </option>";
                                  echo $outpt;
                              }
                              
                              else{
                                  $outpt .="> $campus1 </option>";
                                  echo $outpt;
                              }
                          }
                        }
                   ?>
                      </select>
  </td>
</tr>
<?php 
}
      }
  }
  ?>
<tr>
  <td colspan="2"></td>
  <td colspan="2"><button type="button" class="model-confirm" style="background-color: #00AC17;color: white;"> Confirm </button></td>
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
    
    <td colspan="2"><button type="submit" name="submit" class="submit" style="background-color: #00AC17;color: white;" > Submit </button> </td>
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
function validation(){
    var form = document.getElementById("form");
    var email = document.getElementById("email").value;
    var emailtextbox = document.getElementById("email");
    var contact = document.getElementById("contactno").value;
    var contactTB = document.getElementById("contactno");
    var text = document.getElementById("text");
    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    var pattern2 = /^\d{11}$/;

    if(email.match(pattern) && contact.match(pattern2)){
        form.classList.add("valid");
        form.classList.remove("invalid");
        emailtextbox.style.borderColor = "#00ff00";
        contactTB.style.borderColor = "#00ff00";
        //text.style.color = "#00ff00";
    }else{
        form.classList.remove("valid");
        form.classList.add("invalid");
        emailtextbox.style.borderColor = "#ff0000";
        contactTB.style.borderColor = "#ff0000";
        //text.style.color = "#ff0000";
    }

    if(email == "" && contact == ""){
        form.classList.remove("valid");
        form.classList.add("invalid");
        emailtextbox.style.borderColor = "#ff0000";
        contactTB.style.borderColor = "#ff0000";
        //text.style.color = "#ff0000";

    }
}

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
<br>
<br>
<br>
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>