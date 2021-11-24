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
//     }  padding: 12px 20px; 

<?php  

$selecteducinfo = "SELECT * FROM `studenteducationalinfo` WHERE StudentID = '$studentid' LIMIT 1";

$selectei_run = mysqli_query($con, $selecteducinfo);
if($selectei_run){
    if($selectei_run && mysqli_num_rows($selectei_run) > 0){
        while($row1 = mysqli_fetch_array($selectei_run)){
            $lastschoolattend = $row1['schoollastattended'];
            $schooladdress = $row1['schoollastattendedaddress'];
            $level = $row1['schoollastattendedlevel'];

            $selectenrollinfo = "SELECT * FROM `studentenrollmentinfo` WHERE StudentID = '$studentid' LIMIT 1";
            $selectenin = mysqli_query($con,$selectenrollinfo);

            if($selectenin){
                if($selectenin && mysqli_num_rows($selectenin) > 0){
                    while($row3 = mysqli_num_rows($selectenin)){
                        $category = $row3['category'];
                        $firstcourse = $row3['firstcourse'];
                        $secondcourse = $row3['secondcourse'];
                        $thirdcourse = $row3['thirdcourse'];

                        ?>
                        
                        
                        
                        <?php 
                    }
                }
            }
        }
    }
}
// ?>
<?php //include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php"); 

$iconsite = "/enrollmentsystemfinal/img/qcu.png";
$preloadersite = "/enrollmentsystemfinal/img/preloader1.gif";
$prog = "Now saving your inputs to the server...";
$prog1 = "Success, you will be redirected to another page....";
echo "<div class='preloader'> <img src='$preloadersite'> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> <p class='prog'>$prog1...</p></div>";
?>
<style type="text/css">
  .preloader{
    background-position: cover;
    
    color: black;
  }
  .preloader img{
    margin: auto;
  position: absolute;
  top: 0; left: 0; bottom: 0; right: 0;
  }
  .prog{
    text-align: center;
    justify-content: center;
    align-items: center;
    display: flex;
    font-family: 'Poppins', sans-serif;

  }
  </style>

<!--
<main class="no-bg">
<style type="text/css">
tr{
    border: 1px solid black;
}
h1{
    text-align: center;
}
img{
  width: 5%;
}
.data{
  text-align: center;
  color: #e82048;
}
.danger{
  background-color:#e82048;
  padding: 1em;
  border-radius: 8px;
  margin: 1em;
  text-align: left; 
}
.guidelines{
  background-color: #00AC17;  
  padding: 1em;
  border-radius: 8px;
  margin: 1em; 
  text-align: left;
}
</style>
<div class="content1 form-bg1">
<table> 
<tr>
<td  colspan="4">
<div class="headerforForm">
<div class="footer-title">
<img src="<?php  //echo $iconsite;?>" alt=""> &nbsp;
<h2>ENROLLMENT FORM</h2> 
</div>
</div>
<hr>
<div class="danger">
<h3>BEFORE YOU FILL UP THE FORM:</h3>
<ol> 
<li> Before you fill up the form you have to take an Entrance Exam first. <i> Apply as a examinee? <a href=""> Here </a> </i>.</li>
<li> Once you submit, you are agreeing that the QCU Online Portal has a right to record your personal information/datas that you entered here.</li>
<li> Once you submit, you are confirming all the details that you entered in this online form. </li>
</ol>
</div>
<div class="guidelines">
<h3>GUIDELINES ON THE REQUIREMENTS: </h3> 
<ol>
<li>The File should be on Portable Document Format (.pdf) and on Joint Photographic Experts Group Format (.jpeg/.jpg). Another file format should not be accepted. </li>
<li>All of the files should name by the requiredfile_lastname_firstname.pdf (Example: PSA_ROWY_CHEDRICK.pdf) should be on the CAPITAL LETTERS. </li>
</ol>
<h3>Here are the requirements on Quezon City University</h3>
<ul>
  <li>
    For the Regular/Freshman Enrollees
    <ul>

        <li> Form 137 (Secondary Permanent Record) with remarks ‘Copy for QCU’ – for SHS graduate (once enrolled) </li>
        <li> Form 138/Learner’s Report Card/SF9 (SHS Graduate)/ALS Rating & DepEd Certification to enroll incollege (ALS Passer) </li>
        <li> Diploma </li>
        <li> Certificate of Good Moral Character</li>
        <li> PSA Birth Certificate</li>
        <li> Recent Barangay Clearance</li>
        <li> Medical Clearance (upon submission of medical requirements)</li>
        <li> 1 pc. 2x2 picture with name tag – white background</li>
    </ul>
  </li>
