<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
?>
<div class="content">
<?php
session_start();
include_once("config/dbcon.php");
include_once("config/enc_dec.php");

$id = $_GET['id'];
$selectinfo = "SELECT * FROM `studentinfo` WHERE ID = '$id' LIMIT 1";
$select_run = mysqli_query($con, $selectinfo);

if($select_run){
    if($select_run && mysqli_num_rows($select_run) > 0){
        while($row = mysqli_fetch_array($select_run)){
            $enrollnumber = $row['enrollnumber'];
            $_SESSION['enrollnumber'] = $enrollnumber;
            $lastname = $row['FullName-Last'];
            $firstname = $row['FullName-First'];
            $middlename = $row['FullName-Middle'];
            $age = $row['Age'];
            $birthday = $row['birthday'];
            $birthplace = $row['birthplace'];
            $civilstatus = $row['civilstatus'];
            $gender = $row['gender'];
            $contactno = $row['contactno'];
            $email = $row['email'];
            $address = $row['address-name'];
            $zipcode = $row['zip_code'];
            $mothername = $row['mothername'];
            $motherjob  = $row['motherjob'];
            $fathername = $row['fathername'];
            $fatherjob  = $row['fatherjob'];
            $guardianname = $row['guardianname'];
            $relationship  = $row['relationship'];
            $guardiancontactno = $row['guardiancontactno'];
            $studentinc = qcu_encrypt($enrollnumber);
            $student_confirm = $row['StudentID'];
            $inc_student = qcu_encrypt($student_confirm);
            ?>
            <div class = "enrollees_indi">

            <div class="enrollees_indihead">
                <div>
            <h1><?php echo $enrollnumber."&nbsp; <span style='font-size: .7em;'>$lastname, $firstname $middlename</span>"; ?></h1>
            </div>
            <div>
            <a href='' target="_top"><i class="fas fa-eye" ></i> </a> &nbsp; <a onclick="myFunction()"> <i class="fas fa-folder"></i></a>  &nbsp; </a> <?php if($student_confirm != ' ') { echo "<a href='select_status.php?id=$inc_student'><i class='far fa-lightbulb'></i> </a>";}else{echo "<a href='approvals.php?id=$studentinc'><i class='fas fa-edit'></i> </a>"; } ?> 
            </div>
            
            
            </div>
            <hr>
            <div id="studentinfo">
            <div class="enrollees_indibody">
                <div class="basic">
                <table>
                    <tr>
                        <th> Age </th>
                        <th> Birthdate </th>
                        <th> Birthplace </th>
                        <th> Gender </th>
                        <th> Civil Status </th>
                    </tr>
                    <tr>
                    <td> <?php echo $age; ?> </td>
                    <td> <?php echo $birthday; ?> </td>
                    <td> <?php echo $birthplace; ?> </td>
                    <td> <?php echo $gender; ?> </td>
                    <td> <?php echo $civilstatus; ?> </td>
                    </tr>
                    
                </table>
                </div>
                <hr>
                <div class="contactinfo">
                <table>
                <tr>
                        <th>Address</th>
                        <td><?php echo $address;?></td>
                        <th>Zip Code</th>
                        <td><?php echo $zipcode;?></td>


                    </tr>
                    <tr>
                    <th>Contact No </th>
                    <td><?php echo $contactno;?></td>
                    </tr>
                    <tr>
                    <th>Email </th>
                    <td><?php echo $email;?></td>
                    </tr>
                </table>
                </div>
                <hr>
                <div class="familyinfo">
                    <table>
                        <tr>
                            <th> Mother's Name </th>
                            <td><?php echo $mothername;?></td>
                            <th> Mother's Job </th>
                            <td><?php echo $motherjob;?></td>
                        </tr>
                        <tr>
                            <th> Father's Name </th>
                            <td><?php echo $fathername;?></td>
                            <th> Father's Job </th>
                            <td><?php echo $fatherjob;?></td>
                        </tr>
                    </table>
                </div>
                <hr>
                <div class="guardianinfo">

                <table>
                <tr>
                            <th> Guarduan's Name </th>
                            <td><?php echo $guardianname;?></td>
                            <th> Relationship </th>
                            <td><?php echo $relationship;?></td>
                        </tr>
                        <tr>
                        <th> Guardian's Contact Number </th>
                            <td><?php echo $guardiancontactno;?></td>
                        </tr>
                </table>
                </div>
                <hr>

            </div>
            <?php 
            $selecteducinfo = "SELECT * FROM `studenteducationalinfo` WHERE enrollnumber = '$enrollnumber' LIMIT 1";

            $selectei_run = mysqli_query($con, $selecteducinfo);
            if($selectei_run){
                if($selectei_run && mysqli_num_rows($selectei_run) > 0){
                    while($row1 = mysqli_fetch_array($selectei_run)){
                        $lastschoolattend = $row1['schoollastattended'];
                        $schooladdress = $row1['schoollastattendedaddress'];
                        $level = $row1['schoollastattendedlevel'];

                ?>
               
            <div class="enrollees_indibody">
                    <div class="educationalbg">
                        <table>
                            <tr>
                                <th> Last School Attended </th>
                                <td><?php echo $lastschoolattend;?></td>
                            </tr>
                            <tr>
                                <th> Address of the School </th>
                                <td><?php echo $schooladdress;?></td>
                            </tr>
                            <tr>
                                <th> Highest Level Attained </th>
                                <td><?php echo $level;?></td>
                            </tr>
                        </table>
                    </div>
            </div>
            
            <?php 
             $selectenrollinfo = "SELECT * FROM `studentenrollmentinfo` WHERE enrollnumber = '$enrollnumber' LIMIT 1";
             $selectenin = mysqli_query($con,$selectenrollinfo);
 
             if($selectenin){
                 if($selectenin && mysqli_num_rows($selectenin) > 0){
                     while($row3 = mysqli_fetch_array($selectenin)){
                         $category = $row3['category'];
                         $_SESSION['cat'] = $category;
                         $firstcourse = $row3['firstcourse'];
                         $secondcourse = $row3['secondcourse'];
                         $thirdcourse = $row3['thirdcourse'];

                 ?>
                    <div class="enrollees_indibody">
                        <div class="enrollees_enrollinfo">
                            <table>
                                <tr>
                                    <th> Category </th>
                                    <td><?php echo $category;?></td>
                                </tr>
                                <tr>
                                    <th> First Choice of Course </th>
                                    <td><?php echo $firstcourse;?></td>
                                </tr>
                                <tr>
                                    <th> Second Choice of Course </th>
                                    <td><?php echo $secondcourse;?></td>
                                </tr>
                                <tr>
                                    <th> Third Choice of Course </th>
                                    <td><?php echo $thirdcourse;?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                 <?php 
                     }
                    }
                }
            ?>
                
        </div>
            <?php      }
                }
            }
            ?>
            <?php 
            $cat = $_SESSION['cat'];
            if($cat == "REGULAR"){

                //select regular files 

                $selectfilereg = "SELECT * FROM `regulardocumentsneed` WHERE enrollnumber = '$enrollnumber'";
                $select_file_run = mysqli_query($con, $selectfilereg);

                if($select_file_run){
                    if($select_file_run && mysqli_num_rows($select_file_run) > 0){
                        while($row4 = mysqli_fetch_array($select_file_run)){
                            $PSA = $row4['PSA'];
                            $Form137 = $row4['Form137'];
                            $Form138 = $row4['Form138'];
                            $Diploma = $row4['Diploma'];
                            $GoodMoral = $row4['GoodMoral'];
                            $BarangayClearance = $row4['BarangayClearance'];
                            $MedicalClearance = $row4['MedicalClearance'];
                            $IDPicture = $row4['IDPicture'];
                            $location = "../files/ENROLLEES_FILES/$enrollnumber/$IDPicture";
                            $studentinc = qcu_encrypt($enrollnumber);
                            ?>
                            
                            <div id="documents">
                               
                                <div class="enrollees_indibody">
                                    <h3>DOCUMENTS</h3>
                                    <table>
                                    <tr>
                                            <?php 
                                            if($IDPicture != ""){
                                                echo "<th> ID Picture </th>
                                                
                                                <td> <img src ='$location' style='width:200px;height:200px;'> </td>";
                                            }
                                            
                                            ?>
                                        </tr>
                                        <tr>
                                            <?php 
                                            if($PSA != ""){
                                                
                                                echo "<th> PSA </th>

                                                <td> <a href='readpdf.php?file=$PSA&id=$studentinc' target='_blank'> $PSA </a> </td>";
                                            }
                                            ?>
                                            
                                        </tr>
                                        <tr>
                                             <?php 
                                            if($Form137 != ""){
                                                
                                                echo "<th> Form 137 </th>

                                                <td> <a href='readpdf.php?file=$Form137&id=$studentinc' target='_blank'> $Form137 </a> <br></td>";
                                            }
                                            ?>
                                            
                                        </tr>
                                        <tr>
                                        <?php 
                                            if($Form138 != ""){
                                               
                                                echo "<th> Form 138 </th>

                                                <td> <a href='readpdf.php?file=$Form138&id=$studentinc' target='_blank'> $Form138 </a> </td>";
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                        <?php 
                                           if($Diploma != ""){
                                           
                                            echo "<th> Diploma </th>

                                            <td> <a href='readpdf.php?file=$Diploma&id=$studentinc' target='_blank'> $Diploma </a> </td>";
                                        }
                                        ?>
                                        
                                        </tr>
                                        <tr>
                                         <?php 
                                            if($GoodMoral != ""){
                                               
                                                echo "<th> Good Moral </th>
    
                                                <td> <a href='readpdf.php?file=$GoodMoral&id=$studentinc' target='_blank'> $GoodMoral </a> </td>";
                                            }
                                        ?>
                                        </tr>
                                        <tr>
                                        <?php 
                                            if($BarangayClearance != ""){
                                               
                                                echo "<th> Barangay Certificate </th>
    
                                                <td> <a href='readpdf.php?file=$BarangayClearance&id=$studentinc' target='_blank'> $BarangayClearance </a> </td>";
                                            }
                                        ?>
                                        </tr>
                                        <tr>
                                        <?php 
                                            if($MedicalClearance != ""){
                                               
                                                echo "<th> Medical Clearance </th>
    
                                                <td> <a href='readpdf.php?file=$MedicalClearance&id=$studentinc' target='_blank'> $MedicalClearance </a> </td>";
                                            }
                                        ?>
                                        </tr>
                                       
                                    </table>
                                </div>
                            </div>
                            <?php 
                        }
                    }
                }
            }

            ///another cat 
            else if($cat == "TRANSFEREE"){
                $selectfiletrans = "SELECT * FROM `transfeeesdocumentsneed` WHERE enrollnumber = '$enrollnumber'";
                $select_file_run1 = mysqli_query($con, $selectfiletrans);

                if($select_file_run1){
                    if($select_file_run1 && mysqli_num_rows($select_file_run1) > 0){
                        while($row4 = mysqli_fetch_array($select_file_run1)){
                            $PSA = $row4['PSA'];
                            $TOR = $row4['TOR'];
                            $TransCer = $row4['CertificateofTransferCredential'];
                            $subject = $row4['SubjectDescription'];
                            $BarangayClearance = $row4['BarangayClearance'];
                            $MedicalClearance = $row4['MedicalClearance'];
                            $IDPicture = $row4['IDPicture'];
                            $location = "../files/ENROLLEES_FILES/$enrollnumber/$IDPicture";
                            $studentinc = qcu_encrypt($enrollnumber);
                            ?>
                            
                            <div id="documents">
                               
                                <div class="enrollees_indibody">
                                    <h3>DOCUMENTS</h3>
                                    <table>
                                        <tr>
                                            <?php 
                                            if($PSA != ""){
                                                
                                                echo "<th> PSA </th>

                                                <td> <a href='readpdf.php?file=$PSA&id=$studentinc' target='_blank'> $PSA </a> </td>";
                                            }
                                            ?>
                                            
                                        </tr>
                                        <tr>
                                             <?php 
                                            if($TOR != ""){
                                                
                                                echo "<th> Transcript of Records From Previous School </th>

                                                <td> <a href='readpdf.php?file=$TOR&id=$studentinc' target='_blank'> $TOR </a> <br></td>";
                                            }
                                            ?>
                                            
                                        </tr>
                                        <tr>
                                        <?php 
                                            if($subject != ""){
                                               
                                                echo "<th> Subject Description </th>

                                                <td> <a href='readpdf.php?file=$subject&id=$studentinc' target='_blank'>$subject </a> </td>";
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                        <?php 
                                           if($TransCer != ""){
                                           
                                            echo "<th> Certificate of Transfer Credential </th>

                                            <td> <a href='readpdf.php?file=$TransCer&id=$studentinc' target='_blank'> $TransCer </a> </td>";
                                        }
                                        ?>
                                        
                                        </tr>
                                        
                                        <tr>
                                        <?php 
                                            if($BarangayClearance != ""){
                                               
                                                echo "<th> Barangay Certificate </th>
    
                                                <td> <a href='readpdf.php?file=$BarangayClearance&id=$studentinc' target='_blank'> $BarangayClearance </a> </td>";
                                            }
                                        ?>
                                        </tr>
                                        <tr>
                                        <?php 
                                            if($MedicalClearance != ""){
                                               
                                                echo "<th> Medical Clearance </th>
    
                                                <td> <a href='readpdf.php?file=$MedicalClearance&id=$studentinc' target='_blank'> $MedicalClearance </a> </td>";
                                            }
                                        ?>
                                        </tr>
                                        <tr>
                                            <?php 
                                            if($IDPicture != ""){
                                                echo "<th> ID Picture </th>
                                                
                                                <td> <img src ='$location' style='width:200px;height:200px;'> </td>";
                                            }
                                            
                                            ?>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <?php 
                        }
                    }
                }
            }
            ?>
            </div> 
        <?php    
        }
        
    }
}
?>
</div>

<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("studentinfo");
  var y = document.getElementById("documents");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
</script>