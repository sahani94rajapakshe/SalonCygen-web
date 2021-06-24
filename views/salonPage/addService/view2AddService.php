<?php

session_start();

require_once '../config.php';

$salonId=$_SESSION['salonId'];
$salon=$_SESSION['salon'];

$username=$_POST['username'];
$amount=$_POST['amount'];
$status='0';

$sql = "UPDATE services SET status ='$status' WHERE serviceId='$username' ";

if ($conn->query($sql) === TRUE) {
   echo "<script>alert('You successfuly updated the service amount.');window.location.href='addService.php';</script>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>