<?php

session_start();

require_once '../config.php';

$salonId=$_SESSION['salonId'];
$salon=$_SESSION['salon'];

$username=$_POST['username'];

$sql = "DELETE FROM employee WHERE employeeId='$username' ";

if ($conn->query($sql) === TRUE) {
   echo "<script>alert('You removed the employee.');window.location.href='addEmployee.php';</script>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>