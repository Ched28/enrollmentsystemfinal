<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php");

include_once('dbcon.php');
if(isset($_POST['submit'])){
    $FullName_Last = $_POST['FullName-Last'];
    $FullName_First = $_POST['FullName-First'];
    $FullName_Middle = $_POST['FullName-Middle'];
    $Age = $_POST['Age'];
    $birthday = $_POST['birthday'];
    $birthplace = $_POST['birthplace'];
    $civilstatus = $_POST['civilstatus'];
    $gender = $_POST['gender'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $address_name = $_POST['address-name'];
    $zip_code = $_POST['zip_code'];
    $mothername = $_POST['mothername'];
    $motherjob = $_POST['motherjob'];
    $fathername = $_POST['fathername'];
    $fatherjob = $_POST['fatherjob'];
    $guardianname = $_POST['guardianname'];
    $relationship = $_POST['relationship'];
    $guardiancontactno = $_POST['guardiancontactno'];
    //regular documents 
    
    $PSA = $_FILES['PSA']['name'];
    $PSA_temp = $_FILES['PSA']['temp_name'];
    $Form137 = $_FILES['Form137']['name'];
    $Form137_temp = $_FILES['Form137']['temp_name'];
    $Diploma = $_FILES['Diploma']['name'];
    $Diploma_temp = $_FILES['Diploma']['temp_name'];
    $GoodMoral = $_FILES['GoodMoral']['name'];
    $GoodMoral_temp = $_FILES['GoodMoral']['temp_name'];
    $BarangayClearance = $_FILES['BarangayClearance']['name'];
    $BarangayClearance_temp = $_FILES['BarangayClearance']['temp_name'];
    $MedicalClearance = $_FILES['MedicalClearance']['name'];
    $MedicalClearance_temp = $_FILES['MedicalClearance']['temp_name'];
    $IDPicture = $_FILES['IDPicture']['name'];
    $IDPicture_temp = $_FILES['IDPicture']['temp_name'];

    $location = "$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/files";

}

?>


<a href="../enrollmentsystemfinal/login.php" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>

<div class="contents enroll">

<div class="enrollment-form">
    <div class="enrollment-form-bg">
        <form method="POST" enctype="multipart/form-data">
            <h2 style="text-align:center;">Enrollment Form For Regular Students</h2>

            <div class="form-data1">
                <div class="form-data-bg">
                    <div class="form-data-title">
                        <h3 style="text-align: center;">Personal Information</h3>
                    </div>
                    <hr>
                    <label for="FullName-Last">Last Name:</label>
                    <input type="text" name="" name="FullName-Last" placeholder="DELA CRUZ/DELA CRUZ JR."
                        class="one-line" required> <br>
                    <label for="FullName-First">First Name:</label>
                    <input type="text" name="" name="FullName-First" placeholder="JUAN" class="one-line"
                        required> <br>
                    <label for="FullName-Middle">Middle Name:</label>
                    <input type="text" name="" name="FullName-Middle" placeholder="LUNA" class="one-line"
                        required> <br>
                    <label for="Age">Age:</label>
                    <input type="text" name="" name="Age" placeholder="20" class="one-line" required> <br>
                    <label for="birthday">Birthdate:</label>
                    <input type="date" name="birthday" class="one-line">
                    <label for="birthplace">Place of Birthdate:</label>
                    <input type="text" name="" name="birthplace" placeholder="Quezon City" class="one-line"
                        required> <br> 
                </div>
            </div>
            <div class="form-data2">
                <div class="form-data-bg">
                
                    <label for="civilstatus">Civil Status</label>
                    <select name="civilstatus" id="civilstatus_id" required>
                        <option value="">Please Select Here</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>

                    </select><br>
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender_id" required>
                        <option value="">Please Select Here</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>

                    </select><br>
                    <label for="contactno">Contact No:</label>
                    <input type="text" name="" name="contactno" placeholder="09XXXXXXXXX" class="one-line"
                        required> <br>
                    <label for="email">Email:</label>
                    <input type="email" name="" name="email" placeholder="fn.mn.ln@gmail.com"
                        class="one-line" required> <br><br>
                 
                </div>
            </div>
            <div class="form-data3">
                <div class="form-data-bg">
                
                
                <label for="address-name"> Address: </label>
                <input type="textarea" name="address-name"
                    placeholder="LOT NO. BLOCK NO. STREET, SUBDIVISION/VILLAGE, BARANGAY, TOWN, CITY, REGION" class="one-line" required> <br>
                <label for="zip_code"> Zip Code </label>
                <input type="text" name="zip_code" placeholder="1003" required class="one-line">
                <br>
              
                </div>
            </div>
            <div class="form-data4">
                <div class="form-data-bg">
                
                    <label for="mothername"> Mother's Name </label>
                    <input type="text"  name="mothername"
                    placeholder="First Name MI Last Name" class="one-line" required> <br>
                    <label for="motherjob"> Mother's Job </label>
                    <input type="text"  name="motherjobs"
                    placeholder="Mother's Job" class="one-line" required> <br>
                    <label for="fathername"> Father's Name </label>
                    <input type="text" name="fathername"
                    placeholder="First Name MI Last Name" class="one-line" required> <br>
                    <label for="fatherjobs"> Father's Job </label>
                    <input type="text"  name="fatherjobs"
                    placeholder="Father's Job" class="one-line" required> <br>
                    <br>
 
            </div>
        </div>
            <div class="form-data5">
                <div class="form-data-bg">
                
                <label for="guardianname"> Guardian's Name </label>
                <input type="text"  name="guardianname"
                placeholder="First Name MI Last Name" class="one-line" required> <br>
                <label for="relationship">Relationship:</label>
                <select name="relationship" id="relationship_id" required>
                    <option value="Father"> Father </option>
                    <option value="Mother"> Mother </option>
                    <option value="Brother"> Brother </option>
                    <option value="Sister"> Sister </option>
                    <option value="Relatives"> Other Relatives </option>
                    <option value="Guardian"> Guardian </option>
                </select>
                <br>
                <label for="guardiancontactno"> Contact No. </label>
                <input type="text" name="guardiancontactno"
                placeholder="09XXXXXXXXX" class="one-line" required> <br> <br>

            </div>
            </div>
            <div class="form-data6">
                <div class="form-data-bg">
                    <div class="form-data-title">
                        <h3 style="text-align: center;">Educational Information</h3>
                    </div>
                    <hr>
                    <label for="schoollastattended"> Name of your Previous School </label>
                    <input type="text" name="schoollastattended"
                    placeholder="Name of the School" class="one-line" required> <br> <br>
                    <label for="schoollastattendedaddress"> School Address </label>
                    <input type="text" name="schoollastattendedaddress"
                    placeholder="Address of the School" class="one-line" required> <br> <br>
                    <label for="schoollastattendedlevel"> Highest Attained Level </label>
                    <input type="text" name="schoollastattendedlevel"
                    placeholder="Your Highest Year Level" class="one-line" required> <br> <br>
                </div>
                
            </div>   
            <div class="form-data7">
                <div class="form-data-bg">
                    <div class="form-data-title">
                        <h3 style="text-align: center;">Enrollment Information</h3>
                    </div>
                    <hr>
                    <label for="firstcourse"> First Choice of Course</label>
                    <select name="firstcourse" value=""> 
                        <option value=" ">First Choice of Course</option>  
                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                        <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                        <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                        <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                        <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
          
                    </select> <br> <br>
                    <label for="secondcourse"> Second Choice of Course</label>
                    <select name="secondcourse" value=""> 
                        <option value=" ">Second Choice of Course</option>  
                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                        <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                        <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                        <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                        <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
          
                    </select> <br> <br>
                    <label for="thirdcourse"> Third Choice of Course</label>
                    <select name="thirdcourse" value=""> 
                        <option value=" ">Third Choice of Course</option> 
                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                        <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                        <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                        <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                        <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                    </select><br><br>

                    
                </div>
                <h3 style="text-align:center">Documents Need</h3>
                <div class="form-data8">
                    
                    
                    <div class="file1">
                        <div class="filecat">
                            <label for="PSA">PSA Birth Certificate</label>
                            <input type="file" name="PSA" id="" class="choose" require>
                        </div>
                        <div class="filecat">
                            <label for="Form137">Form 137 w/ remarks ‘Copy for QCU’ (once enrolled)</label>
                            <input type="file" name="Form137" id="" class="choose" require>
                        </div>
                        <div class="filecat">
                            <label for="Form138">Form 138 – A</label>
                            <input type="file" name="Form138" id="" class="choose" require>
                        </div>
                        <div class="filecat">
                            <label for="Diploma">Diploma</label>
                            <input type="file" name="Diploma" id="" class="choose" require>
                        </div>
                    </div>
                    <div class="file1">
                        <div class="filecat">
                            <label for="GoodMoral">Certificate of Good Moral Character</label>
                            <input type="file" name="GoodMoral" id="" class="choose" require>
                        </div>
                        <div class="filecat">
                            <label for="BarangayClearance">Recent Barangay Clearance</label>
                            <input type="file" name="BarangayClearance" id="" class="choose" require>
                        </div>
                        <div class="filecat">
                            <label for="MedicalClearance">Medical Clearance issued by the University Health Office upon submission of medical requirements</label>
                            <input type="file" name="MedicalClearance" id="" class="choose" require>
                        </div>
                        <div class="filecat">
                            <label for="IDPicture">1pc. 2x2 with Name Tag – White Background</label>
                            <input type="file" name="IDPicture" id="" class="choose" require>
                        </div>
                    </div>
                    
                </div>
            </div>             
            <button type="submit" name="" style="background-color: #3366CC"> Submit </button>
    </div>

    </form>
</div>
</div>


<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>