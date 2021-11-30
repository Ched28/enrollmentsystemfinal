<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php");
include_once("config/dbcon.php");
session_start();
include_once("config/enc_dec.php");
$id = $_GET['id'];


?>

<main class="no-bg full-height">
<form method="POST" enctype="multipart/form-data" id="form" action="config/insert_datas.php?id=<?php echo $id?>"  onsubmit="onSubmit()">
<table class="enrollment-form-table">
  <tr>
    <td colspan="4" style="padding: 1em;margin: 1em;">
      <H1>ENROLLMENT FORM FOR REGULAR/FRESHMAN</H1>

    </td>
</tr>
<tr>
    <td colspan="4">
      <H3>PERSONAL INFORMATION</H3>
      <hr>
    </td>
</tr>
<tr>
  <td>LAST NAME</td>
  <td colspan="2"> FIRST NAME </td>
  <td> MIDDLE NAME (OPTIONAL) </td>
</tr>
<tr>
  <td> <input type="text" name="FullName-Last" placeholder="DELA CRUZ/DELA CRUZ JR." class="one-line" required></td>
  <td colspan="2"> <input type="text" name="FullName-First" placeholder="JUAN" class="one-line" required> </td>
  <td> <input type="text" name="FullName-Middle" placeholder="LUNA" class="one-line"> </td>
</tr>
<tr>
  <td> AGE </td>
  <td> BIRTHDAY </td>
  <td colspan="2"> PLACE OF BIRTH</td>
</tr>
<tr>
  <td> <input type="text" name="Age" placeholder="20" class="one-line" required> </td>
  <td> <input type="date" name="birthday" class="one-line" required> </td>
  <td colspan="2"> <input type="text" name="birthplace" placeholder="Quezon City" class="one-line" required></td>
</tr>
<tr> 
  <td> GENDER </td>
  <td colspan="3"> CIVIL STATUS </td>
</tr>
<tr>
  <td> <select name="gender" id="gender_id" required>
                        <option value="">Please Select Here</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>

                    </select> </td>
  <td colspan="3">  <select name="civilstatus" id="civilstatus_id" required>
                        <option value="">Please Select Here</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>

                    </select> </td>
</tr>
<tr> 
  <td> CONTACT NO </td>
  <td colspan="3"> EMAIL </td>
</tr>
<tr> 
  <td> <input type="text" name="contactno" placeholder="09XXXXXXXXX" class="one-line"
                        required id="contactno" onkeydown="validation()"> </td>
  <td colspan="3"> <input type="email" name="email" placeholder="fn.mn.ln@gmail.com"
                        class="one-line" required id="email" onkeydown="validation()">  </td>
</tr>
<tr>
<td colspan="3"> ADDRESS </td> 
  <td> ZIP CODE </td>  
</tr>
<tr>
<td colspan="3"> <input type="textarea" name="address-name"
                    placeholder="LOT NO. BLOCK NO. STREET, SUBDIVISION/VILLAGE, BARANGAY, TOWN, CITY, REGION" class="one-line" required> </td> 
  <td> <input type="text" name="zip_code" placeholder="1003" required class="one-line"> </td>
</tr>
<tr>
<td colspan="3"> MOTHER'S NAME </td> 
  <td> OCCUPATION </td>  
</tr>
<tr>
<td colspan="3">  <input type="text"  name="mothername"
                    placeholder="First Name MI Last Name" class="one-line" required> </td> 
  <td> <input type="text"  name="motherjob"
                    placeholder="Mother's Job" class="one-line" required> </td>  
</tr>
<tr>
<td colspan="3"> FATHER'S NAME </td> 
  <td> OCCUPATION </td>  
</tr>
<tr>
<td colspan="3"> <input type="text" name="fathername"
                    placeholder="First Name MI Last Name" class="one-line" required> </td> 
  <td> <input type="text"  name="fatherjob"
                    placeholder="Father's Job" class="one-line" required> </td>  
</tr>
<tr>
    <td colspan="4">
      <H3>GUARDIAN'S CONTACT INFORMATION</H3>
      <hr>
    </td>
</tr>
<tr>
<td> GUARDIAN'S NAME </td> 
  <td colspan="3">  <input type="text"  name="guardianname"
                placeholder="First Name MI Last Name" class="one-line" required> </td>  
</tr>
<tr>
<td> RELATIONSHIP </td> 
  <td colspan="3"> <select name="relationship" id="relationship_id" required>
                    <option value="Father"> Father </option>
                    <option value="Mother"> Mother </option>
                    <option value="Brother"> Brother </option>
                    <option value="Sister"> Sister </option>
                    <option value="Relatives"> Other Relatives </option>
                    <option value="Guardian"> Guardian </option>
                </select> </td>  
</tr>
<tr>
<td> GUARDIAN'S CONTACT NO </td> 
  <td colspan="3"> <input type="text" name="guardiancontactno"
                placeholder="09XXXXXXXXX" class="one-line" required  id="contactno" onkeydown="validation()"> </td>  
</tr>
<tr>
    <td colspan="4">
      <H3>EDUCATIONAL BACKGROUND</H3>
      <hr>
    </td>
</tr>
<tr>
<td> NAME OF YOUR PREVIOUS SCHOOL </td> 
  <td colspan="3">  <input type="text" name="schoollastattended"
                    placeholder="Name of the School" class="one-line" required>  </td>  
</tr>
<tr>
<td> SCHOOL ADDRESS </td> 
  <td colspan="3"> <input type="text" name="schoollastattendedaddress"
                    placeholder="Address of the School" class="one-line" required>  </td>  
</tr>
<tr>
<td> HIGHEST ATTAINED LEVEL </td> 
  <td colspan="3"> <input type="text" name="schoollastattendedlevel"
                    placeholder="Your Highest Year Level" class="one-line" required>  </td>  
</tr>
<tr>
    <td colspan="4">
      <H3>ENROLLMENT INFORMATION</H3>
      <hr>
    </td>
</tr>
<tr>
<td> FIRST CHOICE  </td> 
  <td colspan="3"> <select name="firstcourse" value=""> 
                        <option value=" ">First Choice of Course</option>  
                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                        <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                        <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                        <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                        <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
          
                    </select>  </td>  
</tr>
<tr>
<td> SECOND CHOICE  </td> 
  <td colspan="3">  <select name="secondcourse" value=""> 
                        <option value=" ">Second Choice of Course</option>  
                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                        <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                        <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                        <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                        <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
          
                    </select>  </td>  
</tr>
<tr>
<td> THIRD CHOICE  </td> 
  <td colspan="3">  <select name="thirdcourse" value=""> 
                        <option value=" ">Third Choice of Course</option> 
                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                        <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                        <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                        <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                        <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                    </select>  </td>  
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