<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("config/dbcon.php");
$sectionname = $_GET['sec'];

?>
<div class="content">
    <div class="enrollees">
    <div class="head-master">
    <div>
    <h1><?php echo $sectionname;?> MASTERLIST</h1>
    </div>
    <div>
    <form method="POST" action="config/exporttoexcel.php?id=<?php echo $sectionname;?>">
    <ul>
       
    <li><button type="submit" name="excelbtn"><i class="fas fa-file-excel"></i> EXPORT TO EXCEL </button> </li>
    <li> <button type="submit" name="pdfbtn" formaction= "config/exporttopdfmasterlist.php?id=<?php echo $sectionname;?>"><i class="fas fa-file-pdf"></i> PRINT AS PDF </button>  </li>
       
     </ul>
     </form>
    </div>
    </div>
    <div class="con">
<table>
<tr>
    <th>Student ID</th>
    <th>Last Name</th>
    <th>First Name</th>

    <th></th>
</tr>
<tbody id="enrollees_data">
<tr>
    <?php 
    $selectmasterlist = "SELECT `student_sections`.`StudentID`, `studentinfo`.ID, `studentinfo`.`FullName-Last`, `studentinfo`.`FullName-First` FROM `student_sections` INNER JOIN `studentinfo` ON `student_sections`.`StudentID` = `studentinfo`.`StudentID` WHERE `student_sections`.`sectionname` = '$sectionname'";
    $run_select = mysqli_query($con, $selectmasterlist);
    if($run_select){
        if($run_select && mysqli_num_rows($run_select) > 0){
            while($row = mysqli_fetch_array($run_select)){
                $studentid = $row['StudentID'];
                $lastname = $row['FullName-Last'];
                $firstname = $row['FullName-First'];
                $id = $row['ID'];
                ?>
                
                <td> <?php echo $studentid; ?> </td>
                <td> <?php echo $lastname; ?> </td> 
                <td> <?php echo $firstname; ?> </td>
                <td class='buttons'> <a href="select_info.php?id=<?php echo $id; ?>"><i class="fas fa-eye" ></i> </a>  </td>
                            </tr>
                <?php
            }
        }
    }
    ?>

</tbody>
</div>

</div>
</div>