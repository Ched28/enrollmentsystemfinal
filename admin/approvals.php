<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/admin/header.php");

include_once("config/dbcon.php");
include_once("config/enc_dec.php");

$id = $_GET['id'];
$enc = qcu_decrypt($id);

$select = "SELECT studentinfo.ID, studentinfo.enrollnumber, `studentinfo`.`FullName-Last`, `studentinfo`.`FullName-First`, `studentinfo`.`FullName-Middle`, studentenrollmentinfo.category, studentenrollmentinfo.firstcourse, studentenrollmentinfo.campus, studentapprovals.Approval, studentapprovals.remarks FROM studentinfo INNER JOIN studentenrollmentinfo ON studentinfo.enrollnumber = studentenrollmentinfo.enrollnumber INNER JOIN studentapprovals ON studentinfo.enrollnumber = studentapprovals.enrollnumber WHERE studentinfo.enrollnumber = '$enc' LIMIT 1";
$select_run = mysqli_query($con, $select);
if($select_run){
    if($select_run && mysqli_num_rows($select_run) > 0){
        while($row = mysqli_fetch_array($select_run)){
            $enrollnumber = $row['enrollnumber'];
            $lastname = $row['FullName-Last'];
            $firstname = $row['FullName-First'];
            $middlename = $row['FullName-Middle'];
            $category = $row['category'];
            $firstcourse = $row['firstcourse'];
            $campus = $row['campus'];
            $approval = $row['Approval'];
            $remarks = $row['remarks'];
            $id = $row['ID'];
            $inc = qcu_encrypt($enrollnumber);

            ?>
            <div class="content">
                <div class="approval-form">
                    <div class="headapp">
                      
                        <p> Approval Form </p>
                        
                       
            </div>
            <div class="appbody">
                <div class="appbodyhead">
                    <div>
            <h1> <?php echo $enrollnumber; ?></h1>
            </div>
            <div class="appheadbutton">
                <a href='select_info.php?id=<?php echo $id?>' target="_top"><i class="fas fa-eye" ></i> </a>
            </div>
                        
            </div>
            <hr>
            <form method="POST" enctype="multipart/form-data" action="config/update_approvals.php?id=<?php echo $inc ?>">
            <table>
            <tr>
                <td> Last Name: </td>
                <td> <?php echo $lastname; ?></td>
            </tr>
            <tr>
                <td> First Name: </td>
                <td> <?php echo $firstname; ?></td>
            </tr>
            <tr>
                <td> Middle Name: </td>
                <td> <?php echo $middlename; ?> </td>
            </tr>
            <tr>
                <td> Category: </td>
                <td> <?php echo $category; ?></td>
            </tr>
            <tr>
                <td> Course: </td>
                <td>  <?php echo $firstcourse; ?></td>
            </tr>
            <tr>
                <td> Campus: </td>
                <td>  <?php echo $campus; ?></td>
            </tr>
            <tr>
                <td> Approval </td>
                <td> <select name="approvals" value="">
                    <option value="APPROVED" <?php if($approval == 'APPROVED'){ echo 'selected';} ?>> APPROVED </option>
                    <option value="TO BE APPROVED" <?php if($approval == 'TO BE APPROVED'){ echo 'selected'; } ?>> TO BE APPROVED</option>
                </select></td>
            </tr>
            <tr>
                <td> Remarks: </td>
                <td> <textarea rows="10" cols="50" name="remarks" id="txt1"> <?php echo $remarks; ?></textarea></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td class="remarksbtn"><a onclick="insertText('txt1', '/CHECKED DOCUMENTS()/');"> CHECKED DOCUMENTS('file names here') </a> &nbsp;
                <a onclick="insertText('txt1', '/INCOMPLETE DOCUMENTS/');"> INCOMPLETE DOCUMENTS </a> &nbsp;
                <a onclick="insertText('txt1', '/CORRUPTED  FILE()/');"> CORRUPTED  FILE('file names here') </a> &nbsp;
                <a onclick="insertText('txt1', '/INCORRECT  FILE()/');"> INCORRECT  FILE('file names here') </a> </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td><button type="submit" name="update"> UPDATE </button></td>
                
            </tr>
            
           
        </table>
        </form>
    </div>
</div>
</div>
            <?php 
        }
    }
}
?>
<script type="text/javascript">
      function insertText(elemID, text)
      {
        var elem = document.getElementById(elemID);
        elem.innerHTML += text;
      }
    </script>
