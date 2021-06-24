<?php
session_start();

include('../dbConnection/dbConnection.php');

$_SESSION['cusUsername']=null;
$_SESSION['cusEmail']=null;
$_SESSION['role']=null;

session_destroy();

header("Location:../index.php");

?>





