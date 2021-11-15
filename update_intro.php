<?php 
session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php");
include_once("dbcon.php");
include_once("enrollmentform/config/enc_dec.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
    $examcode = $_POST['examcode'];
    $examdate = $_POST['examdate']; 
    $vcode = $_POST['vcode'];
    if(!empty($examcode) && !empty($examdate) && !empty($vcode)){
       
        $query = "SELECT * FROM `studentexamresultstemp` WHERE ExamNo = '$examcode' AND ExamDate = '$examdate';";
        $result = mysqli_query($con, $query);
        if($result){
            if($result && mysqli_num_rows($result) > 0)

				{
                    while ($row = mysqli_fetch_array($result)){
                        $examcode1 = $row['ExamNo'];
                        $id = $row['ID'];
                        $query1 = "SELECT * FROM `studentexamresultstemp` WHERE ExamNo = '$examcode' AND vcode = '$vcode';";               
                    
                        $result1 = mysqli_query($con, $query1);
                        if($result1){
                            if($result1 && mysqli_num_rows($result1) > 0)
				                {
                                    $query2 = "SELECT * FROM `student_examresult` WHERE ExamCode = '$examcode' LIMIT 1";
                                    $result2  = mysqli_query($con, $query2);
                                    $enc = qcu_encrypt($examcode1);
                                    if($result2){
                                        if($result2 && mysqli_num_rows($result2) > 0)
                                        {
                                            
                                            echo "<script>
                                            
                                            location.replace('enrollmentstatus.php?id=$enc');
                                            </script>";
                                        }
                                        else{
                                                
                                                    
                                                    echo "<script>location.replace('enrollmentform/enrollmentformchoose.php?id=$enc')</script>";
                                                
                                                
                                            
                                        }
                                    }
                                    
                                }
                                else{
                                            
                                    echo "<script>location.replace('mail.php?id=$id')</script>";
                                
                                }
                            
                       
                    }
                    
                }
                   
            } 
            else{
                echo "<script>location.replace('confirmation_failed.php')</script>";
            }
            
                

            
            }
            
            echo "<script>alert('Please Fill Up the Form!')</script>";
    }
    

}

?>



<main>
        
        <div class="loginform">
        <div class="form-bg">
        <form method="POST" enctype="multipart/form-data">
            <h1>Update Your Documents</h1>
            <input type="text" name="examcode" placeholder="Exam Code" class="one-line"> <br><br>
            <input type="text" name="examdate" placeholder="Exam Date MM/DD/YYYY" class="one-line"> <br><br>
            <input type="password" name="vcode" placeholder="Your Verification Code" class="one-line"> <br><br>
            <button type="submit">Proceed </button> <!--- make this a function :)-->
            
            
        </form>
    </div>
</div>        
    </main>


<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php");
?>

