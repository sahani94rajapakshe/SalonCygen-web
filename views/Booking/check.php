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
 
         if(mysqli_num_rows($result) > 0){
            header("Location:takeDateService.php");
        }else {
              header("Location:../createAcc/createAcc.php");

            }
 }else{
         if(mysqli_num_rows($result) > 0){
        header("Location:../index.php");
    }else {
            header("Location:../createAcc/createAcc.php");
        }
 }

?>





