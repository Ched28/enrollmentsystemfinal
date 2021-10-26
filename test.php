<?php 




//for($a = 1;$a<=100;$a++){
  //  $enrollmentyear = date("y");
   //$getstring = str_pad($a, 4, 0, STR_PAD_LEFT);
   //$id = "$enrollmentyear-$getstring";
   //echo "$id <br>";


//}


//$idint = 0001; 

//echo "21-$idint";
include_once('dbcon.php');

$select1 = "SELECT StudentID FROM `studentinfo`;";
    $checkresult = mysqli_query($con, $select1);
    if(mysqli_num_rows($checkresult)>0){
        if($row = mysqli_fetch_assoc($checkresult)){
            $tempid = $row['StudentID'];
            echo $tempid;
            $get_numbers = str_replace("$enrollmentyear-", "", $tempid);
            echo $get_numbers;
            $inc_number = $get_numbers+1;
            echo $inc_number;
            $get_string = str_pad($inc_number, 4, 0, STR_PAD_LEFT);
            echo $get_string;
            $studentid = "$enrollmentyear-$get_numbers";
            echo $studentid;
        }
    }

?>