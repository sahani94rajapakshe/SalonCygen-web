<?php
session_start();
$cusEmail=$_SESSION['cusEmail'];
$salonId=$_SESSION['salonId'];

require_once '../salonPage/config.php';

$bookingDate=$_POST['bookingDate'];
$service=$_POST['service'];

$date = new DateTime($bookingDate);
$now = new DateTime();

if($date < $now) {
    echo "<script>alert('Date is a passed date. Enter a valied Date'); window.location.href='takeDateService.php';</script>"; 
}else{
?> 

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 
<style>

body {font-family: "Lato", sans-serif; }
    
.outer{
    background-image: url("../../assets/images/assorted-blur-close-up-container-1115128.jpg"); 
    }

.page{
     background-color: white;
     width: 90%;
     margin-left: 8%;
     } 
    
h1{
    padding-top: 7%;
    text-align: center;
    padding-bottom: 20px;
    color: green;
    }  
    
h4{
    text-align: center;
    padding-bottom: 20px;
    color: green;
    font-weight: 800;
    }
    
#records {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    width: 80%; 
    border-top: 2px;
    margin-left: 50px;
    }
    
.booktd{
    color: black;
    }
    
#records tr:nth-child(even){}

#records th {
    color: black;
    height: 50px;
    padding-left: 1%;
    font-size: 20px;
    }
    
#records td{
    padding-top: 10px;
    width: 150px;
    }    
    

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    height: 40px;
    width: 150px;
    border-radius: 6px;
    }
    
p{
    background-color: red;
    width: 150px;
    height: 40px;
    padding-left: 10%;
    padding-top: 4%;
    color: white;
    }  
    
.slot{
    font-size: 20px;
    padding-left: 20px;
    } 
     
</style>
</head>
    
<body>
    
<div class="outer">  
      
<div> <h1> Booking Availability </h1>
      <h4> <?php echo $bookingDate  ?> </h4>
</div>    
    
<div class="page">

<?php
include('../headFoot/headfile.php');    
    
$sql = "SELECT employeeId, employeeName,salonId
          FROM employee
          WHERE salonId= ".$salonId.";";

echo '<br>';echo '<br>';

$result= mysqli_query($conn, $sql);

$employee = array();
   
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        
         $employee[]=$row['employeeId'];
         $employeeName[]=$row['employeeName'];
    }
}

$employeeCount = count($employee);

$sql2 = "SELECT time, slotId
          FROM timeSlot";

$result2= mysqli_query($conn, $sql2);

$slot = array();
$time = array();

if (mysqli_num_rows($result2) > 0) {
    while($row = mysqli_fetch_assoc($result2)) {
        
         $slot[]=$row['slotId'];
         $time[]=$row['time'];    
    }
}

$slotCount = count($slot);

$can = 0;

echo  "<table id = 'records'>"; 
echo "<tr>";
echo  "<th> &nbsp; </th>";
for ($y = 0; $y <$employeeCount; $y++){
      echo  "<th>" ,$employeeName[$y], "</th>";
}
echo "</tr>"; 
for ($x = 0; $x <$slotCount; $x++) { ?>
     <tr><td> &nbsp;</td></tr>
     <tr><td class="slot"> <?php echo $time[$x]; ?> </td>
            <?php 
            for ($y = 0; $y <$employeeCount; $y++) {
                    $sql3 = "SELECT employeeId, slotId, bookingDate
                             FROM appoinment
                             WHERE salonId= ".$salonId.";";

                    $result3= mysqli_query($conn, $sql3);

                    $appSlotId = array();
                    $appEmployeeId = array();

                    if (mysqli_num_rows($result3) > 0) {
                        while($row = mysqli_fetch_assoc($result3)) {
                            if($bookingDate==$row['bookingDate']){

                             $appSlotId=$row['slotId'];
                             $appEmployeeId=$row['employeeId'];

                                   if($slot[$x]==$appSlotId && $employee[$y]==$appEmployeeId){
                                         $can=1;
                                         break;  
                                    }else{
                                       $can=2;
                                    }
                            }else{
                                $can=2;
                            }
                        }
                    }else{
                        $can=2;
                    } 

                    if($can==1){
                         echo  "<td id = 'cannotbook' class='cannont'> <div style='height:10px;'></div><p>Cannot Book </p> </td>";
                    }elseif($can==2){ ?>
                         <td class="booktd"><form action = 'userConfirmation.php' method = 'POST'>
                            <input type = 'hidden' name = 'slotId' value='<?php  echo $slot[$x];?>'>
                            <input type = 'hidden' name = 'time' value='<?php  echo $time[$x];?>'>
                            <input type = 'hidden' name = 'employeeId' value = '<?php echo $employee[$y];?> '>
                            <input type = 'hidden' name = 'employeeName' value = '<?php echo $employeeName[$y];?> '> 
                            <input type = 'hidden' name = 'bookingDate' value='<?php  echo $bookingDate;?>'>
                            <input type = 'hidden' name = 'service' value='<?php  echo $service;?>'> 
                            <input class='submitb' type = 'submit' value = 'Book the Slot' >
                         </form></td>
                    <?php 
                    }else{
                        echo "<td>Something Wrong</td>";
                    }
           }
       echo "</tr>" ;                               
}
}
?>
</div>       
</div>     
</body>
</html>         