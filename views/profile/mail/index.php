<?php

session_start();

require_once '../../salonPage/config.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
//cusEmail, email,employeemail,service,date,time, employeeName,salonName
$employeeId=$_SESSION['employeeId'];
$service=$_SESSION['service'];
$salonId=$_SESSION['salonId'];
//$salonName=$_SESSION['salonName'];
$cusEmail=$_SESSION['cusEmail'];
$bookingDate=$_SESSION['bookingDate'];
$employeeName=$_SESSION['employeeName'];
$time=$_SESSION['time'];
echo $salonName;

$sql ="SELECT email FROM salon_info WHERE salonId= '$salonId' ";
$result = mysqli_query($conn, $sql); 
$row = mysqli_fetch_assoc($result);
$email= $row['email'];
$admin=$cusEmail;

$sql2 ="SELECT employeeEmail FROM employee WHERE employeeId= '$employeeId' ";
$result2 = mysqli_query($conn, $sql2); 
$row2 = mysqli_fetch_assoc($result2);
$employeeEmail= $row2['employeeEmail'];

$sql3 ="SELECT salonName FROM salon_info WHERE salonId= '$salonId' ";
$result3 = mysqli_query($conn, $sql3); 
$row = mysqli_fetch_assoc($result3);
$salonName= $row['salonName'];

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
                $mail->addAddress($employeeEmail); 
                $mail->addCC($email);

                // Attachments    

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Cancellation of appoinment made for '.$salonName.' ';
                $mail->Body    = 'I made an appoinment for '.$salonName.' on '.$bookingDate.' for '.$employeeName.' at '.$time.' for a '.$service.' I cancelled the appoinment due to an unavoidable reason. Sorry for the inconviniences made. Thank You.';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
                unset($_SESSION['bookingDate']);
                unset($_SESSION['employeeName']);
                unset($_SESSION['time']);
                unset($_SESSION['service']);
                unset($_SESSION['employeeId']);
                unset($_SESSION['employeeName']);
                //unset($_SESSION['salonName']);
                echo "<script>window.location.href='../profile.php';</script>";
                
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }


?>
