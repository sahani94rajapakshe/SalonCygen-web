<?php

session_start();

require_once '../dbConnection/dbConnection.php';

$cancelId=$_POST['username'];

$sql = "UPDATE cancel
        SET view='1'
        WHERE cancelId='$cancelId'";

if ($conn->query($sql) === TRUE) {
   echo "<script>window.location.href='profile.php';</script>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}