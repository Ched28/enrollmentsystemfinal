<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystem/components/header.php"); ?>

<a href="/login.html" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>
       <main>   
                <div class="loginform">
                <div class="form-bg">
                    <h1>CONFIRMATION</h1>

                    <h4>Congratulations! You are qualified to be a student in Quezon City University</h4>

                    <p>A <em><span style="color: #e82048"> temporary code </span></em> has been sent to your respective email.</p>
                    <form>
                    <input type="text" placeholder="Exam Code" class="one-line"> <br><br>
                    <input type="password" placeholder="Verification Code" class="one-line"> <br> <br>
                    <button type="button" name="" onclick="location.href='enrollmentformchoosecourse.html'">Confirm</button>
                        <!--change to submit after-->
                </form>
            </div>
        </div>   
        <div class="loginform hidden">
            <div class="form-bg">
                <h1>CONFIRMATION</h1>

                <h4>Sorry you are not qualified..</h4>
                <button type="button" onclick="location.href='index.html'">Go back Home</button>
            
        </div>
    </div>      
            </main>
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystem/components/footer.php"); ?>