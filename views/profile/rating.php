<?php
session_start();
$cusEmail=$_SESSION['cusEmail'];

require_once '../dbConnection/dbConnection.php';

$bookingId=$_POST['username'];
$salonId=$_POST['usernamesalon'];
$service=$_POST['userservice'];

$sql = "SELECT * FROM services WHERE service = '$service' AND salonId= ".$salonId.";";

$result= mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $serviceId=$row['serviceId'];       
    }
}?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    
<style>
    
.Maintab {
        width: 100%;
        height: 600px;
        padding-top: 150px; 
        padding-left: 50px;        
    }
    
.topic{
        color: #1B5E20;
        font-size: 40px;
        font-weight: 700;
    }
  
.info{
        width: 50%;
        height: 80%;
        background-color:#E8F5E9 ;
        align-content: center;
        margin-left: 25%;
}
    
.rate{
      color: #1B5E20;
      font-size: 40px;
      margin-left: 100px;
      font-weight: 700;
      padding-top: 5%;
      margin-bottom: 20px;
}
    
.rate1{
      margin-bottom: 50px;
}

.rate2{
      color: black;
      font-size: 20px;
      margin-left: 15%;
      font-weight: 700;     
}
    
.main{
     background-image: url("../../assets/images/10-piece-black-makeup-brush-set-on-white-panel-2721977%20(1).jpg");
}
        
.checked {
    color: orange;
}
    
.submit{
    border: none;
    background-color: orange;
    margin-left: 120px;
    width: 100px;  
}
    
.hair{
    margin-left: 25%;
}
    
.details{
    width: 100%;
    margin-top: 50px;
}
    
.imgb{
    width: 100%;
}
    
input[type='radio']:checked:after {
        width: 50px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #ffa500;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
}    
    
input[type=radio] {
    width: 50px;
    border-bottom-color: green
}
   
</style>
        
</head>
    
<body>
    
<?php include('../headFoot/headfile.php'); ?>
    
<div class="main">
    <div class="Maintab">
       <div class="info">    
         <h2 class="rate">Rate the Service</h2>
         <div class="details">    
            <div class="rate1">
            <h3 class="rate2"><?php echo $service; ?></h3>
            <div class="hair">
            <div style="height:15px;"></div>    
                    <form action = 'addRating.php' method = 'POST'> 
                         <input type = 'hidden' name = 'bookingId' value = '<?php  echo $bookingId;?>'> 
                         <input type = 'hidden' name = 'salonId' value = '<?php  echo $salonId;?>'> 
                         <input type = 'hidden' name = 'serviceId' value = '<?php  echo $serviceId;?>'> 
                         <input type="radio" class="rateb"  name="rate" value='1'> 1  
                         <input type="radio" class="rateb" name="rate" value='2'> 2 
                         <input type="radio" class="rateb" name="rate" value='3'> 3
                         <input type="radio" class="rateb" name="rate" value='4'> 4
                         <input type="radio" class="rateb" name="rate" value='5'> 5
                         <div style="height:20px;"></div>
                         <input type = 'submit' class="submit" value = "Rate">
                    </form>       
            </div>    
            </div>   
        </div>
     </div>       
  </div>
</div>
</body>
</html> 
