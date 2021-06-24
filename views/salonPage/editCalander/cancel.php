<?PHP 
session_start();
require_once '../../dbConnection/dbConnection.php';

$bookingId=$_POST['bookingId'];
$salonId=$_POST['salonId'];
//$salonId=1;
$bookingDate=$_POST['bookingDate'];
$time=$_POST['time'];
$employeeName=$_POST['employeeName'];
$cusEmail=$_POST['cusEmail'];
$service=$_POST['service'];


$sql="INSERT INTO `cancel`(`salonId`, `cusEmail`, `bookingDate`, `time`, `employeeName`, `service`,`view`) 
VALUES ('$salonId','$cusEmail','$bookingDate','$time','$employeeName','$service',0)";

$sql2 = "DELETE FROM `appoinment` WHERE bookingId= ".$bookingId.";";

        if ($conn->query($sql) === TRUE&&$conn->query($sql2)) {
           $_SESSION['cusEmail']=$cusEmail;
           $_SESSION['employeeName']=$employeeName;
           $_SESSION['time']=$time;
           $_SESSION['bookingDate']=$bookingDate;
           echo "<script>alert('You successfully cancel the booking.');
           window.location.href='mail/index.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
 
mysqli_close($conn);

?>
