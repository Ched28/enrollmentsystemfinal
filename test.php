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
$lastid = $con->insert_id;
$enrollmentyear = date("y");
$select1 = "SELECT * FROM `studentinfo` ORDER BY 'StudentID' DESC LIMIT 1;";
    $checkresult = mysqli_query($con, $select1);
    if(mysqli_num_rows($checkresult)>0){
        if($row = mysqli_fetch_assoc($checkresult)){
            $tempid = $row['StudentID'];
            echo $tempid;
            echo "<br>";
            $get_numbers = str_replace("$enrollmentyear-", "", $tempid);
            echo $get_numbers;
            echo "<br>";
            $inc_number = $get_numbers+1;
            echo $inc_number;
            echo "<br>";
            $get_string = str_pad($inc_number, 4, 0, STR_PAD_LEFT);
            echo $get_string;
            echo "<br>";
            $studentid = "$enrollmentyear-$get_string";
            echo $studentid;
        }
    }

?>