</ul>
</div>
<br><br>
<p class="data"> <strong> <i> All of your personal information, and documents shall be protected by RA No. 10173 or the Data Privacy Act of 2012. </strong> </i> </p>
</td>
</tr>
<tr> 
  <td> <button type="button" style="background-color:  #e82048"> <i class="fas fa-home"></i> &nbsp; Home </button> </td>
  <td> <button type="button" style="background-color:  #00AC17"> <i class="fas fa-folder-plus"></i> &nbsp; Update your Documents </button> </td>
  <td> <button type="button" style="background-color:  #00AC17"> <i class="fas fa-pen"></i> &nbsp; Enroll Now! </button> </td> 
</tr>

</table> 
</div>
</main>
-->
<!--
<style type="text/css">

</style>
<main class="no-bg full-height">
<form method="POST" enctype="multipart/form-data" id="form" action="config/insert_datas.php">
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
    <td colspan="4">
      <H3>SUBMISSION OF REQUIREMENTS</H3>
      <hr>
      <strong> You can pass all the required documents right now or later. Make sure that the file/s are not corrupted. </strong>
    </td>
</tr>
<tr>
  <td>
    
    <p> PSA Birth Certificate</p>
  </td>
  <td colspan="3">
    <input type="file" name="PSA" id="" class="choose" require>
  </td>

</tr>
<tr>
  <td>

    <p> FORM 137 </p>

  </td>
  <td colspan="3">
  <input type="file" name="Form137" id="" class="choose" require>
  </td>

</tr>
<tr>
  <td>
    
    <p> FORM 138 </p>
 
  </td>
  <td colspan="3">
  <input type="file" name="Form138" id="" class="choose" require>
  </td>

</tr>
<tr>
  <td>

    <p> DIPLOMA </p>
  </td>
  <td colspan="3">
  <input type="file" name="Diploma" id="" class="choose" require>
  </td>

</tr>
<tr>
  <td>  
    <p> CERTIFICATE OF GOOD MORAL CHARACTER  </p>
  </td>
  <td colspan="3">
  <input type="file" name="GoodMoral" id="" class="choose" require>
  </td>

</tr>
<tr>
  <td>
    
   
    <p> RECENT BARANGAY CLEARANCE  </p>
    
  </td>
  <td colspan="3">
  <input type="file" name="BarangayClearance" id="" class="choose" require>
  </td>

</tr>
<tr>
  <td>  
    <p> MEDICAL CLEARANCE </p>
  </td>
  <td colspan="3">
  <input type="file" name="MedicalClearance" id="" class="choose" require>
  </td>

</tr>
<tr>
  <td>
    <p> 1PC 2X2 WITH NAME TAG – WHITE BACKGROUND </p>
  </td>
  <td colspan="3">
  <input type="file" name="IDPicture" id="" class="choose" require>
  </td>

</tr>
<tr>
  <td colspan="2"></td>
  <td colspan="2"><button type="submit" name="submit" style="background-color: #00AC17"> Submit </button></td>
</tr>
</table>
</form>
</main>
-->
<?php //include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>



<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("config/dbcon.php");
session_start();
$selectenrolleesstatus = "SELECT studentinfo.StudentID, studentinfo.ID, studentinfo.`FullName-Last`, studentinfo.`FullName-First`, studentenrollmentinfo.category, studentenrollmentinfo.firstcourse, studentapprovals.Approval, studentapprovals.remarks FROM studentinfo INNER JOIN studentenrollmentinfo ON studentinfo.StudentID = studentenrollmentinfo.StudentID INNER JOIN studentapprovals ON studentinfo.StudentID = studentapprovals.StudentID LIMIT 0,10;";
$select_run = mysqli_query($con, $selectenrolleesstatus);

