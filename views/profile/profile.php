<?php
session_start();
$cusEmail=$_SESSION['cusEmail'];

require_once '../dbConnection/dbConnection.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
        
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

.tab {
  float: left;
  background-color: inherit;
  width: 10%;
}

.tab button {
  display: block;
  background-color: #FA8072;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  font-size: 17px;
  border-bottom: 0.5px solid black;
}

.tab button:hover {
  background-color: #DC143C;
}

.tab button.active {
  background-color:#DC143C
 padding-top:10px;
}

.tabcontent {
  float: left;
  /*padding: 0px 12px;*/
  border: 1px solid #ccc;
  width: 85%;
  border-left: none;
  background-color: 	#FFF0F5;
  display: none;
  margin-bottom: 20px;
  padding-bottom: 30px;
  padding-left: 12px;
  padding-right: 12px;  
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

.Maintab {
  width: 100%;
  height: 800px;
  padding-top: 150px; 
  padding-left: 50px;
  background-image: url("../../assets/images/assorted-blur-close-up-container-1115128.jpg");
}
    
.topic{
  color: 	#8B0000;
  font-size: 50px;
  margin-left: 100px;
  font-weight: 700;
}
    
.collapse navbar-collapse{
  background-color: #b7410e;  
}
       
#records {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
    
#records td, #records th {
  border: 1px solid #ddd;
  padding: 8px;
}
    
#records tr:nth-child(even){}
#records tr:hover {background-color: #ddd;}
#records th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #ce4012;
  color: white;
}
    
body{
    background-color: #f2f2f2;
}
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
button{
    background-color: #4CAF90;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.topic1{
    padding-left: 5%;
    padding-top: 15px;
    font-weight: 600;
}   
    
</style>
</head>
    
<body>
    
<?php include('../headFoot/headfile.php'); ?>
    
<div class="Maintab">
<p class= "topic">Bookings</p>

<div class="tab">
  <button class="tablinks" onmouseover="bookingDetails(event, 'Bookings')">Rate</button>
  <button class="tablinks" onmouseover="bookingDetails(event, 'Accepted')">Accepted</button>
  <button class="tablinks" onmouseover="bookingDetails(event, 'Rejected')">Rejected</button>
</div>

<div id="Bookings" class="tabcontent">
  <h3 class="topic1">Rate the Service</h3>
  <?php $sql = "SELECT A.bookingId, S.salonName, A.salonId,A.service,A.bookingDate,A.employeeName,T.time,A.status,A.view,A.cusEmail,A.rated 
  FROM salon_info S,appoinment A, timeslot T
  WHERE A.status='0' and A.view='0'and S.salonId=A.salonId and A.rated='0' and T.slotId=A.slotId " ;
    
$result= mysqli_query($conn, $sql);
echo  "<table id = 'records'>"; 
echo "<tr>";
      echo  "<th>Salon Name</th>";
      echo  "<th>Service</th>";
      echo  "<th>Booking Date</th>";
      echo  "<th>Booking Time</th>";
      echo  "<th>Employee Name</th>";
      echo  "<th>Rate</th>";
      echo  "<th>Skip Rate</th>";
echo "</tr>";  
    
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
       if($row['cusEmail']==$cusEmail){            
            $username =$row['bookingId'];
            $usernamesalon =$row['salonId'];
            $userservice =$row['service'];
            $bookingDate=$row['bookingDate'];           
                 
            $date = new DateTime($bookingDate);
            $now = new DateTime();

            if($date < $now) {    
                    echo "<tr><td>", $row['salonName'] , "</td>
                    <td>" , $row['service'] , "</td>
                    <td>" , $row['bookingDate'] , "</td>
                    <td>", $row['time'] , "</td>
                    <td>", $row['employeeName'] , "</td>";?>
                    <td>  
                    <form action = 'rating.php' method = 'POST'>
                    <input type = 'hidden' name = 'username' value='<?php  echo $username;?>'>
                    <input type = 'hidden' name = 'usernamesalon' value = '<?php echo $usernamesalon;?> '>
                    <input type = 'hidden' name = 'userservice' value = '<?php echo $userservice;?>' >        
                    <input type = 'submit' value = 'Rate' >
                    </form>
                    </td>
                    <td><form action = 'ratingCancel.php' method = 'post'>
                    <input type = 'hidden' name = 'username' value = "<?php echo $username;?>">
                    <input type = 'submit' value = 'Skip Rate' >
                    </form></td>

                <?php echo "</tr>";     
            }    	    
	    }
  }
    echo "</table>";
}else {
    echo " <p> No bookings to rate </p> </table>";} 
