<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php");
include_once("dbcon.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
    $examcode = $_POST['examcode'];
    $examdate = $_POST['examdate']; 
    if(!empty($examcode) && !empty($examdate)){
        $query = "select * from `studentexamresultstemp` where ExamNo = '$examcode' AND ExamDate = '$examdate' LIMIT 1";
        $result = mysqli_query($con, $query);
        if($result){
            if($result && mysqli_num_rows($result) > 0)
				{
                    
                    while ($row = mysqli_fetch_array($result)){
                        $examcode1 = $row['ExamNo'];
                        $id = $row['id'];
                        echo "<script>alert('You have passed! Your Exam No is $examcode1 and id is $id')
                        
                        location.replace('mail.php?id=$id');
                        </script>";
                    }
                }
                
    }
    echo "<script>alert('You didn't passed')</script>";
    }
    echo "<script>alert('Please Fill Up the Form!')</script>";
}
?>

<a href="/login.html" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>
       <main>
        
                <div class="loginform">
                <div class="form-bg">
                <form method="POST" enctype="multipart/form-data">
                    <h1>Please Enter Your Exam Code and Date</h1>
                    <input type="text" name="examcode" placeholder="Exam Code" class="one-line"> <br><br>
                    <input type="text" name="examdate"  class="one-line"> <br><br>
                    <button type="submit">Proceed </button> <!--- make this a function :)-->
                    <button type="button" name="" style="background-color: #3366CC"> Apply as Student </button> 
                    
                </form>
            </div>
        </div>        
            </main>
        
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>