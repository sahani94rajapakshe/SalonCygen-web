<?php
session_start();
/*$cusEmail=$_SESSION['cusEmail'];*/
$salonId=$_SESSION['salonId'];
$salon=$_SESSION['salon'];

require_once '../config.php';

$bookingDate=$_POST['bookingDate'];

$date = new DateTime($bookingDate);
$now = new DateTime();

?> 

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/cc.css">
<link rel="stylesheet" href="../css/cc1.css">
<link rel="stylesheet" href="../css/formcss.css">
<link rel="stylesheet" href="../../createAcc/fonts/material-icon/css/material-design-iconic-font.min.css">
       
<style>

body {
    font-family: "Lato", sans-serif; 
}
    
.outer{
     background-color: gainsboro;
     height: auto;
}

.page{  
     width: 90%;
     margin-left: 22%;
    }
    
#records {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    margin-left: 2%;
    margin-right: 5%;
    
}
  
.booktd{
    color: black;
    padding-left: 30px;
}
    
#records th {
    color: black;
    height: 50px;
    padding-left: 5%;
    font-size: 20px;
}
    
#records td{
     color: black;
}    
        
p{
        background-color: red;
        width: 200px;
        height: 40px;
        padding-left: 18%; 
        color: white;
        margin-bottom: -40px;
}  
    
.slot{
        font-size: 20px;
        padding-left: 30px;
}  
    
    
.container{
        position: absolute;
        z-index: 15;
        top: 15%;
        left:450px;
        margin-top:30px;    
}
    
    
.button{
        padding-left: 50px;
        padding-right: 50px;
        font-size: 20px;
        background-color: #da2c43;
        border:none;
        border-radius: 6px;
        cursor: pointer;
        float: left;
        height: 50px;
        margin-left: 120px;
}
    
.portfolio{
        margin-left: 300px;
        margin-top: 20px;
        background-color: darkgray;
        height: 100px;
}
    
 
input[type=date]{
        width: 100%;
} 
    
.show{
        color: darkblue;
        margin-left: 15%;
        font-weight: 700;
}
    
.submit{
    background-color: blue;
    color: white;
    border: none;
    cursor: pointer;
    height: 50px;
    width: 150px;
}
    
.cmn{
    width: 150px;
    padding-left: 30px;
}
    
.service{
    background-color:yellow;
}
    
.tooltip {
  position: relative;
  display: inline-block;
  
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 300px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  top: 100%;
  left: 50%;
  margin-left: -60px;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
} 
    
.para{
    height: 50px;
    width: 150px;
    margin-top: -23px;
    border-radius: 6px;
    padding-top: 10px;
    background-color: darkgray;
}
    
  
       

</style>
</head>
    
<body>
   <!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
    <i class="fa fa-remove"></i>
    </a>
    <img src="../Images/beauty.jpg" style="width:45%;" class="w3-round"><br><br>
    <h4><b><?php  echo $salon;  ?></b></h4>
  </div>
    
  <div class="w3-bar-block">
    <!--<a href="Salon-Admin.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i><?php /* echo $salon;  */?></a>--> 
      <a href="../Salon-Admin1.php" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i><?php  echo $salon;  ?></a>
  </div>
    
  <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</nav>
    
<header id="portfolio" class="portfolio">      
  <a href="#"><img src="../Images/12-hair3.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
  <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
      <div class="w3-container">
        <h1><?php  echo $salon;?></h1> 
      </div>
</header>    
    
<div class="outer">  
<div class="page">

<?php   
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

?><h2 class="show"> Booking Availability </h2>
  <h4 class="show"> <?php echo $bookingDate  ?> </h4>   

