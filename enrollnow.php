<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystem/components/header.php"); ?>

<a href="/login.html" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>
       <main>
        
                <div class="loginform">
                <div class="form-bg">
                <form>
                    <h1>Please Enter Your Exam Code and Date</h1>
                    <input type="text" name="" placeholder="Exam Code" class="one-line"> <br><br>
                    <input type="date" name=""  class="one-line"> <br><br>
                    <button type="button" name="" onclick="location.href='confirmation.php'">Proceed </button> <!--- make this a function :)-->
                    <button type="submit" name="" style="background-color: #3366CC"> Apply as Student </button> 
                    
                </form>
            </div>
        </div>        
            </main>
        
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystem/components/footer.php"); ?>