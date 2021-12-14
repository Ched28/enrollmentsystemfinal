<?php 
if(isset($_POST['entercurr'])){
    $subj = $_POST['subj'];


    foreach($subj as $subjects){
        echo $subjects;
    }
}

?>