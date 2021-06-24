<?php
session_start();


$salonId = 1;
/*should take from previous page*/

$_SESSION['salonId']=$salonId;

      header("Location:index.php");
      
?>