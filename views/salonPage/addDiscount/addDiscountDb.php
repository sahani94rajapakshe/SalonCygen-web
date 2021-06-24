<?php

session_start();

require_once '../config.php';

$salonId=$_SESSION['salonId'];
$salon=$_SESSION['salon'];

$discount=$_POST['discount'];
$_SESSION['discount']=$discount;

//$status='1';

$sql = "UPDATE salon_info
         SET newyeardiscount='$discount'
         WHERE salonId='$salonId'";

/*$sql = "INSERT INTO discounts (discount,salonId, status) 
        VALUES('$discount','$salonId','$status')";*/

if ($conn->query($sql) === TRUE) {
   echo "<script>alert('You successfuly updated Discount.');window.location.href='mail/index.php';</script>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>


