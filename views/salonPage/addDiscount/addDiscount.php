<?php

session_start();

require_once '../config.php';

$salonId=$_SESSION['salonId'];
$salon=$_SESSION['salon'];

$sql ="SELECT newyeardiscount FROM salon_info WHERE salonId='$salonId'";

$result= mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
       $newyeardiscount=$row['newyeardiscount']; 
         
    }
}

?>

<!DOCTYPE html>
<html>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/cc.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="../css/cc1.css">
<link rel="stylesheet" href="../css/formcss.css">

<style>
    
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
  

.container{
          position: absolute;
          width: 1000px;
          z-index: 15;
          top: 30%;
          left:450px;
          margin-top:30px; 
          background-color: whitesmoke;
          }
    
.discount{
          position: absolute;
          width: 1000px;
          height: 100px;
          z-index: 15;
          background-color: lemonchiffon;
          margin: -100px 0 0 -150px;
        }
    
.discounttext{
        font-weight: 900;
        color: darkgoldenrod;
        font-size: 35px;
        align-content: center;
        padding-left: 350px;
        }
        
.form{
        padding-top: 25px;
        padding-left: 30px;
        width: 970px;
        height: 300px;  
        }
        
.text1{
        padding-left: 10px;
        width: 100%;
        height: 100px;
        padding-right: 10px;
        background-color: floralwhite;
        }
        
.button{
        padding-left: 50px;
        padding-right: 50px;
        font-size: 20px;background-color: coral;
        border:none;
        border-radius: 4px;
        cursor: pointer;
        float: left;
        height: 50px;
        margin-left: 300px;
        }
    
    .button2{
        margin-left: 270px;
        background-color: darkgoldenrod;
        margin-top: -40px;
    }
    
.portfolio{
        margin-left: 300px;
        margin-top: 20px;
        background-color: darkgray;
        height: 100px;
        }
    
    
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

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
    
<div class=container>
        <div class="discount">
          <p class="discounttext">Add Your Discount</p>
          <form  class="form" method="POST" action="addDiscountDb.php">
            <input class="text1" type="text"  name="discount" value=' <?php echo $newyeardiscount;?>' required  />
              <br><br>
              <button class="button"  type="submit" name="submit">Update</button>
            </form>
            <form class="form" method="POST" action="addDiscountDb1.php">
              <button class="button button2" style="background-color:" type="submit" name="submit">Remove Discount</button>
            </form>
        </div>
</div>
    
</body>
</html>

