
<?php


session_start();
include ('../dbConnection/dbConnection.php');

if(isset($_POST['btn_remove'])){
	$salonId=$_POST['salonId'];
  mysqli_query($conn," UPDATE salon_info SET remove = '1' WHERE salonId = '$salonId' "); //your update-query
	/*echo "successsss";*/
header("Location: ./adminPage.php");
} 
elseif(isset($_POST['btn_restore'])){
  $salonId=$_POST['salonId'];
  mysqli_query($conn," UPDATE salon_info SET remove = '0' WHERE salonId = '$salonId' "); //your update-query
	/*echo "successsss";*/
header("Location: ./adminPage.php");//your other update-query
} 
               


?>