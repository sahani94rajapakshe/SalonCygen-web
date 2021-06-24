<?php

session_start();

require_once '../config.php';

$salonId=$_SESSION['salonId'];
$salon=$_SESSION['salon'];

$username=$_POST['username'];

$sql = "UPDATE employee SET status ='0' WHERE employeeId='$username' ";

if ($conn->query($sql) === TRUE) {
   echo "<script>alert('You unlisted the employee.');window.location.href='addEmployee.php';</script>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>