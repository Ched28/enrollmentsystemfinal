<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php"); 

$iconsite = "/enrollmentsystemfinal/img/qcu.png";
?>
<main class="no-bg full-height">

<div class="content1 form-bg1">
<table> 
<tr>
<td  colspan="4">
<div class="headerforForm">
<div class="footer-title">
<img src="<?php  echo $iconsite;?>" alt=""> &nbsp;
<h2>ENROLLMENT FORM</h2> 
</div>
</div>
<hr>
<div class="danger">
<h3>BEFORE YOU FILL UP THE FORM:</h3>
<ol> 
<li> Before you fill up the form you have to take an Entrance Exam first. <i> Apply as a examinee? <a href="enrollnowqcucat.php"> Here </a> </i>.</li>
<li> Once you submit, you are agreeing that the QCU Online Portal has a right to record your personal information/datas that you entered here.</li>
<li> Once you submit, you are confirming all the details that you entered in this online form are real. </li>
</ol>
</div>
<div class="guidelines">
<h3>GUIDELINES ON THE REQUIREMENTS: </h3> 
<ol>
<li>The File should be on Portable Document Format (.pdf) and on Joint Photographic Experts Group Format (.jpeg/.jpg). Another file format should not be accepted. </li>
<li>All of the files should name by the requiredfile_lastname_firstname.pdf (Example: PSA_ROWY_CHEDRICK.pdf) should be on the CAPITAL LETTERS. </li>
<li> <strong> Original/photocopies of requirements will be received physically once GCQ has been lifted.</strong></li>
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
<li>
    For the Transfer Students
    <ul>
        <li> Transcript of Records with remarks ‘Copy for QCU’ (once enrolled) </li>
        <li> Certificate of Transfer Credential / Honorable Dismissal </li>
        <li> Subject Description </li>
        <li> PSA Birth Certificate</li>
        <li> Recent Barangay Clearance</li>
        <li> Medical Clearance (upon submission of medical requirements)</li>
        <li> 1 pc. 2x2 picture with name tag – white background</li>
    </ul>
</li>
<li>
    For Returnee Students
    <ul>
        <li> True Copy of Grades</li>
        <li> Recent Barangay Clearance</li>
        <li> Medical Clearance (upon submission of medical requirements)</li>
        <li> 1 pc. 2x2 picture with name tag – white background </li>
        <li> PSA Birth Certificate</li>
    </ul>
</li>
</ul>
</div>
<br>
<p class="data"> <strong> <i> All of your personal information, and documents shall be protected by RA No. 10173 or the Data Privacy Act of 2012. </strong> </i> </p>
</td>
</tr>
<tr> 
  <td> <button type="button" style="background-color:  #e82048" onclick="location.href='index.php'"> <i class="fas fa-home" ></i> &nbsp; Home </button> </td>
  <td> <button type="button" style="background-color:  #00AC17" onclick="location.href='index.php'"> <i class="fas fa-folder-plus"></i> &nbsp; Update your Documents </button> </td>
  <td> <button type="button" style="background-color:  #00AC17" onclick="location.href='enrollnow.php'"> <i class="fas fa-pen"></i> &nbsp; Enroll Now! </button> </td> 
</tr>

</table> 
</div>
</main>
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>