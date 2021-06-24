<?php
session_start();
/*$cusEmail=$_SESSION['cusEmail'];*/
//$salonId=$_SESSION['salonId'];
$salon=$_SESSION['salon'];

require_once '../config.php';

$bookingId=$_POST['bookingId'];

$sql = "DELETE FROM `appoinment` WHERE bookingId= ".$bookingId.";";

$result = mysqli_query($conn, $sql);
 if ($conn->query($sql) === TRUE) {
           echo "<script>alert('You successfully unblocked the slot.');
           window.location.href='../Salon-Admin1.php';</script>";
} else {
            echo "Error: " . $sql . "<br>" . $conn->error;
}
 
mysqli_close($conn);

?> 