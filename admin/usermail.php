<?php
session_start();
$temp_code = substr(number_format(time() * rand(), 0,'',''), 0,10);
$_SESSION['email1'] = '';
$_SESSION['un'] = '';
$_SESSION['stid'] = '';
                            include_once("config/dbcon.php");
                            include_once("config/enc_dec.php");
                            require 'includes/PHPMailer.php';
                            require 'includes/SMTP.php';
                            require 'includes/Exception.php';
                            
                            $id = $_GET['id'];
                            $inc = qcu_encrypt($id);
                            $query = "select * from `studentinfo` where `StudentID` = '$id' LIMIT 1";
                            $result = mysqli_query($con, $query);
                            if($result){
                                while ($row = mysqli_fetch_array($result)){
                                    $stid = $row['StudentID'];
                                    $email = $row['email'];
                                    $firstname = $row['FullName-First'];
                                    $lastname = $row['FullName-Last'];
                                    $age = $row['Age'];
                                    $_SESSION['email1'] = $email;

                                    $username = str_replace(' ', '', strtolower($firstname."".$lastname . "_" . $age));
                                    $_SESSION['un'] = $username;
                                    $_SESSION['stid'] = $stid;

                                        
                            }
                            }
                            $emailfinal = $_SESSION['email1'];
                            $username = $_SESSION['un'];
                            $stid = $_SESSION['stid'];
                            $query1 = "INSERT INTO `studentaccount`(`StudentID`, `Username`, `Password`, `user_status`) VALUES ('$stid','$username','$temp_code','NEW ACCOUNT')";
                            mysqli_query($con, $query1);

                            use PHPMailer\PHPMailer\PHPMailer;
                            use PHPMailer\PHPMailer\SMTP;
                            use PHPMailer\PHPMailer\Exception;

                            $mail = new PHPMailer();

                           $mail -> isSMTP();

                            $mail -> Host = "smtp.gmail.com";

                            $mail -> SMTPAuth ="true";

                            $mail -> SMTPSecure ="tls";

                           // $mail-> SMTPDebug = true;

                            $mail -> Port ="587";

                            $mail -> Username ="tmp.enroll.sys@gmail.com";

                            $mail -> Password ="YnKak4qw";

                            $mail -> Subject ="CONGRATULATIONS!";

                            $mail -> setFrom("tempqcuenroll2021@gmail.com");

                            $mail -> isHtml(true);

                            $mail -> Body = '<body style="margin: auto;
                            padding:0px;width: 40%;">
                                    
                            
                            <div style="background-color: #00AC17;
                            display: flex;
                            justify-content: space-around;
                            color: white;"> 
                                <div style="padding: 1em;display: flex;">
                                    
                                        <h3>Quezon City University | <span style="font-size:15px;">  Online Portal</span></h3>
                                </div>
                                <ul style="text-decoration: none;">
                                    <li style="display: inline-block;">
                                        <h3>Good Life Starts Here</h3>
                                    </li>
                                    
                           
                        
                                </ul>
                              
                        </div>
                        <div style="padding: 1em;
                        margin: 1em;">
                            <div class="header">
                            <h1>Welcome to Quezon City Univeristy!</h1>
                            
                            <div class="body">
                                <p> Dear '.$username.', </p>
                        
                                    <p><b>Congratulations!</b></p>
                        
                                    <p> You are now officially enrolled!</p>
                                    <p> To get started with your journey in our school, here is your Student ID and your temporary password for you to access our Student Port</p>
                        
                                    <div style="text-align: center;font-size: 2em;">
                                        <p><b>Student ID: </b>'.$stid.'</p>
                                        <p><b>Temporary Code: </b>'.$temp_code.'</p>
                                    </div>
                                    <p> Thank you for choosing QCU!</p>
                                    <p style="color: firebrick"> This email is served as a non-replyable email.</p>
                    
                                    <p style="text-align: center;"> Visit our Official QCU Website for more info!</p>
                                    <div style="align-items: center;display: flex;justify-content: center;">
                                    <div style="padding: 1em;margin: 1em;background-color: forestgreen;text-align: center;width: 100%;">
                                    <a style="text-decoration: none;color: white;" href="http://localhost/enrollmentsystemfinal/"> Learn More</a>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                       ';

                            $mail -> addAddress("$emailfinal");
                            
                           // alert('OTP sent! your id is $id');
                            if($mail -> Send()){
                                              
                                echo "<script>
                               
                                location.replace('select_status.php?id=$inc');
                                
                                </script>";
                            }
                            else{
                                echo "Error";
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                            }

                            $mail -> smtpClose();


                    ?>