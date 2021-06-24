<?PHP 
session_start();
require_once '../dbConnection/dbConnection.php';

$cusId=$_POST['cusId'];
//$cusId=1;
$cusEmail=$_POST['cusEmail'];
$salonId=$_POST['salonId'];
$service=$_POST['service'];
$bookingDate=$_POST['bookingDate'];
$slotId=$_POST['slotId'];
$employeeId=$_POST['employeeId'];
$employeeName=$_POST['employeeName'];
$salonName=$_POST['salonName'];
$time=$_POST['time'];

$sql="INSERT INTO appoinment(cusId,cusEmail,salonId,service,bookingDate,slotId,employeeId,employeeName,salonName) values('$cusId','$cusEmail','$salonId','$service','$bookingDate','$slotId','$employeeId','$employeeName','$salonName')";
    
        if ($conn->query($sql) === TRUE) {
            $_SESSION['service']=$service;
            $_SESSION['bookingDate']=$bookingDate;
            $_SESSION['employeeId']=$employeeId;
            $_SESSION['employeeName']=$employeeName;
            $_SESSION['salonName']=$salonName;
            $_SESSION['time']=$time;
            $_SESSION['cusEmail']=$cusEmail;
           echo "<script>alert('You successfully made the apppointment.');
           window.location.href='mail/index.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
 
mysqli_close($conn);

?>
