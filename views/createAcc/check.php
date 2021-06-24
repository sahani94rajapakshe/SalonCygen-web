<?php
session_start();

include('../dbConnection/dbConnection.php');

$cusUsername=$_GET['name'];
$cusEmail=$_GET['email'];

$_SESSION['cusUsername']=$cusUsername;
$_SESSION['cusEmail']=$cusEmail;

$sql ="SELECT * FROM customers WHERE cusEmail= '$cusEmail' ";
$result = mysqli_query($conn, $sql);

if (isset($_SESSION['salonId'])) {
    $_SESSION['role']=2;
    header("Location:../Booking/takeDateService.php");   
}else{
    if(mysqli_num_rows($result) > 0){
    header("Location:../index.php");
    $_SESSION['role']=2;
    }else{
      header("Location:createAcc.php");    
    }
}


?>





