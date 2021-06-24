<?php

session_start();

require_once '../config.php';

$salonId=$_SESSION['salonId'];
$salon=$_SESSION['salon'];
   
?>
<!DOCTYPE html>
<html>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/cc.css">
<link rel="stylesheet" href="../css/cc1.css">
<link rel="stylesheet" href="../css/formcss.css">
<link rel="stylesheet" href="../../createAcc/fonts/material-icon/css/material-design-iconic-font.min.css">
    

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
    
    
.container{
          position: absolute;
          z-index: 15;
         top: 20%;
         left:450px;
         margin-top:30px;    
    }
    
    
        .button{
            padding-left: 50px;
            padding-right: 50px;
            font-size: 20px;
            background-color: #da2c43;
            border:none;
            border-radius: 4px;
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
    
       

input[type=submit] {
    background-color: #6176a7;
    color: black;
    border: none;
    border-radius: 4px;
    cursor: pointer;

}
    
    input[type=date]{
        width: 100%;
    }     

    
    
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

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
    
 <section class="signup">
            <div class="container">
                    <h2 class="form-title"><b> Enter the Date</b> </h2>
                    <div class="signup-form" >
                        
                        <form class="register-form" name="register-form"   id="register-form" method="POST" action="calander.php" >

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account-calendar "></i></label>
                                <br>
                                <input type="date" required placeholder =" Date for the booking" name="bookingDate" id="bookingDate" />
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" value=" Show Calander" onclick=" dateChecker();"/>
                            
                            </div>
                        </form>
                    </div>
            </div>
        </section>
    
    </body>
</html>