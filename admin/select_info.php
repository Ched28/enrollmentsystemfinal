<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
?>
<div class="content">
<?php
include_once("config/dbcon.php");
session_start();
$id = $_GET['id'];
$selectinfo = "SELECT * FROM `studentinfo` WHERE ID = '$id' LIMIT 1";
$select_run = mysqli_query($con, $selectinfo);

if($select_run){
    if($select_run && mysqli_num_rows($select_run) > 0){
        while($row = mysqli_fetch_array($select_run)){
            $studentid = $row['StudentID'];
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

            ?>
            <div class = "enrollees_indi">

            <div class="enrollees_indihead">
                <div>
            <h1><?php echo $studentid."&nbsp; <span style='font-size: .7em;'>$lastname, $firstname $middlename</span>"; ?></h1>
            </div>
            <div>
            <a onclick="myFunction()"><i class="fas fa-eye" ></i> </a> &nbsp; <a href=""> <i class="fas fa-folder"></i></a>  &nbsp; </a> <a href=""><i class="fas fa-edit"></i> </a>
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
            $selecteducinfo = "SELECT * FROM `studenteducationalinfo` WHERE StudentID = '$studentid' LIMIT 1";

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
             $selectenrollinfo = "SELECT * FROM `studentenrollmentinfo` WHERE StudentID = '$studentid' LIMIT 1";
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

                $selectfilereg = "SELECT * FROM `regulardocumentsneed` WHERE StudentID = '$studentid'";
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
                            ?>
                            
                            <div id="documents">
                               
                                <div class="enrollees_indibody">
                                    <h3>DOCUMENTS</h3>
                                    <table>
                                        <tr>
                                            <?php 
                                            if($PSA != ""){
                                                echo "<th> PSA </th>
                                                <td> $PSA </td>";
                                            }
                                            ?>
                                            
                                        </tr>
                                        <tr>
                                             <?php 
                                            if($Form137 != ""){
                                                echo "<th> FORM 137 </th>
                                                <td> $Form137 </td>";
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                        <?php 
                                            if($Form138 != ""){
                                                echo "<th> FORM 138 </th>
                                                <td> $Form138 </td>";
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                        <?php 
                                            if($Diploma != ""){
                                                echo "<th> Diploma </th>
                                                <td> $Diploma </td>";
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th> Good Moral </th>
                                            <td> <?php echo $GoodMoral;?></td>
                                        </tr>
                                        <tr>
                                            <th> Barangay Certificate </th>
                                            <td> <?php echo $BarangayClearance;?></td>
                                        </tr>
                                        <tr>
                                            <th> Medical Clearance </th>
                                            <td> <?php echo $MedicalClearance;?></td>
                                        </tr>
                                        <tr>
                                            <th> ID PICTURE </th>
                                            <td> <?php echo $IDPicture;?></td>
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