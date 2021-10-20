<?php 
session_start();
include("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/connections/dbcon.php");

$id = 0;
if(isset($_POST['submit'])){
    $examcode = $_POST['examcode'];
    $examdate = $_POST['examdate'];
    if(!empty($examcode) && !empty($examdate))
    {
        $query ="SELECT * FROM `studentexamresultstemp` WHERE ExamNo = '$examcode' AND ExamDate= '$examdate' LIMIT 1";
        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0)
            {
               // $user_data = mysqli_fetch_assoc($result);

                while ($row = mysqli_fetch_array($result)) { 
                    
                    $id = $row['id'];
                    $code = $row['ExamCode'];
                    echo $id;
                    echo $code;
                }
            }
        echo print_r($result);

    }    
}

?>

<form method="post">
   <input type="text" name="examcode">
   <input type="date" name="examdate">
   <input type="submit">
</form>