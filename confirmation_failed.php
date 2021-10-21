<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php");
include_once("dbcon.php");

?>


<a href="/login.php" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>
       <main>  
       <div class="loginform hidden">
            <div class="form-bg">
                <h1>CONFIRMATION</h1>

                <h4>Sorry you are not qualified..</h4>
                <button type="button" onclick="location.href='index.php'">Go back Home</button>
            
        </div>
    </div>   
</main>

<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>