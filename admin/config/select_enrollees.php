<?php 
include_once("dbcon.php");

$selectenrolleesstatus = "SELECT studentinfo.StudentID, studentinfo.`FullName-Last`, studentinfo.`FullName-First`, studentenrollmentinfo.category, studentenrollmentinfo.firstcourse, studentapprovals.Approval, studentapprovals.remarks FROM studentinfo INNER JOIN studentenrollmentinfo ON studentinfo.StudentID = studentenrollmentinfo.StudentID INNER JOIN studentapprovals ON studentinfo.StudentID = studentapprovals.StudentID;";
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

            ?>

            <tr>
                <td><?php  echo $studentid;?></td>
                <td><?php  echo $studentlast;?></td>
                <td><?php  echo $studentfirst;?></td>
                <td><?php  echo $studentcat;?></td>
                <td><?php  echo $studentcourse;?></td>
                <td><?php  echo $studentapproval;?></td>
                <td><?php  echo $studentremarks;?></td>
                <td class='buttons'> <button type="button" class="model-confirm"><i class="fas fa-eye" ></i> </button> &nbsp; <a href=""> <i class="fas fa-folder"></i></a>  &nbsp; </a> <a href=""><i class="fas fa-edit"></i> </a> </td>
            </tr>
<?php 
        }
    }
}
?>

<script type="text/javascript">
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