<?php
session_start();

$salonId=$_POST['salonId'];

$_SESSION["salonId"]=$salonId;

header("Location: ../salonPage/index.php");

exit();



?> 