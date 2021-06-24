<?php

session_start();

require_once '../dbConnection/dbConnection.php';

$salonId=$_SESSION["salonId"];

$sql = "SELECT * 
        FROM 
        WHERE A.status='1' and A.view='0'and S.salonId=A.salonId" ;
$result= mysqli_query($conn, $sql);

$sql2 = "UPDATE appoinment 
         SET rated='1'
         WHERE bookingId='$bookingId'";

if ($conn->query($sql2) === TRUE) {
   echo "<script>alert('You have viewed your Appoinment .');window.location.href='profile.php';</script>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
 