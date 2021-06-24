<?php

session_start();

require_once '../config.php';

$salonId=$_SESSION['salonId'];
$salon=$_SESSION['salon'];

$employeeusername=$_POST['employeeUsername'];
$employeeEmail=$_POST['employeeEmail'];
$status='1';
$arr =  explode(" ", $employeeusername);
$firstName=$arr[0];
$secondName=$arr[1];
$employeeUsername = $firstName . ' ' . $secondName;

$sql = "INSERT INTO employee (employeeName, employeeEmail,salonId,status) 
        VALUES('$employeeUsername','$employeeEmail','$salonId','$status')";

if ($conn->query($sql) === TRUE) {
   echo "<script>alert('You successfuly added an Employee.');window.location.href='addEmployee.php';</script>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>