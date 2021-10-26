<?php 




for($a = 1;$a<=100;$a++){
    $enrollmentyear = date("y");
   $getstring = str_pad($a, 4, 0, STR_PAD_LEFT);
   $id = "$enrollmentyear-$getstring";
   echo "$id <br>";


}


//$idint = 0001; 

//echo "21-$idint";


?>