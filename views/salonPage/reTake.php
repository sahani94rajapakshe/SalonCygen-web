<?php

session_start();

require_once 'config.php';

    if (isset($_SESSION['email'])) {
        $email=$_SESSION['email'];
        
        $sql1 ="SELECT salonId FROM salon_info WHERE email= '$email' ";
        $result1 = mysqli_query($conn, $sql1); 
        $row1 = mysqli_fetch_assoc($result1);
        $_SESSION['salonId']= $row1['salonId'];
        
        header("Location:../salonOwnerAccount/sendDdOwner.php");
        
        //header("Location:Salon-Admin1.php");
    }else{
        echo"Something wrong. Please sign in again";
        header("Location:../index.php");
    }

?>