<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php"); 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/connections/dbcon.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$examcode = $_POST['examcode'];
		$examdate = $_POST['examdate'];
        if(!empty($examcode) && !empty($examdate))
		{
            $query ="SELECT * FROM `studentexamresultstemp` WHERE ExamNo = '$examcode' AND ExamDate= '$examdate' LIMIT 1";
			$result = mysqli_query($con, $query);

            if($result && mysqli_num_rows($result) > 0)
				{
                    $user_data = mysqli_fetch_assoc($result);
                    $id = $user_data['id'];
                    echo "<script>
                    
                    location.replace('mail.php?id=$id');
                    
                    </script>";
                }

        }
    }
?>

<a href="/login.html" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>
       <main>
        
                <div class="loginform">
                <div class="form-bg">
                <form method="POST" action=''>
                    <h1>Please Enter Your Exam Code and Date</h1>
                    <input type="text" name="examcode" placeholder="Exam Code" class="one-line"> <br><br>
                    <input type="date" name="examdate"  class="one-line"> <br><br>
                    <button type="submit" name="" onclick="location.href='mail.php'">Proceed </button> <!--- make this a function :)-->
                    <button type="button" name="" style="background-color: #3366CC"> Apply as Student </button> 
                    
                </form>
            </div>
        </div>        
            </main>
        
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>