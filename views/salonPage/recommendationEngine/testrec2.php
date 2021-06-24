<!-- <?php 

 include ('../dbConnection/dbConnection.php');

 ?> -->
 <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "saloncygen";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

 <!DOCTYPE html>
<html lang="en">
  <head>
  <title></title>
  </head>

  <body>

  <?php $result = mysqli_query($conn, "select * from customers");
  while($row=mysqli_fetch_array($result))
  {
  ?>
<table>
  <tr>
  <td><?php echo $row['cusUsername'] ?></td>


  <td>
  	<form action="recommendation.php">
  		<input type="submit" name="show salon" value="show recommendation">
  		<input type="hidden" name="cusId" value="<?php echo $row['cusId']?>">

  	</form>
   </td>
  </tr>
</table>
<?php } ?>
  </body>


<!-- <body>

  <?php $result = mysqli_query($conn, "select * from ratesalon");
  while($row=mysqli_fetch_array($result))
  {
  ?>
<table>
  <tr>
  <td><?php echo $row['userid'] ?></td>


  <td>
    <form action="tstrecommendation.php">
      <input type="submit" name="show salon" value="show recommendation">
      <input type="hidden" name="userid" value="<?php echo $row['userid']?>">
      <input type="hidden" name="salonid" value="<?php echo $row['salonid']?>">
    </form>
   </td>
  </tr>
</table>
<?php } ?>
  </body> -->




  </html>