<?php 
include_once("dbcon.php");

$selectenrolleesstatus = "SELECT studentinfo.StudentID, studentinfo.ID, studentinfo.`FullName-Last`, studentinfo.`FullName-First`, studentenrollmentinfo.category, studentenrollmentinfo.firstcourse, studentapprovals.Approval, studentapprovals.remarks FROM studentinfo INNER JOIN studentenrollmentinfo ON studentinfo.StudentID = studentenrollmentinfo.StudentID INNER JOIN studentapprovals ON studentinfo.StudentID = studentapprovals.StudentID;";
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

            <tr>
                <td><?php  echo $studentid;?></td>
                <td><?php  echo $studentlast;?></td>
                <td><?php  echo $studentfirst;?></td>
                <td><?php  echo $studentcat;?></td>
                <td><?php  echo $studentcourse;?></td>
                <td><?php  echo $studentapproval;?></td>
                <td><?php  echo $studentremarks;?></td>
                <td class='buttons'> <a href="select_info.php?id=<?php echo $id; ?>"><i class="fas fa-eye" ></i> </a> &nbsp; <a href=""> <i class="fas fa-folder"></i></a>  &nbsp; </a> <a href=""><i class="fas fa-edit"></i> </a> </td>
            </tr>
<?php 
        }
    }
}
?>

