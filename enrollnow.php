<?php 
session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php");
include_once("dbcon.php");
include_once("enrollmentform/config/enc_dec.php");



if($_SERVER['REQUEST_METHOD'] == "POST")
	{
    $examcode = $_POST['examcode'];
    $examdate = $_POST['examdate']; 
    if(!empty($examcode) && !empty($examdate)){
        $checkexamcode = "select * from `student_examresult` where ExamCode ='$examcode' LIMIT 1";
        $resultcheck = mysqli_query($con, $checkexamcode);
        if($resultcheck && mysqli_num_rows($resultcheck) > 0){
            $enc = qcu_encrypt($examcode);
            echo "<script>
                        
                        location.replace('enrollmentform/update_documents.php?id=$enc');
                        </script>";
        }else{
        $query = "select * from `studentexamresultstemp` where ExamNo = '$examcode' AND ExamDate = '$examdate' LIMIT 1";
        $result = mysqli_query($con, $query);
        if($result){
            if($result && mysqli_num_rows($result) > 0)
				{
                   
                    while ($row = mysqli_fetch_array($result)){
                        $examcode1 = $row['ExamNo'];
                        $id = $row['ID'];
                        
                        //alert('You have passed! Your Exam No is $examcode1 and id is $id')
                        echo "<script>
                        
                        location.replace('mail.php?id=$id');
                        </script>";
                    }
                   
                }
                echo "<script>location.replace('confirmation_failed.php')</script>";
    //alert('You didn't passed')
            
            }
            echo "<script>location.replace('confirmation_failed.php')</script>";
    
    }
}
    echo "<script>alert('Please Fill Up the Form!')</script>";
}
?>


       <main>
        
                <div class="loginform">
                <div class="form-bg">
                <form method="POST" enctype="multipart/form-data">
                    <h1>Please Enter Your Exam Code and Date</h1>
                    <input type="text" name="examcode" placeholder="Exam Code" class="one-line"> <br><br>
                    <input type="text" name="examdate" placeholder="Exam Date MM/DD/YYYY" class="one-line"> <br><br>
                    <button type="submit">Proceed </button> <!--- make this a function :)-->
                    
                    
                </form>
            </div>
        </div>        
            </main>
        
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>