<?php 




for($a = 1;$a<=100;$a++){
    $getstring = str_pad($a, 5, 0, STR_PAD_LEFT);
    $id = "21-$getstring";
    echo $id "<br>";


}


?>