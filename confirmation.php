<?php
session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php"); 
include_once("dbcon.php");


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
            $query1 = "select * from `studentexamresultstemp` where ExamNo = '$examcode' AND vcode = '$verifycode' LIMIT 1";
            $result1 = mysqli_query($con, $query1);
            if($result){
                if($result1 && mysqli_num_rows($result1) > 0)
				{

                    while ($row = mysqli_fetch_array($result1)){
                        $realcode = $row['vcode'];
                        $realexamcode = $row['ExamNo'];
                        if($verifycode == $realcode && $examcode == $realexamcode){
                            echo "<script> 
                            location.replace('enrollmentform/enrollmentformchoosecourse.php');
                            alert('$verifycode,,, $realcode,,, $examcode,,,,, $realexamcode');
                            </script>";
                        }
                    }
                }
                echo "<script> alert('Error Here');</script>";
            }
            "<script> alert('Error Here1');</script>";
    }
    "<script> alert('Error Here2');</script>";
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
                        <!--change to submit after , make it function onclick="location.href='enrollmentform/enrollmentformchoosecourse.php'"-->
                </form>
            </div>
        </div>   
           
            </main>
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>