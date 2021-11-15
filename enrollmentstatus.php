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
        $studentid = $row['StudentID'];

        $select1 = "";
    }
}
?>

<main>
        
        <div class="loginform">
        <div class="form-bg">
        
            <h1>Enrollment Status</h1>
            
          
            
            
       
    </div>
</div>        
    </main>


<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php");
?>

