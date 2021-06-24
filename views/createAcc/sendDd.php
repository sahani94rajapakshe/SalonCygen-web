<?PHP 
session_start();
include('../dbConnection/dbConnection.php');

$cusUsername=$_SESSION['cusUsername'];
$cusEmail=$_SESSION['cusEmail'];

$pass=$_POST['pass'];
$re_pass=$_POST['re_pass'];
$homeNumber=$_POST['homeNumber'];
$street=$_POST['street'];
$city=$_POST['city'];
$NUM=$_POST['NUM'];
$DOB=$_POST['DOB'];
$gender=$_POST['gender']; //male or female

$sql="INSERT INTO customers(cusUsername,cusEmail,pass,re_pass,homeNumber,street,city,NUM,DOB,gender) values('$cusUsername','$cusEmail','$pass','$re_pass','$homeNumber','$street','$city','$NUM','$DOB','$gender')";

if (isset($_SESSION['salonId'])) {
         if ($conn->query($sql) === TRUE) {
           echo "<script>alert('New Account Created successfully.');
           window.location.href='../Booking/dateService.php';</script>";
            $_SESSION['role']=2;     
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

 }else{
        if ($conn->query($sql) === TRUE) {
           echo "<script>alert('New Account Created successfully.');
           window.location.href='../index.php';</script>";
           $_SESSION['role']=2;    
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
 }

mysqli_close($conn);

?>