if($select_run){
    if($select_run && mysqli_num_rows($select_run) > 0){
        while($row = mysqli_fetch_array($select_run)){
            $studentid = $row['StudentID'];
            $studentlast = $row['FullName-Last'];
            $studentfirst = $row['FullName-First'];
            $studentcat = $row['category'];
            $studentcourse =$row['firstcourse'];
            $studentapproval = $row['Approval'];
            $studentremarks = $row['remarks'];
            $id = $row['ID'];
            $_SESSION['id'] = $id;

?>
<div class="content">
    <div class="enrollees">
    <div class="head">
    <h1>LIST OF ENROLLEES</h1>
    <br>
    <div class="filter-drawer">
      
        <form action="" class="searchbox">
        <input type="text" name="search-text" placeholder="Search...">
    <select name="firstcourse" value=""> 
                        <option value=" ">ALL</option>  
                        <option value="Bachelor of Science in Information Technology">BSIT</option>
                        <option value="Bachelor of Science in Entrepreneurship">BSEntrep</option>
                        <option value="Bachelor of Science in Industrial Engineering">BSIE</option>
                        <option value="Bachelor of Science in Electronics Engineering">BSECE</option>
                        <option value="Bachelor of Science in Accountancy">BSA</option>
          
                </select>
    
   
    <select name="category" value=""> 
                        <option value=" ">ALL</option>  
                        <option value="REGULAR">Regular</option>
                        <option value="TRANSFEREE">Transferee</option>
                        <option value="RETURNEE">Returnee</option>
                     
                    </select>
    
   
    <select name="approval" value=""> 
                        <option value=" ">ALL</option>  
                        <option value="APPROVED">Approved</option>
                        <option value="TO BE APPROVED">To be Approved</option>
                     
          
                    </select>
                  <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
    
    </div>
    </div>
    <div class="con">
<table>

    
        

<tr>
    <th>Student ID</th>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Category</th>
    <th>Course</th>
    <th>Status</th>
    <th>Remarks</th>
    <th></th>
</tr>
<tbody id="enrollees_data">
<tr>
                <td><?php  echo $studentid;?></td>
                <td><?php  echo $studentlast;?></td>
                <td><?php  echo $studentfirst;?></td>
                <td><?php  echo $studentcat;?></td>
                <td><?php  echo $studentcourse;?></td>
                <td><?php  echo $studentapproval;?></td>
                <td><?php  echo $studentremarks;?></td>
                <td class='buttons'> <a href="select_info.php?id=<?php echo $id; ?>"><i class="fas fa-eye" ></i> </a> &nbsp; </a> <a href=""><i class="fas fa-edit"></i> </a> </td>
            </tr>
</tbody>
</table>
<div class="caption">
    <?php 
        //check how many dataa
        $selectrows = "SELECT studentinfo.StudentID, studentinfo.ID, studentinfo.`FullName-Last`, studentinfo.`FullName-First`, studentenrollmentinfo.category, studentenrollmentinfo.firstcourse, studentapprovals.Approval, studentapprovals.remarks FROM studentinfo INNER JOIN studentenrollmentinfo ON studentinfo.StudentID = studentenrollmentinfo.StudentID INNER JOIN studentapprovals ON studentinfo.StudentID = studentapprovals.StudentID;";
        $countrows = mysqli_query($con, $selectrows);

        $count1 = mysqli_num_rows($countrows);
        $count1 = $count1/10;
        $count2 = ceil($count1);

        for($b = 1;$b<=$count2;$b++){

        ?>  <a href='config/select_enrollees.php?page=<?php echo $b; ?>'><?php echo $b;?> </a><?php 
        }
    
    ?>
</div>
</div>
</div>
</div>
<?php 
        }
    }
}


?>

