<?php 
session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php");
include_once("dbcon.php");
include_once("enrollmentform/config/enc_dec.php");

$dec = $_GET['id'];
$examcode = qcu_decrypt($dec);




$select = "SELECT * FROM `student_examresult` WHERE ExamCode = '$examcode'";

$result = mysqli_query($con, $select);

if($result && mysqli_num_rows($result) > 0)

{
    while ($row = mysqli_fetch_array($result)){
        $enrollnumber = $row['enrollnumber'];

        $select1 = "SELECT * FROM `studentinfo` WHERE enrollnumber = '$enrollnumber' LIMIT 1";
        $result2 = mysqli_query($con, $select1);
        if($result2){
   
?>

<main class="no-bg full-height">
  
        <div class="loginform" style="padding: 2em;">
        <div class="enrollment-form-table">
        
            <h1>Enrollment Status</h1>
            <hr>
            <table>

            <tr>
            <?php
                    while($row1 = mysqli_fetch_array($result2)) {
                        
                        $lastname = $row1['FullName-Last'];
                        $firstname = $row1['FullName-First'];
                        $email = $row1['email'];
                        $fullname = $firstname." ".$lastname;
                        echo "<tr><td colspan='1' class='td1'> Exam Code: </td> <td colspan='3' class='td1 data1'>$examcode</td> </td><tr>";
                        echo "<tr><td colspan='1' class='td1'> Name: </td> <td colspan='3' class='td1 data1'>$fullname</td> </td><tr>";
                        echo "<tr><td colspan='1' class='td1'> Email: </td> <td colspan='3' class='td1 data1'>$email</td> </td><tr>";
           
                        $select2 = "SELECT * FROM `studentenrollmentinfo` WHERE enrollnumber = '$enrollnumber'";

                        $result3 = mysqli_query($con, $select2);

                        if($result3){
                                while($row3 = mysqli_fetch_array($result3)){
                                    $cat = $row3['category'];
                                    $firstchoice = $row3['firstcourse'];

                                    echo "<tr><td class='td1'> Category: </td> <td class='td1 data1'>$cat</td></tr>";
                                    echo "<tr><td class='td1'> First Choice: </td>   <td class='td1 data1'>$firstchoice</td></tr>";

                                    
                                    $selectapproved = "SELECT * FROM `studentapprovals` WHERE enrollnumber = '$enrollnumber'";
                                    $resultapproved = mysqli_query($con, $selectapproved);

                                    if($resultapproved){

                                        while($row4 = mysqli_fetch_array($resultapproved)){
                                            $approved = $row4['Approval'];
                                            $remarks = $row4['remarks'];
                                            echo "<tr><td class='td1'> Status: </td>   <td class='td1 data1'>$approved</td></tr>";
                                            echo "<tr><td class='td1'> Remarks: </td>   <td class='td1 data1'>$remarks</td></tr>";
                                            $inc = qcu_encrypt($examcode);
                                            if($cat == "REGULAR"){
                                                echo "<tr><td></td><td class='td1'>
           
                                            <a href='enrollmentform/update_documents.php?id=$inc' style='text-decoration: none;' class='status-btn-doc'><i class='fas fa-eye'></i> &nbsp; Update Your Documents </a>
                                   
                                            </td></tr>";
                                            }else if ($cat == "TRANSFEREE"){
                                                $inc = qcu_encrypt($examcode);
                                                echo "<tr><td></td><td class='td1'>
                                                <a href='enrollmentform/update_documents_tr.php?id=$inc' style='text-decoration: none;' class='status-btn-doc'><i class='fas fa-eye'></i> &nbsp; Update Your Documents </a>
                                                </td></tr>";
                                            }
                                            
                                            }
                                        }
                                    }
                                    
                                    

                                }
                        }

                        

                        
                        
                        
                    }
                    }
                 }
                
            ?>
            
            </tr>
            </table>
    </div>
</div>        
    </main>


<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php");
//<a href='' class='status-btn' style='text-decoration: none;'><i class='fas fa-eye'></i> &nbsp; View Your Info </a> &nbsp;&nbsp; 
?>

