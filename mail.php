<?php
session_start();
$verfication_code = substr(number_format(time() * rand(), 0,'',''), 0,6);
$_SESSION['email'] = '';
                            include_once("dbcon.php");
                            require 'includes/PHPMailer.php';
                            require 'includes/SMTP.php';
                            require 'includes/Exception.php';
                            
                            $id = $_GET['id'];

                            $query = "select * from `studentexamresultstemp` where id = $id LIMIT 1";
                            $result = mysqli_query($con, $query);
                            if($result){
                                while ($row = mysqli_fetch_array($result)){
                                    $examcode1 = $row['ExamNo'];
                                    $email = $row['Email'];
                                    $_SESSION['email'] = $email;


                            }
                            }
                            $emailfinal = $_SESSION['email'];
                            $query1 = "UPDATE `studentexamresultstemp` SET `vcode`= '$verfication_code' WHERE id='$id'";
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

                            $mail -> Subject ="Your Verification code";

                            $mail -> setFrom("tempqcuenroll2021@gmail.com");

                            $mail -> isHtml(true);

                            $mail -> Body = '<body style="margin: auto;
                            padding:0px;width: 40%;">
                                    
                            
                            <div style="background: #002347;
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
                            <h1>Welcome to Quezon City University!</h1>
                            
                            <div class="body">
                                <p> Dear Student, </p>
                        
                                    <p><b>Congratulations!</b></p>
                        
                                    <p> You are now on the second step to become a QCians, to procced we provide you a verification code to access our online enrollment form!</p>
                        
                                    <div style="text-align: center;font-size: 3em;">
                                        <p>'.$verfication_code.'</p>
                                    </div>
                                    <p> This verification code will also be use for updating all of your requirements.</p>
                                    <p style="color: firebrick"> This verification code is highly confidential and not meant to share to anybody!</p>
                    
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
                               
                                location.replace('confirmation.php?id=$id');
                                
                                </script>";
                            }
                            else{
                                echo "Error";
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                            }

                            $mail -> smtpClose();


                    ?>