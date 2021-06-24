<?php
session_start();

$salonId=$_SESSION['salonId'];
$cusEmail=$_SESSION['cusEmail'];

require_once '../dbConnection/dbConnection.php';

 $sql2 ="SELECT salonName FROM salon_info WHERE salonId= '$salonId' ";
 $result2 = mysqli_query($conn, $sql2); 
 $row = mysqli_fetch_assoc($result2);
 $salonName= $row['salonName'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Account</title>

    <link rel="stylesheet" href="../createAcc/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../createAcc/css/style.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
                
    <style>
        .signup{
          
            padding-top: 150px;
            width: 1100px;
            padding-left: 500px;
        }
        
        .total{
            background-image: url(../../assets/images/Appointment.jpg);
            padding-bottom: 40px;
        }
        
        .signup-image{
            padding-top: 80px;
        }
        
        .signup-form{
            padding-left: 60px;
        }
        
        .form-title{
            width: 800px;
            padding-left: 80px;
        }
        
        .register-form{
            width: 800px;
        }
        
        .container{
            padding-top: 40px;
            padding-bottom: 30px;
        }
        
        .sorry{
            padding-left: 20%;
            width: 100%;
        }
               
    </style>
       
</head>
<body>
    
<div class="total">    

<?php include('../headFoot/headfile.php'); 
    
$sql = " SELECT DISTINCT service,serviceId
          FROM services
          WHERE status= 1 AND salonId= ".$salonId.";" ;

$result = mysqli_query($conn, $sql);
    
$myDate = date('m/d/Y');    
          
?>     
        <section class="signup">
            <div class="container">
                    <h2 class="form-title"><b> Enter the Date and Service </b> </h2>
                    <div class="signup-form" >
                                <?php 
                                    if (mysqli_num_rows($result) > 0) { ?>
                                         <form class="register-form" name="register-form"   id="register-form" method="POST" action="calander.php" >
                                           <div class="form-group">
                                             <?php
                                             echo "<select id='service' name='service' required> Service </option>";
                                                while($row = mysqli_fetch_assoc($result)) {
                                                  $service=$row['service'];
                                                  echo "<option value='" . $row['service'] ."' >" . $row['service']."</option>"; 
                                              ?>
                                                   <option value="<?php echo $service; ?>"><?php echo $service;?> </option>    
                                                   <?php  
                                                }
                                             echo "</select>";
                                             ?>
                                          </div>
                      
                                          <div class="form-group">
                                            <label for="email"><i class="zmdi zmdi-account-calendar "></i></label>
                                            <br><br><br>
                                            <input type="date" required placeholder =" Date for the booking" name="bookingDate" id="bookingDate"/>
                                          </div>
                            
                                          <div class="form-group form-button">
                                           <input type="submit" name="submit" id="submit" class="form-submit" value=" Show Availability" onclick=" dateChecker();"/>
                                          </div>      
                                        </form>
                                        <?php 
                                    }else{ 
                                        ?> 
                                        <div class="sorry">
                                        <p>OOps.. Sorry! Can't Book. </p><p>No Services added by salon <?php echo $salonName ?></p>
                                        <form class="register-form2" name="register-form"   id="register-form" method="POST" action="calander2.php" >
                                                <input type="submit" name="submit" id="submit" class="form-submit" value=" Back to Search"/>
                                        </form>
                                        </div>    
                                        <?php 
                                    }   ?>
                    </div>
            </div>
        </section>

    <script src="../createAcc/vendor/jquery/jquery.min.js"></script>
    <script src="../createAcc/js/main.js"></script>
    
</div>    
</body>
</html>

