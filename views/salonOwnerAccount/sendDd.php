<?PHP 
session_start();
include('../dbConnection/dbConnection.php');

$salonUsername=$_SESSION['salonUsername'];
$email=$_SESSION['email'];

$firstName=$_POST['firstName'];
$secondName=$_POST['secondName'];
$pass=$_POST['pass'];
$re_pass=$_POST['re_pass'];
$homeAddress=$_POST['homeAddress'];
$street=$_POST['street'];
$city=$_POST['city'];
$NUM=$_POST['NUM'];
$DOB=$_POST['DOB'];
$gender=$_POST['gender'];

$ownerName = $firstName . ' ' . $secondName;

$sql="INSERT INTO salonowners(salonUsername,ownerName,email,pass,re_pass,homeAddress,street,city,NUM,DOB,gender) values('$salonUsername','$ownerName','$email','$pass','$re_pass','$homeAddress','$street','$city','$NUM','$DOB','$gender')";

if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New Account Created successfully.');
        window.location.href='../salonPage/Salon-Admin.php';</script>";    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);

?>