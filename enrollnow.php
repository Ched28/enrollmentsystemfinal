<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php"); 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/connections/dbcon.php");
if(isset($_POST['submit'])){
    $examcode = $_POST['examcode'];
    $examdate = $_POST['examdate'];
    if(!empty($examcode) && !empty($examdate))
    {
        $query ="SELECT * FROM `studentexamresultstemp` WHERE ExamNo = '$examcode' AND ExamDate= '$examdate' LIMIT 1";
        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                while ($row = mysqli_fetch_array($result)) { 
                    
                    $id = $row['id'];

                    echo "<script>
                    alert('this is okay');
                    location.replace('mail.php?id=$id');
                    
                    </script>
                    ";
                }
            }

    }    
}

?>

<a href="/login.html" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>
       <main>
        
                <div class="loginform">
                <div class="form-bg">
                <form method="POST" action='confirmation.php'>
                    <h1>Please Enter Your Exam Code and Date</h1>
                    <input type="text" name="examcode" placeholder="Exam Code" class="one-line"> <br><br>
                    <input type="date" name="examdate"  class="one-line"> <br><br>
                    <button type="submit">Proceed </button> <!--- make this a function :)-->
                    <button type="button" name="" style="background-color: #3366CC"> Apply as Student </button> 
                    
                </form>
            </div>
        </div>        
            </main>
        
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>