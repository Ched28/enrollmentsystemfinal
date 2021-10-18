<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php"); ?>

<a href="enrollmentsystem/login.php" class="fixed-button login-btn"> <i class="fas fa-user"></i> &nbsp; Log In</a>
       <main>
        
                <div class="loginform">
                <div class="form-bg">
                <form>
                    <h1>Choose your desire course</h1>
                    <div class="content-cour">
                
                        <button type="button" style="background-color: #e82048;" class="content-cour-con" name="bsit-btn" value="Bachelor of Science in Information Technology" onclick="">
                            <i class="fas fa-microchip"></i>
                            <p>Bachelor of Science in Information Technology</p>
                        </button>
                        <button type="button" style="background-color: #e82048;" class="content-cour-con" name="bsentrep-btn" value="Bachelor of Science in Entrepreneurship" onclick="">
                            <i class="fas fa-store"></i>
                            <p>Bachelor of Science in Entrepreneurship</p>
                        </button>
                        <button type="button" style="background-color: #e82048;" class="content-cour-con" name="bsa-btn" value="Bachelor of Science in Accountancy" onclick="">
                            <i class="fas fa-table"></i>
                            <p>Bachelor of Science in Accountancy</p>
                        </button>
                        <button type="button" style="background-color: #e82048;" class="content-cour-con" name="bsie-btn" value="Bachelor of Science in Industrial Engineering" onclick="">
                            <i class="fas fa-industry"></i>
                            <p>Bachelor of Science in Industrial Engineering</p>
                        </button>
                        <button type="button" style="background-color: #e82048;" class="content-cour-con" name="bsece-btn" value="Bachelor of Science in Electronics Engineering" onclick="">
                            <i class="fas fa-plug"></i>
                            <p>Bachelor of Science in Electronics Engineering</p>
                        </button>
                        <input type="hidden" name="course-btn-val" value=""><br>
                        
                    </div>
                    <button type="button" onclick="location.href='enrollmentformchoose.php'">Proceed</button>
                    <!--Change the Button type to submit when changing the function-->
                </form>
            </div>
        </div>        
            </main>

<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>