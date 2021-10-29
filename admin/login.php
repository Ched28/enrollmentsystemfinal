
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php"); 
$iconsite = "/enrollmentsystemfinal/img/qcu.png";
include_once("dbcon.php");




?>

<main>
        
        <div class="loginform">
        <div class="form-bg">
        <form>
        <img class="qculogo"  src="<?php echo $iconsite;?>">
            <h1> Admin Log In</h1>
            <input type="text" name="" placeholder="Username" class="one-line"> <br><br>
            <input type="password" name="" placeholder="Password" class="one-line"> <br><br>
            <button type="submit"  name="" class="login-btn-login"> Log In </button>
            <button type="button" style="background-color: #e82048;" onclick="location.href='index.php'" class="login-btn-login"> Back to Home </button>
        </form>
    </div>
</div>        
    </main>

<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>