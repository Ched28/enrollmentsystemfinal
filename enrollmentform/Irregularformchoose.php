<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php"); 
$id = $_GET['id'];


?>



       <main>
        
                <div class="loginform">
                <div class="form-bg">
                <form>
                    <h1>Irregular Form Category</h1>
                    <button type="button" name="" onclick="location.href='enrollmentformIrregular.php?id=<?php echo $id?>'"style="background-color: #3366CC"> Freshman(Transferees)</button> 
                   <!-- <button type="button" name=" " onclick="location.href='enrollmentformIrregularReturnee.php?id=<?php echo $id?>' " style="background-color: #3366CC"> Returnees </button>  -->
                    <!--change button type to submit when changing the function-->
                </form>
            </div>
        </div>        
            </main>

<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>