
<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/header.php"); 
$iconsite = "/enrollmentsystemfinal/img/qcu.png";
include_once("config/dbcon.php");
session_start();
if(isset($_POST['login'])){

    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
	$userfromtxtbox = $_POST['username'];
    
    $select_admin = "SELECT * FROM `admin` WHERE  `Username` = '$username' AND `password` = '$password'";
    $run_admin = mysqli_query($con, $select_admin);
    if($run_admin){
        if($run_admin && mysqli_num_rows($run_admin) > 0){
			while ($row = mysqli_fetch_array($run_admin)){
                        $r = $row['admin_level'];
			}
            if($r == "0")
			{
			$_SESSION['auth'] = 2;
        
            }
           else{
			$_SESSION['auth'] = 1;
          
            }
            $out = $_SESSION['auth'];
            echo "<script>alert('$out')</script>";
            header('location: dashboard.php');
        }else{
            $_SESSION['auth'] = NULL;
            echo "<script>alert('Innorect details')</script>";
        }
    }
}else{
   
}



?>

<main>
        
        <div class="loginform">
        <div class="form-bg">
        <form method="POST">
        <img class="qculogo"  src="<?php echo $iconsite;?>">
            <h1> Admin Log In</h1>

            <input type="text" name="username" placeholder="Username" class="one-line"> <br><br>
            <input type="password" name="password" placeholder="Password" class="one-line"> <br><br>
            <button type="submit"  name="login" class="login-btn-login"> Log In </button>
            <button type="button" style="background-color: #e82048;" onclick="location.href='/qcuschoolmanagement/'" class="login-btn-login"> Back to Home </button>
        </form>
    </div>
</div>        
    </main>

<?php include_once("$_SERVER[DOCUMENT_ROOT]/enrollmentsystemfinal/components/footer.php"); ?>