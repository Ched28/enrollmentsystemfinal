<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");
include_once("config/dbcon.php");
include_once("config/enrollconfig.php");

if(isset($_POST['update'])){
    $schoolyear = mysqli_real_escape_string($con,$_POST['schoolyear']);
    $sem = mysqli_real_escape_string($con,$_POST['semester']);
    $counts = mysqli_real_escape_string($con,$_POST['countstudentsection']);
    $countp = mysqli_real_escape_string($con,$_POST['countstudentcourse']);
    $switch_con =  mysqli_real_escape_string($con,$_POST['switch_con']);
    $update = "UPDATE `enrollmentconfiguration` SET `schoolyear`= '$schoolyear', `semester`='$sem', `switchconfig`='$switch_con',`countstudentsection`='$counts',`countstudentcourse`='$countp' WHERE `id` =  1;";
    $update_run = mysqli_query($con, $update);
    if($update_run){
        echo "<script>alert('Success!');</script>";
        echo "<script>location.replace('dashboard.php');</script>";
    }else{
        echo "<script>alert('Error!');</script>";
    }

    
}

?>
<div class="content">
<div class="settings-main">
  <div class="settings-head">
  <h1> SETTINGS </h1> 
  </div>

<div class="settings-body">
    <?php 
    $select1 = "SELECT * FROM `enrollmentconfiguration`";
    $run_1 = mysqli_query($con, $select1);
    if($run_1){
        if($run_1 && mysqli_num_rows($run_1)){
            while($row7 = mysqli_fetch_array($run_1)){
                $schoolyear = $row7['schoolyear'];
                $sem = $row7['semester'];
                $counts = $row7['countstudentsection'];
                $countp = $row7['countstudentcourse'];
                $switch = $row7['switchconfig'];

             
     
    ?>
    <table>
        
        <tr>
            <td></td>
            <td> <a href="config/restore.php" style="color: white; text-decoration: none;  background-color: #c72344; padding: .4em;border-radius:10px;"> <i class="fas fa-database"></i> RESTORE DATABASE </a>
            </td>
        </tr>
        <tr>
            <td></td>
            <td> <a href='config/backup.php' style="color: white; text-decoration: none; background-color: #c72344; padding: .4em;border-radius:10px"> <i class="fas fa-database"></i> EXPORT DATABASE</a>
            </td>
        </tr>
        <tr>
       
        <form method="POST">
        <td><h3> School Year:  </h3></td>
            <td> <input type="text" name="schoolyear" value="<?php echo $schoolyear;?>"></td>
        </tr>
        <tr>
        <td><h3> Semester:</h3></td>
            <td> <select name="semester" value="">
                <option value="1" <?php if($sem == 1){ echo 'selected';}?>> 1st Semester </option>
                <option value="2" <?php if($sem == 2){ echo 'selected';}?>> 2nd Semester </option>
            </select></td>
        </tr>
        <tr>
        <td><h3> Allowed Capacity Per Section: </h3></td>
            <td> <input type="text" name="countstudentsection" value="<?php echo $counts;?>"></td>
        </tr>
        <tr>
        <td><h3> Allowed Capacity Per Course:</h3></td>
            <td> <input type="text" name="countstudentcourse" value="<?php echo $countp;?>"></td>
        </tr>
        <tr>
        <td><h3> Switch Config:</h3></td>
        <td> <select name="switch_con" value="">
                <option value="0" <?php if($switch == 0){ echo 'selected';}?>> OFF </option>
                <option value="1" <?php if($switch == 1){ echo 'selected';}?>> ON </option>
            </select></td>
        </tr>
        <?php 
           }
        }
    }
    ?>
        <tr>
            <th></th>
            <td> <button type="submit" name="update" style="background-color:#00AC17;color: white;"> UPDATE</button></td>
        </tr>
        </form>  
    </table>
    
</div>
</div>
</div>