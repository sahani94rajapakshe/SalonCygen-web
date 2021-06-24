<?PHP 
session_start();
require_once '../../dbConnection/dbConnection.php';

$salonId=$_POST['salonId'];
$bookingDate=$_POST['bookingDate'];
$slotId=$_POST['slotId'];
$employeeId=$_POST['employeeId'];
$employeeName=$_POST['employeeName'];
$blocked=1;

$sql="INSERT INTO appoinment(salonId,bookingDate,slotId,employeeId,employeeName,blocked) values('$salonId','$bookingDate','$slotId','$employeeId','$employeeName','$blocked')";

        if ($conn->query($sql) === TRUE) {
           echo "<script>alert('You successfully blocked the slot.');
           window.location.href='../Salon-Admin1.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
 
mysqli_close($conn);

?>
