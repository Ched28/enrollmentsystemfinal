<?php
                            require 'includes/PHPMailer.php';
                            require 'includes/SMTP.php';
                            require 'includes/Exception.php';

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

                            $mail -> Body = "OTP is 12345";

                            $mail -> addAddress("tempqcuenroll2021@gmail.com");
                            
                           
                            if($mail -> Send()){
                                              
                                echo "<script>
                                alert('OTP sent!');
                                location.replace('confirmation.php');
                                
                                </script>";
                            }
                            else{
                                echo "Error";
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                            }

                            $mail -> smtpClose();


                    ?>