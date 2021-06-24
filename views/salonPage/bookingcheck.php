<?php

session_start();

    if (isset($_SESSION['cusEmail'])) {
        header("Location:../Booking/takeDateService.php");
    }else{
        echo"You have to sign in";
    header("Location:../login/login1/index.php");
    }

?>