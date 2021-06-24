<?php
session_start();

include('../dbConnection/dbConnection.php');

$email=$_GET['email'];
$salonUsername=$_GET['name'];

$_SESSION['email']=$email;
$_SESSION['salonUsername']=$salonUsername;

$sql ="SELECT * FROM salonowners WHERE email= '$email' ";
$result = mysqli_query($conn, $sql);

$sql1 ="SELECT salonId FROM salon_info WHERE email= '$email' ";
$result1 = mysqli_query($conn, $sql1);

$row1 = mysqli_fetch_assoc($result1);

if(mysqli_num_rows($result) > 0){ 
    if(mysqli_num_rows($result1) > 0){
        $_SESSION['salonId']=$row1['salonId'];
        $_SESSION['role']=3;
        header("Location: ../salonPage/Salon-Admin1.php");
    }else{
        $_SESSION['role']=3;
        header("Location: ../salonPage/Salon-Admin.php");
    }
}else {
    	header("Location:salonOwnerAccount.php");
}
?>


