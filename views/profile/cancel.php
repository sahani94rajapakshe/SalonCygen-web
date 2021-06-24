<?php

session_start();

require_once '../dbConnection/dbConnection.php';
$cusEmail=$_SESSION['cusEmail'];

$bookingId=$_POST['username'];
$service=$_POST['service'];
$bookingDate=$_POST['bookingDate'];
$time=$_POST['time'];
$employeeName=$_POST['employeeName'];
$employeeId=$_POST['employeeId'];
//$salonName=$_POST['salonName'];
$salonId=$_POST['salonId'];



$sql = "DELETE FROM appoinment WHERE bookingId='$bookingId'";

if ($conn->query($sql) === TRUE) {
            
            $_SESSION['service']=$service;
            $_SESSION['bookingDate']=$bookingDate;
            $_SESSION['employeeId']=$employeeId;
            $_SESSION['employeeName']=$employeeName;
            //$_SESSION['salonName']=$salonName;
            $_SESSION['salonId']=$salonId;   
            $_SESSION['time']=$time;
            $_SESSION['cusEmail']=$cusEmail;    
   echo "<script>window.location.href='mail/index.php';</script>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>