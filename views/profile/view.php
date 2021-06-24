<?php

session_start();

require_once '../dbConnection/dbConnection.php';

$bookingId=$_POST['username'];

$sql = "UPDATE appoinment 
        SET view='1'
        WHERE bookingId='$bookingId'";

if ($conn->query($sql) === TRUE) {
   echo "<script>window.location.href='profile.php';</script>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
