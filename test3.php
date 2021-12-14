<?php 
$start = '12:00:00';
$hours = 3;

//display the converted time
if(isset($_POST['submit'])){

    $start = $_POST['time1'];
    $hours = 3;
    echo date('g:i a',strtotime('+'.$hours.' hour',strtotime($start)));
    echo date('g:i a', strtotime($start));
}


?>

<form action="" method="post">

<input type="time" name="time1" id="">
<input type="submit" name="submit">
</form>