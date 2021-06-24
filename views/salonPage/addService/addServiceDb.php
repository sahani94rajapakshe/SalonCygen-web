<?php

session_start();

require_once '../config.php';

$salonId=$_SESSION['salonId'];
$salon=$_SESSION['salon'];

$serviceName=$_POST['serviceName'];
$serviceAmount=$_POST['serviceAmount'];
$status='1';

$sql = "INSERT INTO services (service, amount,salonId,status) 
        VALUES('$serviceName','$serviceAmount', '$salonId','$status')";

if ($conn->query($sql) === TRUE) {
   echo "<script>alert('You successfuly updated the service.');window.location.href='addService.php';</script>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>