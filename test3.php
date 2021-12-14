<?php 
$start = '12:00:00';
$hours = 3;

//display the converted time

echo date('g:i a',strtotime('+'.$hours.' hour',strtotime($start)));

?>