<?php
echo  "<table id = 'records'>"; 
echo "<tr>";
echo  "<th> &nbsp; </th>";
for ($y = 0; $y <$employeeCount; $y++){
      echo  "<th>" ,$employeeName[$y], "</th>";
}
echo "</tr>"; 
for ($x = 0; $x <$slotCount; $x++) { 
?>
     <tr><td> &nbsp;</td></tr>
     <tr><td class="slot"> <?php echo $time[$x]; ?> </td>
     <?php 
            for ($y = 0; $y <$employeeCount; $y++) {
            $sql3 = "SELECT employeeId, slotId, bookingDate, blocked, bookingId, cusEmail, service
                     FROM appoinment
                     WHERE salonId= ".$salonId.";";

            $result3= mysqli_query($conn, $sql3);
            $appSlotId = array();
            $appEmployeeId = array();
            $blocked = array();
           
                if (mysqli_num_rows($result3) > 0) {
                 while($row = mysqli_fetch_assoc($result3)) {
                    if($bookingDate==$row['bookingDate']){
                     $appSlotId=$row['slotId'];
                     $appEmployeeId=$row['employeeId'];
                     $blocked=$row['blocked'];
                     $bookingId=$row['bookingId']; 
                     $cusEmail=$row['cusEmail']; 
                     $service=$row['service'];    
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
                if($blocked==0){ ?>
                    <td id = 'Booked' class="cmn">
                    <form action = 'cancel.php' method = 'POST'>   
                    <span class="tooltip">   
                    <p class='submit hvr sps' style="background-color:red; height:30px;padding-top:1px; margin-top:0px;"> Booking </p>  
                    <span class="tooltiptext"> <?php echo $service ?><br><?php echo $cusEmail ?></span> </span>                  
                    <span class="tooltip">     
                    <input class='submit hvr sps' type = 'submit' value = 'Cancel' style="background-color:#e7c803; height:25px; padding-top:2px; margin-top: -40px;">
                    <span class="tooltiptext"> <?php echo 'Cancel the booking' ?></span></span>     
                    <input type = 'hidden' name = 'bookingId' value='<?php  echo $bookingId;?>'>
                    <input type = 'hidden' name = 'salonId' value='<?php  echo $salonId;?>'>    
                    <input type = 'hidden' name = 'cusEmail' value='<?php  echo $cusEmail;?>'>
                    <input type = 'hidden' name = 'time' value='<?php  echo $time[$x];?>'>
                    <input type = 'hidden' name = 'employeeName' value = '<?php echo $employeeName[$y];?> '> 
                    <input type = 'hidden' name = 'bookingDate' value='<?php  echo $bookingDate;?>'> 
                    <input type = 'hidden' name = 'service' value='<?php  echo $service;?>'>     
                    </form>
                     </td> <?php
                }elseif($blocked==1){
                    if($date < $now) {?>
                    <td class="booktd cmn para1"> <p class="para"> Cannot Change</p></td>
                    <?php
                    }else{   
                    ?>
                    <td class="booktd cmn"><form action = 'unblock.php' method = 'POST'>
                    <input type = 'hidden' name = 'bookingId' value='<?php  echo $bookingId;?>'>
                    <input class='submit' type = 'submit' value = 'Unblock' style="background-color:blue;">
                    </form></td>
                    <?php
                    } 
                }
            }elseif($can==2){
                if($date < $now){?>
                      <td class="booktd cmn"> <p class="para"> Cannot Change</p></td>
                    <?php
                    }else{   
                    ?>
                    <td class="booktd cmn"><form action = 'block.php' method = 'POST'>
                    <input type = 'hidden' name = 'salonId' value='<?php  echo $salonId;?>'>
                    <input type = 'hidden' name = 'slotId' value='<?php  echo $slot[$x];?>'>
                    <input type = 'hidden' name = 'time' value='<?php  echo $time[$x];?>'>
                    <input type = 'hidden' name = 'employeeId' value = '<?php echo $employee[$y];?> '>
                    <input type = 'hidden' name = 'employeeName' value = '<?php echo $employeeName[$y];?> '> 
                    <input type = 'hidden' name = 'bookingDate' value='<?php  echo $bookingDate;?>'>
                    <input class='submit' type = 'submit' value = 'Block' >
                    </form></td>
                    <?php
                    }         
            }else{
                echo "<td>Something Wrong</td>";
            }
    }
    echo "</tr>" ;                               
}

?>
    </div>       
    </div>     
</body>
</html>         