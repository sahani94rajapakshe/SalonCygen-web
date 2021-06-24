<?php

session_start();

require_once '../../config.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$salonId=$_SESSION['salonId'];
$salon=$_SESSION['salon'];
$cusEmail=$_SESSION['cusEmail'];
$bookingDate=$_SESSION['bookingDate'];
$employeeName=$_SESSION['employeeName'];
$time=$_SESSION['time'];

$sql ="SELECT email FROM salon_info WHERE salonId= '$salonId' ";
$result = mysqli_query($conn, $sql); 
$row = mysqli_fetch_assoc($result);
$email= $row['email'];
$admin=$salon;
    
        // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = "buynsellnitc@gmail.com";                   // SMTP username
                $mail->Password   = "buynsell123";                                // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                
                //Recipients
                $mail->setFrom('buynsellnitc@gmail.com', $admin);
                $mail->addAddress($cusEmail); 

                // Attachments    

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Appoinment cancellation.-'.$salon.'.';
                $mail->Body    = 'We are sorry to cancel your appinment for '.$salon.' on '.$bookingDate.' for '.$employeeName.' at '.$time.' .';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
                unset($_SESSION['cusEmail']);
                unset($_SESSION['bookingDate']);
                unset($_SESSION['employeeName']);
                unset($_SESSION['time']);
                header("Location:../../Salon-Admin1.php");
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }



