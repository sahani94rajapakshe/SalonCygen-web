<?php

session_start();

require_once '../dbConnection/dbConnection.php';

$bookingId=$_POST['bookingId'];
$salonId=$_POST['salonId'];
$serviceId=$_POST['serviceId'];
$rateValue=$_POST['rate'];

$_SESSION["salonId"]= $salonId;

$sql2 = "UPDATE appoinment 
         SET rated='1',rateAmount = '$rateValue'
         WHERE bookingId=".$bookingId.";";  

$result2 = mysqli_query($conn, $sql2);

$sql6 = "SELECT salonId, totalRate, totalCount
         FROM salon_info
         WHERE salonId = ".$salonId.";" ;

$result6= mysqli_query($conn, $sql6);

if (mysqli_num_rows($result6) > 0) {
    while($row = mysqli_fetch_assoc($result6)) {
        
        $totalRate=$row['totalRate'];
        $totalCount=$row['totalCount'];
        
    }
}


$totalRate =  $totalRate + $rateValue;
$totalCount = $totalCount + 1;

echo $totalRate ;
echo $totalCount;
  
$sql7 = "UPDATE salon_info 
         SET totalRate='$totalRate', totalCount= '$totalCount'
         WHERE salonId=".$salonId.";";
 
$result7= mysqli_query($conn, $sql7);

if ($conn->query($sql7) === TRUE){
   echo "<script>alert('You successfully rated the booking .');window.location.href='profile.php';</script>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
?> 