<?php
session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php"); 
include_once("dbcon.php");
include_once("enrollmentform/config/enc_dec.php");

$id = $_GET['id'];





function hideEmailAddress($email)
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        list($first, $last) = explode('@', $email);
        $first = str_replace(substr($first, '3'), str_repeat('*', strlen($first)-3), $first);
        $last = explode('.', $last);
        $last_domain = str_replace(substr($last['0'], '1'), str_repeat('*', strlen($last['0'])-1), $last['0']);
        $hideEmailAddress = $first.'@'.$last_domain.'.'.$last['1'];
        return $hideEmailAddress;
    }
}

$query = "select * from `studentexamresultstemp` where id = $id LIMIT 1";
$result = mysqli_query($con, $query);
if($result){
    while ($row = mysqli_fetch_array($result)){
        
        $email1 = $row['Email'];
        $_SESSION['email'] = $email1;


}
}
$emailfinal = $_SESSION['email'];
if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $examcode = $_POST['examcode'];
        $verifycode = $_POST['verifycode'];
        if(!empty($examcode) && !empty($verifycode)){
            $checkexamcode = "select * from `student_examresult` where ExamCode ='$examcode' LIMIT 1";
            $resultcheck = mysqli_query($con, $checkexamcode);
            if($resultcheck && mysqli_num_rows($resultcheck) > 0){
                $enc = qcu_encrypt($examcode);
                echo "<script>
                            
                            location.replace('enrollmentform/update_documents.php?id=$enc');
                            </script>";
            }else{
            $query1 = "select * from `studentexamresultstemp` where ExamNo = '$examcode' AND vcode = '$verifycode' LIMIT 1";
            $result1 = mysqli_query($con, $query1);
            if($result){
                if($result1 && mysqli_num_rows($result1) > 0)
				{

                    while ($row = mysqli_fetch_array($result1)){
                        $realcode = $row['vcode'];
                        $realexamcode = $row['ExamNo'];
                        if($verifycode == $realcode && $examcode == $realexamcode){
                            //alert('$verifycode,,, $realcode,,, $examcode,,,,, $realexamcode');

                            $enc = qcu_encrypt($realexamcode);
                            echo "<script> 
                            location.replace('enrollmentform/enrollmentformchoose.php?id=$enc');
                            
                            </script>";
                        }
                    }
                }
                echo "<script> alert('Incorrect Verification Code or Examination Code!');</script>";
            }
            
    }
    
}
    }
?>

<a href="/login.php" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>
       <main>   
                <div class="loginform">
                <div class="form-bg">
                    <h1>CONFIRMATION</h1>

                    <h4>Congratulations! You are qualified to be a student in Quezon City University</h4>

                    <p>A <em><span style="color: #e82048"> temporary code </span></em> has been sent to your respective email.</p>
                    <p> <em> <?php echo hideEmailAddress($emailfinal) ?> </em></p>
                    <form method = "POST" enctype="multipart/form-data">
                    <input type="text" placeholder="Exam Code" name="examcode"class="one-line"> <br><br>
                    <input type="password" placeholder="Verification Code" name="verifycode" class="one-line"> <br> <br>
                    <button type="submit">Confirm</button>
                    <button type="button" style="background-color:#e82048 " onclick="location.href='mail.php?id=<?php echo $id ?>'"> Resend </button>
                        <!--change to submit after , make it function onclick="location.href='enrollmentform/enrollmentformchoosecourse.php'"-->
                </form>
            </div>
        </div>   
           
            </main>
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>