<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");

include_once("config/dbcon.php");
include_once("config/enc_dec.php");

$query = '';


?>
<div class="content">
    <div class="enrollees">
    <div class="head">
    <h1>LIST OF ENROLLEES</h1>
    <br>
    <div class="filter-drawer">
      
        <form action="" class="searchbox" method="POST">
   
    <select name="firstcourse" value=""> 
                        <option value=" ">ALL</option>  
                        <option value="Bachelor of Science in Information Technology">BSIT</option>
                        <option value="Bachelor of Science in Entrepreneurship">BSEntrep</option>
                        <option value="Bachelor of Science in Industrial Engineering">BSIE</option>
                        <option value="Bachelor of Science in Electronics Engineering">BSECE</option>
                        <option value="Bachelor of Science in Accountancy">BSA</option>
          
                </select>
    
   
    <select name="category" value=" "> 
                        <option value=" ">ALL</option>  
                        <option value="REGULAR">Regular</option>
                        <option value="TRANSFEREE">Transferee</option>
                        <option value="RETURNEE">Returnee</option>
                     
                    </select>
    
   
    <select name="approval" value=" "> 
                        <option value=" ">ALL</option>  
                        <option value="APPROVED">Approved</option>
                        <option value="TO BE APPROVED">To be Approved</option>
                     
          
                    </select>
                  <button type="submit" name="submit"><i class="fas fa-search"></i></button>
                    </form>
    
    </div>
    </div>
    <div class="con">
<table>

    
        

<tr>
    <th>EN NO.
    </th>
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
    <?php
   
      
       
        if(!isset($_POST['submit'])){
            

                $selectenrolleesstatus = "SELECT studentinfo.enrollnumber, studentinfo.ID, studentinfo.`FullName-Last`, studentinfo.`FullName-First`, studentenrollmentinfo.category, studentenrollmentinfo.firstcourse, studentapprovals.Approval, studentapprovals.remarks FROM studentinfo INNER JOIN studentenrollmentinfo ON studentinfo.enrollnumber = studentenrollmentinfo.enrollnumber INNER JOIN studentapprovals ON studentinfo.enrollnumber = studentapprovals.enrollnumber";
                $select_run = mysqli_query($con, $selectenrolleesstatus);
                if($select_run){
                    if($select_run && mysqli_num_rows($select_run) > 0){
                        while($row = mysqli_fetch_array($select_run)){
                            $enrollnumber = $row['enrollnumber'];
                            $studentlast = $row['FullName-Last'];
                            $studentfirst = $row['FullName-First'];
                            $studentcat = $row['category'];
                            $studentcourse =$row['firstcourse'];
                            $studentapproval = $row['Approval'];
                            $studentremarks = $row['remarks'];
                            $id = $row['ID'];
                            $inc = qcu_encrypt($enrollnumber);

                            ?>  
                            <td><?php  echo $enrollnumber;?></td>
                            <td><?php  echo $studentlast;?></td>
                            <td><?php  echo $studentfirst;?></td>
                            <td><?php  echo $studentcat;?></td>
                            <td><?php  echo $studentcourse;?></td>
                            <td><?php  echo $studentapproval;?></td>
                            <td><?php  echo $studentremarks;?></td>
                            <td class='buttons'> <a href="select_info.php?id=<?php echo $id; ?>"><i class="fas fa-eye" ></i> </a>  </td>
                            </tr>
 </tbody>
 <?php 
                        }
            }

        }
    
}else{
   
            $course = $_POST['firstcourse'];
            $category = $_POST['category'];
            $approval = $_POST['approval'];

            if($course != ' ' || $category != ' ' || $approval != ' '){
                $selectenrolleesstatus = "SELECT studentinfo.enrollnumber, studentinfo.ID, studentinfo.`FullName-Last`, studentinfo.`FullName-First`, studentenrollmentinfo.category, studentenrollmentinfo.firstcourse, studentapprovals.Approval, studentapprovals.remarks FROM studentinfo INNER JOIN studentenrollmentinfo ON studentinfo.enrollnumber = studentenrollmentinfo.enrollnumber INNER JOIN studentapprovals ON studentinfo.enrollnumber = studentapprovals.enrollnumber WHERE studentenrollmentinfo.category = '$category' OR studentenrollmentinfo.firstcourse = '$course' OR studentapprovals.Approval = '$approval';";
                $select_run = mysqli_query($con, $selectenrolleesstatus);
                if($select_run){
                    if($select_run && mysqli_num_rows($select_run) > 0){
                        while($row = mysqli_fetch_array($select_run)){
                            $enrollnumber = $row['enrollnumber'];
                            $studentlast = $row['FullName-Last'];
                            $studentfirst = $row['FullName-First'];
                            $studentcat = $row['category'];
                            $studentcourse =$row['firstcourse'];
                            $studentapproval = $row['Approval'];
                            $studentremarks = $row['remarks'];
                            $id = $row['ID'];
                            $inc = qcu_encrypt($enrollnumber);

                            ?>  
                            <td><?php  echo $enrollnumber;?></td>
                            <td><?php  echo $studentlast;?></td>
                            <td><?php  echo $studentfirst;?></td>
                            <td><?php  echo $studentcat;?></td>
                            <td><?php  echo $studentcourse;?></td>
                            <td><?php  echo $studentapproval;?></td>
                            <td><?php  echo $studentremarks;?></td>
                            <td class='buttons'> <a href="select_info.php?id=<?php echo $id; ?>"><i class="fas fa-eye" ></i> </a> </td>
                            
                           
                        
                            </tr>
 </tbody>
 
 <?php 
                        }
            }

        }
    }else{
        $selectenrolleesstatus = "SELECT studentinfo.enrollnumber, studentinfo.ID, studentinfo.`FullName-Last`, studentinfo.`FullName-First`, studentenrollmentinfo.category, studentenrollmentinfo.firstcourse, studentapprovals.Approval, studentapprovals.remarks FROM studentinfo INNER JOIN studentenrollmentinfo ON studentinfo.enrollnumber = studentenrollmentinfo.enrollnumber INNER JOIN studentapprovals ON studentinfo.enrollnumber = studentapprovals.enrollnumber";
                $select_run = mysqli_query($con, $selectenrolleesstatus);
                if($select_run){
                    if($select_run && mysqli_num_rows($select_run) > 0){
                        while($row = mysqli_fetch_array($select_run)){
                            $enrollnumber = $row['enrollnumber'];
                            $studentlast = $row['FullName-Last'];
                            $studentfirst = $row['FullName-First'];
                            $studentcat = $row['category'];
                            $studentcourse =$row['firstcourse'];
                            $studentapproval = $row['Approval'];
                            $studentremarks = $row['remarks'];
                            $id = $row['ID'];
                            $inc = qcu_encrypt($enrollnumber);

                            ?>  
                            <td><?php  echo $enrollnumber;?></td>
                            <td><?php  echo $studentlast;?></td>
                            <td><?php  echo $studentfirst;?></td>
                            <td><?php  echo $studentcat;?></td>
                            <td><?php  echo $studentcourse;?></td>
                            <td><?php  echo $studentapproval;?></td>
                            <td><?php  echo $studentremarks;?></td>
                            <td class='buttons'> <a href="select_info.php?id=<?php echo $id; ?>"><i class="fas fa-eye" ></i> </a> </td>
                            </tr>
 </tbody>
 <?php 
                        }
            }

        }
    }

}

?>




</table>
<a href="enrollees.php" target="_TOP" class="fixed-button"> TOP </a>
</div>
</div>
</div>



