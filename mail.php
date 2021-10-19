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

                            $mail -> Username ="jc.sia111@gmail.com";

                            $mail -> Password ="sia11111";

                            $mail -> Subject ="Your Verification code";

                            $mail -> setFrom("jc.sia111@gmail.com");

                            $mail -> Body = "OTP is 12345";

                            $mail -> addAddress("jc.sia111@gmail.com");
                            
                           
                            if($mail -> Send()){
                                              
                                echo "<script>
                                alert('OTP sent!');
                                location.replace('confirmation.html');
                                
                                </script>";
                            }
                            else{
                                echo "Error";
                            }

                            $mail -> smtpClose();


                    ?>