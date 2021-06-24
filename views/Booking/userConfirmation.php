<?php
session_start();
require_once '../salonPage/config.php';

$cusEmail=$_SESSION['cusEmail'];
$salonId=$_SESSION['salonId'];

$slotId=$_POST['slotId'];
$employeeId=$_POST['employeeId'];
$bookingDate=$_POST['bookingDate'];
$employeeName=$_POST['employeeName'];
$time=$_POST['time'];
$service=$_POST['service'];

$sql = "SELECT salonName
        FROM salon_info
        WHERE salonId= ".$salonId.";";

$result= mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
       $salonName=$row['salonName']; 
         
    }
}

$a2 = explode("@", $cusEmail);
        $username2 = $a2[0];

$sql2 = "SELECT cusId,cusEmail
        FROM customers";

$result2= mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
    while($row = mysqli_fetch_assoc($result2)) {
        $email1 =$row['cusEmail']; ;
        $a1 = explode("@", $email1);
        $username1 = $a1[0];
        
        if($username1==$username2){
            $cusId=$row['cusId']; 
        }    
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Information</title>

    <link rel="stylesheet" href="../createAcc/fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="../createAcc/css/style.css">
    
    <link rel="stylesheet" href="../../assets/css/style.css">
    
    <style>
        .signup{
          
            padding-top: 100px;
            width: 1200px;
            padding-left: 320px;
        }
        
        .total{
            background-image: url(../../assets/images/Appointment.jpg);
        }
        
        .signup-image{
            padding-top: 0px;
            width: 300px;
            
        }
        
        .label{
            padding-bottom: 60px;
            width: 300px;
            background-color: gainsboro;
            font-weight: 800;
        }
        
        .conf{
            width: 300px;
            border-bottom: 0px;
            
        }
        .form-group{
            padding-top: 20px;
            width: 1000px;
            
        }
        
        .font1{
            padding-left: 10px;
        }
        
        .register-form{
            width: 1200px;
        }
        
        .space1{
            height: 150px;
        }
        
    </style>
      
</head>
<body>
    
<?php include('../headFoot/headfile.php'); ?>
    
<div class="total">    
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form" >
                        <h2 class="form-title"><b> Your Booking</b> </h2>
                        <form class="register-form" id="register-form" method="POST" action="conformation.php" onSubmit="return confirm('Are you sure?')";>
                            <div class="form-group">
                                <div class="label">    
                                <label for="name"> <span class="font1">Salon Name </span> </label>
                                </div>
                                <div class="conf">
                                <p> <?php echo $salonName ?></p> 
                                </div>    
                            </div>
                            
                            <div class="form-group">
                                <div class="label">
                                    <label for="email"><span class="font1">Service</span></label>
                                </div>
                                <div class="conf">
                                 <p> <?php echo $service ?></p> 
                                </div>    
                            </div>
                            
                           <div class="form-group">
                                <div class="label">
                                    <label for="email"><span class="font1">Employee</span></label>
                                </div>
                                <div class="conf">
                                 <p> <?php echo $employeeName ?></p> 
                                </div>    
                            </div>
                            
                            <div class="form-group">
                                <div class="label">
                                <label for="email"><span class="font1">Date</span></label>
                                </div>
                                <div class="conf">
                                 <p> <?php echo $bookingDate ?></p> 
                                </div>    
                            </div>
                            
                            <div class="form-group">
                                <div class="label">
                                <label for="email"><span class="font1">Time</span></label>
                                </div>
                                <div class="conf">
                                 <p> <?php echo $time ?></p> 
                                </div>    
                            </div>
                            
                            <div class="form-group">
                                <div class="label">    
                                <label for="name"> <span class="font1">Customer Name </span> </label>
                                </div>
                                <div class="conf">
                                 <p> <?php echo $cusEmail?></p> 
                                </div>    
                            </div>
                            
                            
                            <div class="form-group form-button">
                                <input type = 'hidden' name = 'cusId' value='<?php  echo $cusId;?>'>
                                <input type = 'hidden' name = 'cusEmail' value='<?php  echo $cusEmail;?>'>
                                <input type = 'hidden' name = 'salonId' value='<?php  echo $salonId;?>'>
                                <input type = 'hidden' name = 'service' value='<?php  echo $service;?>'>
                                <input type = 'hidden' name = 'bookingDate' value='<?php  echo $bookingDate;?>'>
                                <input type = 'hidden' name = 'slotId' value='<?php  echo $slotId;?>'>
                                <input type = 'hidden' name = 'employeeId' value = '<?php echo $employeeId;?> '>
                                <input type = 'hidden' name = 'employeeName' value = '<?php echo $employeeName;?> '> 
                                <input type = 'hidden' name = 'bookingDate' value='<?php  echo $bookingDate;?>'>
                                <input type = 'hidden' name = 'salonName' value='<?php  echo $salonName;?>'>
                                <input type = 'hidden' name = 'time' value='<?php  echo $time;?>'>
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Confirm booking"/>
                            </div>
                        </form>
                    </div>
                    
                    <div class="signup-image">
                        
                        <figure>
                            <div class="space1"> &nbsp;</div>                           
                            <img src="../../assets/images/salona2.jpg" alt="Create Account image">       
                        </figure>
                        
                    </div> 
                </div>
            </div>
        </section>
    
    <script src="../createAcc/vendor/jquery/jquery.min.js"></script>
    <script src="../createAcc/js/main.js"></script>
    
</div>    
</body>
</html>