<?php
$connection = mysqli_connect('localhost','root','','enrollment_test'); // db will handle the data of saved db(Backed up)
$filename = 'backup.sql';
$handle = fopen($filename,"r+");
$contents = fread($handle,filesize($filename));
$sql = explode(';',$contents);
foreach($sql as $query){
  $result = mysqli_query($connection,$query);
  if($result){
      echo '<tr><td><br></td></tr>';
      echo '<tr><td>'.$query.' <b>SUCCESS</b></td></tr>';
      echo '<tr><td><br></td></tr>';
  }
}
//fclose($handle);
echo 'Successfully imported';
echo "<script>location.replace('../settings.php')</script>";