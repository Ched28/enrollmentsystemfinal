<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php");

session_start();
$id = $_GET['id'];



?>




<main class="no-bg full-height">
<form method="POST" enctype="multipart/form-data" id="form" action="config/insert_datas_ret.php?id=<?php echo $id?>"  onsubmit="onSubmit()">
<table class="enrollment-form-table">
  <tr>
    <td colspan="4" style="padding: 1em;margin: 1em;">
      <H1>ENROLLMENT FORM FOR RETURNEE STUDENTS</H1>
<tr>
<tr>
    <td colspan="4">
      <H3>PERSONAL INFORMATION</H3>
      <hr>
    </td>
</tr>
<tr>
  <td>Student ID:
    <td> <input type="text" name="student_id_place" placeholder="01-0001" class="one-line" required></td>
  </td>
</tr>

    <td colspan="4">
      <H3>ENROLLMENT INFORMATION</H3>
      <hr>
    </td>
</tr>
<tr>
<td> Course:  </td> 
  <td colspan="3"> <select name="course" value=""> 
                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                        <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                        <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                        <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                        <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
          
                    </select>  </td>  
</tr>
<td> Returning Year Level:  </td> 
  <td colspan="3"> <select name="yrlevel" value=""> 
                        <option value="2nd Year">2nd Year</option>
                        <option value="3rd Year">3rd Year</option>
                        <option value="4th Year">4th Year</option>
          
                    </select>  </td>  
</tr>

<tr>
    <td colspan="4">
      <H3>SUBMISSION OF REQUIREMENTS</H3>
      <hr>
      <strong> You can pass all the required documents right now or later. Make sure that the file/s are not corrupted. </strong>
    </td>
</tr>
<tr>
  <td>
    
    <p> TRUE COPY OF GRADES</p>
  </td>
  <td colspan="3">
    <input type="file" name="TrueCopyofGrades" id="" class="choose" require>
  </td>

</tr>
<tr>
  <td>

    <p> CERTIFICATE OF GOOD MORAL </p>

  </td>
  <td colspan="3">
  <input type="file" name="GoodMoral" id="" class="choose" require>
  </td>

</tr>
<tr>
  <td>

    <p> RECENT BARANGAY CLEARANCE </p>

  </td>
  <td colspan="3">
  <input type="file" name="BarangayClearance" id="" class="choose" require>
  </td>

</tr>
<tr>
  <td>
    
    <p> MEDICAL CLEARANCE (upon submission of medical requirements) </p>
 
  </td>
  <td colspan="3">
  <input type="file" name="MedicalClearance" id="" class="choose" require>
  </td>

</tr>
<tr>
  <td>

    <p> 1 pc. 2x2 PICTURE WITH NAME TAG – WHITE BACKGROUND </p>
  </td>
  <td colspan="3">
  <input type="file" name="IDPicture" id="" class="choose" require>
  </td>

</tr>
<tr>
  <td>  
    <p> PSA BIRTH CERTIFICATE  </p>
  </td>
  <td colspan="3">
  <input type="file" name="PSA" id="" class="choose" require>
  </td>

</tr>

</tr>
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

<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>