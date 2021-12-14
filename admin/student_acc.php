<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("config/dbcon.php");


?>
<div class="content">
    <div class="enrollees">
    <div class="head-master">
        <h1> STUDENT ACCOUNTS </h1>
</div>
<div class="con">
<table>
<tr>
    <th>Student ID</th>
    <th> Username </th>

    <th></th>
</tr>
<tbody id="enrollees_data">
<tr>
    <?php 
    $selectmasterlist = "SELECT * FROM `studentaccount`";
    $run_select = mysqli_query($con, $selectmasterlist);
    if($run_select){
        if($run_select && mysqli_num_rows($run_select) > 0){
            while($row = mysqli_fetch_array($run_select)){
                $studentid = $row['StudentID'];
                $username = $row['Username'];
                
                ?>
                
                <td> <?php echo $studentid; ?> </td>
                <td> <?php echo $username; ?> </td> 
               
                <?php
            }
        }
    }
    ?>

</tbody>
</div>
</div>
</div>