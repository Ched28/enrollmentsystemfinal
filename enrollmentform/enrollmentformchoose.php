<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php"); 
$id = $_GET['id'];


?>



       <main>
        
                <div class="loginform">
                <div class="form-bg">
                <form>
                    <h1>Choose your category</h1>
                    <button type="button" name="" onclick="location.href='enrollmentformRegular.php?id=<?php echo $id?>'"> Regular Student (Freshman, Regular Student) </button> 
                    <button type="button" name="" style="background-color: #3366CC"> Irregular Student (Freshman (Working Student), Transferees and Returnees) </button> 
                    <!--change button type to submit when changing the function-->
                </form>
            </div>
        </div>        
            </main>

<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>