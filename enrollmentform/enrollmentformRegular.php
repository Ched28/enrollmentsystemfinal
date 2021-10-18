<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php"); ?>


<a href="enrollmentsystem/login.php" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>

<div class="contents enroll">

<div class="enrollment-form">
    <div class="enrollment-form-bg">
        <form>
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
                <input type="text" name="" name="address-name"
                    placeholder="LOT NO. STREET NAME SUBDIVISION NAME" class="one-line" required> <br>
                <label for="address-brgy"> Barangay: </label>
                <select name="address-brgy" id="address-brgy_id" required>
                    <option value="">Please Select Here</option>
                    <option value="">Sample Barangay</option>
                </select>
                <br>
                <label for="address-district"> District: </label>
                <select name="address-district" id="address-district_id" required>
                    <option value="">Please Select Here</option>
                    <option value="Discrict I">Discrict I</option>
                    <option value="Discrict II">Discrict II</option>
                    <option value="Discrict III">Discrict III</option>
                    <option value="Discrict IV">Discrict IV</option>
                    <option value="Discrict V">Discrict V</option>
                    <option value="Discrict VI">Discrict VI</option>
                </select>
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
                    <label for="schoollastattended"> School Address </label>
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
                    <input type="text" name="firstcourse"
                    placeholder="First Choice" class="one-line" required readonly> <br> <br>
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
                    <h3 style="text-align:center">Documents Need</h3>
                    <label for="PSA">PSA</label>
                        <input type="file" name="PSA" id="" class="choose">
                </div>
            </div>             
            <button type="button" name="" style="background-color: #3366CC"> Next </button>
    </div>

    </form>
</div>
</div>
</div>

<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>