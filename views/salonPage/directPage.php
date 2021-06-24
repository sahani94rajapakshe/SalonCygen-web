<?PHP 
session_start();
include('../dbConnection/dbConnection.php');


$email=$_SESSION['email'];

$sql ="SELECT salonId FROM salonowners WHERE email= '$email' ";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$_SESSION['salonId']= $row['salonId'];;

 echo "<script> window.location.href='Salon-Admin.php';</script>";
      
  if (mysqli_num_rows($result) > 0) {
     
      
    // header("Location: Salon-Admin.php");
  }else{
      //header("Location: Salon-Admin1.php");
  }
  
?>