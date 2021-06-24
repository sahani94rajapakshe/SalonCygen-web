<?php
session_start();

include('../dbConnection/dbConnection.php');


$email=$_GET['email'];
/*$email = 'sahanisineka@gmail.com';*/

$_SESSION['email']=$email;


$sql ="SELECT * FROM admin WHERE email= '$email' ";
$result = mysqli_query($conn, $sql);

/*$sql1 ="SELECT salonId FROM salon_info WHERE email= '$email' ";
$result1 = mysqli_query($conn, $sql1);*/


/*$row1 = mysqli_fetch_assoc($result1);*/



if(mysqli_num_rows($result) > 0){
    
        $_SESSION['role']=4;
        header("Location: adminPage.php");
    
    /*header("Location: checkSalon.php");php page check emil in the salon pge if yes salon page load the page according to the email, if not then editable page*/ 
}else {
    	header("Location:salonOwnerAccount.php");
    }
?>


