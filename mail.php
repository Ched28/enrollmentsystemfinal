<?php
session_start();
$verfication_code = substr(number_format(time() * rand(), 0,'',''), 0,6);
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
                                    $email = $row['email'];


                            }
                            }
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

                            $mail -> Port ="587";

                            $mail -> Username ="tempqcuenroll2021@gmail.com";

                            $mail -> Password ="YnKak4qw";

                            $mail -> Subject ="Your Verification code";

                            $mail -> setFrom("tempqcuenroll2021@gmail.com");

                            $mail -> Body = "OTP is $verfication_code";

                            $mail -> addAddress("$email");
                            
                           //location.replace('confirmation.php');
                            if($mail -> Send()){
                                              
                                echo "<script>
                                alert('OTP sent! your id is $id');
                               
                                
                                </script>";
                            }
                            else{
                                echo "Error";
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                            }

                            $mail -> smtpClose();


                    ?>