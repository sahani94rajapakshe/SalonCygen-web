<?PHP 
session_start();
include('../dbConnection/dbConnection.php');

$email=$_SESSION['email'];
$salonId=$_SESSION['salonId'];

 $sql ="SELECT ownerName FROM salonowners WHERE email= '$email' ";
 $result = mysqli_query($conn, $sql); 
 $row = mysqli_fetch_assoc($result);
 $ownerName= $row['ownerName'];
 
 $status=1;
 
 $sql2 = "INSERT INTO employee (employeeName, employeeEmail,salonId,status) 
        VALUES('$ownerName','$email','$salonId','$status')";

if ($conn->query($sql2) === TRUE) {
   echo "<script>alert('Congratulations! You successfuly created a Salon Account.');</script>";
   header("Location:../salonPage/Salon-Admin1.php");    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);

?>