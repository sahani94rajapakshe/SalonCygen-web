<?php

session_start();

require_once '../config.php';

$salonId=$_SESSION['salonId'];
$salon=$_SESSION['salon'];

$discount=" ";

$sql = "UPDATE salon_info SET newyeardiscount='$discount' WHERE salonId= '$salonId'";

if ($conn->query($sql) === TRUE) {
   echo "<script>alert('You successfuly updated Discount.');window.location.href='addDiscount.php';</script>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>


