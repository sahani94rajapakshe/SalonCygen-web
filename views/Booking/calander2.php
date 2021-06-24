<?php
session_start();
$cusEmail=$_SESSION['cusEmail'];
$salonId=$_SESSION['salonId'];

require_once '../salonPage/config.php';
    echo "<script> window.location.href='../index.php';</script>"; 
?> 

    