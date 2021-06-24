<?php
session_start();

$salonId=$_POST['salonId'];

$_SESSION["salonId"]=$salonId;

header("Location: ../index.php");

exit();



?>