?> 
</div>
        
<div id="Accepted" class="tabcontent">
  <h3 class="topic1">Accepted</h3>
  <?php $sql = "SELECT A.bookingId, S.salonName, A.salonId,A.service,A.bookingDate,A.employeeName,T.time,A.status,A.view,A.cusEmail,A.rated,A.employeeId 
  FROM salon_info S,appoinment A, timeslot T
  WHERE A.status='0' and A.view='0'and S.salonId=A.salonId and T.slotId=A.slotId " ;
   
        $result= mysqli_query($conn, $sql);
        echo  "<table id = 'records'>"; 
        echo "<tr>";
              echo  "<th>Salon Name</th>";
              echo  "<th>Service</th>";
              echo  "<th>Booking Date</th>";
              echo  "<th>Booking Time</th>";
              echo  "<th>Employee Name</th>";
              echo  "<th>Remove Viewed</th>";
              echo  "<th>Cancel Booking</th>";   
          echo "</tr>";  
    
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
       if($row['cusEmail']==$cusEmail){    
            $username =$row['bookingId'];
            $bookingDate=$row['bookingDate'];
            $salonName =$row['salonName'];
            $salonId =$row['salonId'];
            $service =$row['service'];
            $employeeName =$row['employeeName'];
            $employeeId =$row['employeeId'];
            $time =$row['time'];
             
            
            $date = new DateTime($bookingDate);
            $now = new DateTime();
            if($date > $now) {                     
                    echo "<tr><td>", $row['salonName'] , "</td>
                    <td>" , $row['service'] , "</td>
                    <td>" , $row['bookingDate'] , "</td>
                    <td>", $row['time'] , "</td>
                    <td>", $row['employeeName'] , "</td>
                    <td><form action = 'view.php' method = 'post'>
                    <input type = 'hidden' name = 'username' value = ", $username, ">
                    <input type = 'submit' value = 'Viewed'>
                    </form></td>
                    <td><form action = 'cancel.php' method = 'post'>
                    <input type = 'hidden' name = 'username' value = ", $username, ">
                    <input type = 'hidden' name = 'service' value = ", $service, ">
                    <input type = 'hidden' name = 'bookingDate' value = ", $bookingDate, ">
                    <input type = 'hidden' name = 'time' value = ", $time, ">
                    <input type = 'hidden' name = 'employeeName' value = ", $employeeName, ">
                    <input type = 'hidden' name = 'employeeId' value = ", $employeeId, ">
                    <input type = 'hidden' name = 'salonId' value = ", $salonId, ">
                    <input type = 'submit' value = 'cancel'>
                    </form></td>
                   </tr>";
            }	    
	    }
   }
 echo "</table>";
}else {
    echo " <p> No bookings to view </p> </table>";}
?> 
</div>

<div id="Rejected" class="tabcontent" >
  <h3 class="topic1">Cancelled</h3>
   <?php $sql = "SELECT A.cancelId, A.salonId,A.service,A.bookingDate,A.employeeName,A.time,A.view,A.cusEmail, S.salonName 
  FROM salon_info S,cancel A
  WHERE A.view='0'and S.salonId=A.salonId" ;
$result= mysqli_query($conn, $sql);
echo  "<table id = 'records'>"; 
echo "<tr>";
      echo  "<th>Salon Name</th>";
      echo  "<th>Service</th>";
      echo  "<th>Booking Date</th>";
      echo  "<th>Booking Time</th>";
      echo  "<th>Employee Name</th>";
      echo  "<th>Remove Viewed</th>"; 
echo "</tr>";  
    
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
       if($row['cusEmail']==$cusEmail){
              
        $username =$row['cancelId'];

        echo "<tr><td>", $row['salonName'] , "</td>
        <td>" , $row['service'] , "</td>
        <td>" , $row['bookingDate'] , "</td>
        <td>", $row['time'] , "</td>
        <td>", $row['employeeName'] , "</td>
        <td><form action = 'rejectview.php' method = 'post'>
        <input type = 'hidden' name = 'username' value = ", $username, ">
        <input type = 'submit' value = 'Viewed'>
        </form></td>
       </tr>";   
	    }
   }
 echo "</table>";
}else {
    echo " <p> No rejected bookings </p> </table>";}  
    ?> 
</div>
    
<div class="clearfix"></div>
    
</div>

<script>
function bookingDetails(evt,booking) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(booking).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
</body>
</html> 
