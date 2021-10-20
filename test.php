<?php 
session_start();
include("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/connections/dbcon.php");

$id = 0;
if(isset($_POST['CONFIRM'])){
    $examcode = $_POST['examcode'];
    $examdate = $_POST['examdate'];
    if(!empty($examcode) && !empty($examdate))
    {
        $query ="SELECT * FROM `studentexamresultstemp` WHERE ExamNo = '$examcode' AND ExamDate= '$examdate' LIMIT 1";
        $result = mysqli_query($con, $query);
               // $user_data = mysqli_fetch_assoc($result);

                 


?>

<form method="post">
   <input type="text" name="examcode">
   <input type="date" name="examdate">
   <input type="submit" name="confirm">

</form>
<?php 

while ($row = mysqli_fetch_array($result)) { 
                    
    $id = $row['id'];
    $code = $row['ExamCode'];
    echo $id;
    echo $code;
}
}

}  
?>