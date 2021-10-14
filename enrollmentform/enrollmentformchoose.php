<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystem/components/header.php"); ?>


<a href="enrollmentsystem/login.php" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>
       <main>
        
                <div class="loginform">
                <div class="form-bg">
                <form>
                    <h1>Choose your category</h1>
                    <button type="button" name="" onclick="location.href='enrollmentformRegular.php'"> Regular Student (Freshman, Regular Student) </button> 
                    <button type="button" name="" style="background-color: #3366CC"> Irregular Student (Freshman (Working Student), Transferees and Returnees) </button> 
                    <!--change button type to submit when changing the function-->
                </form>
            </div>
        </div>        
            </main>

<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystem/components/footer.php"); ?>