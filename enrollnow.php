<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php"); 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/connections/dbcon1.php");

?>

<a href="/login.html" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>
       <main>
        
                <div class="loginform">
                <div class="form-bg">
                <form method="POST" action=''>
                    <h1>Please Enter Your Exam Code and Date</h1>
                    <input type="text" name="examcode" placeholder="Exam Code" class="one-line"> <br><br>
                    <input type="date" name="examdate"  class="one-line"> <br><br>
                    <button type="button" name="" onclick="location.href='mail.php'">Proceed </button> <!--- make this a function :)-->
                    <button type="submit" name="" style="background-color: #3366CC"> Apply as Student </button> 
                    
                </form>
            </div>
        </div>        
            </main>
        
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>