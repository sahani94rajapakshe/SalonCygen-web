<?php
session_start();

//$salonId=$_POST['salonId'];
//$_SESSION["username"]=1;

$salonId=$_SESSION['salonId'];

require_once 'config.php';

//$_SESSION['salonId']=$salonId;

$sql ="SELECT * FROM salon_info WHERE salonId= '$salonId'";
if($result = mysqli_query($conn, $sql)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){

$salon=$row['salonName'];
        
$location1=$row['location1'];
$subtopic1=$row['subtopic1'];
$subtopic2=$row['subtopic2'];
$subtopic3=$row['subtopic3'];
$subtopic4=$row['subtopic4'];
$subtopic5=$row['subtopic5'];
$subtopic6=$row['subtopic6'];

$subtopic1des=$row['subtopic1Des'];
$subtopic2des=$row['subtopic2Des'];
$subtopic3des=$row['subtopic3Des'];
$subtopic4des=$row['subtopic4Des'];
$subtopic5des=$row['subtopic5Des'];
$subtopic6des=$row['subtopic6Des'];
$newyeardiscount=$row['newyeardiscount'];        


$totalRate=$row['totalRate'];
$totalCount=$row['totalCount'];         
$about=$row['about'];
$details1="data 1";
$details2="data 2";
$details3="data 3";
$details4="data 4";
$details5="data 5";
$details6="data 6";
$details7="data 7";
$details8="data 8";
$details9="data 9";
$details10="data 10";
$details11="data 11";
$details12="data 12";
$price1=25;
$price2=50;
$price3=75;
$price4=25;
$price5=50;
$price6=75;
$map=$row['googlemap'];

$m=$row['mobile'];
$email=$row['email'];
$footer=$row['fullAddress'];

$aboutimg1=$row['aboutimg1'];
$aboutimg2=$row['aboutimg2'];
$aboutimg3=$row['aboutimg3'];
$aboutimg1info=$row['aboutimg1info'];
$aboutimg2info=$row['aboutimg2info'];
$aboutimg3info=$row['aboutimg3info'];
        
        
$image1=$row['image1'];
$image2=$row['image2'];
$image3=$row['image3'];
$image4=$row['image4'];
$image5=$row['image5'];
$image6=$row['image6'];        

}}}
?>


<!DOCTYPE html>
<html>
<title>SalonCygen</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/cc.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="css/cc1.css">
    <link rel="icon" href="favicon.png" sizes="16x16" type="image/png"> <!--favicon-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
.container {
  position: relative;
  
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: black;
}

.container:hover .overlay {
  opacity: 0.7;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}

.discount{
  font-weight: bold;
  color: brown;
}
    
#service{
    width: 500px;
    margin-right: 50px;
}
    
.service{
    height: 40px;
    padding-left: 50px;
}
    
.amount{
    padding-left: 80px;
}
    
.amount1{
    padding-left: 40px;
}
    


</style>
    
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
        <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
          <i class="fa fa-remove"></i>
        </a>
        <img src="uploads/<?php echo $image1; ?>" style="width:99%;" class="w3-round"><br><br>
        <h4><b><?php  echo $salon;  ?></b></h4>
        <p class="w3-text-grey" style="height:40px;"><?php  echo $location1;  ?></p>
        <div style="height:10px;"> </div>
  </div>
  <div class="w3-bar-block">
        <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i><?php  echo $salon;  ?></a> 
        <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a> 
        <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
        <a href="../index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>HOME</a> 
  </div>
  <div class="w3-panel w3-large">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
         <div class="w3-container">
          <p class="discount">You want a Discount?:</p>
          <img src="w3images/10.jpg" alt="Forest" style="width:100%;">
          <p><strong>Discounts</strong></p>
          <p><?php echo $newyeardiscount;   ?></p>
         </div>
    </div>
    
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    
    

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">  
    <!-- Header -->
  <header id="portfolio" style="padding-top:30px">
    <a href="#"><img src="Images/12-hair3.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1 style="color: brown; font-weight:900; font-size:40px"><?php  echo $salon;?></h1>
    <div class="w3-section w3-bottombar w3-padding-16" style="background-color:ash; padding-bottom:-40px;"></div>
    </div>
  </header>

   <button style="width: 98%;padding: 2px;font-size: 20px;background-color: #4CAF50;
    color: white;
    padding: 10px 10px;
    border: none;
    border-radius: 6px;
    cursor: pointer; margin-left:10px;" type= "button" onclick="window.location.href='bookingcheck.php'">Book Now</button>
    
    <div class="hh" style="height:20px;"></div>
    
  <!-- First Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="uploads/<?php echo $image1; ?>" alt="Norway" style="width:100%;height:250px" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b><?php echo $subtopic1;   ?></b></p>
        <p><?php echo $subtopic1des;   ?></p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="uploads/<?php echo $image2; ?>" alt="Norway" style="width:100%;height:250px" class="w3-hover-opacity">
      <div class="w3-container w3-white">
         <p><b><?php echo $subtopic2;   ?></b></p>
       <p><?php echo $subtopic2des;   ?></p>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="uploads/<?php echo $image3; ?>" alt="Norway" style="width:100%;height:250px" class="w3-hover-opacity">
      <div class="w3-container w3-white">
         <p><b><?php echo $subtopic3;   ?></b></p>
     <p><?php echo $subtopic3des;   ?></p>
      </div>
    </div>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="uploads/<?php echo $image4; ?>" alt="Norway" style="width:100%;height:250px" class="w3-hover-opacity">
      <div class="w3-container w3-white">
         <p><b><?php echo $subtopic4;   ?></b></p>
      <p><?php echo $subtopic4des;   ?></p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="uploads/<?php echo $image5; ?>" alt="Norway" style="width:100%;height:250px" class="w3-hover-opacity">
      <div class="w3-container w3-white">
         <p><b><?php echo $subtopic5;   ?></b></p>
       <p><?php echo $subtopic5des;   ?></p>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="uploads/<?php echo $image6; ?>" alt="Norway" style="width:100%;height:250px" class="w3-hover-opacity">
      <div class="w3-container w3-white">
         <p><b><?php echo $subtopic6;   ?></b></p>
       <p><?php echo $subtopic6des;   ?></p>
      </div>
    </div>
  </div>

 
  <div class="w3-container w3-padding-large" style="margin-bottom:32px">
    <div id="about" style="background-color:white; padding:20px">
        <h4><b>About our company</b></h4>
        <p><?php echo $about;   ?></p>
    </div>
    
    <div class="w3-row-padding w3-padding-16" id="about">
    <div class="w3-col m4 container">
      <img src="uploads/<?php echo $aboutimg1  ?>" alt="Me" style="width:100%" height="250px">
           <div class="overlay">
             <div class="text"><?php echo $aboutimg1info  ?></div>
           </div>
    </div>
        
    <div class="w3-col m4 container">
       <img src="uploads/<?php echo $aboutimg2  ?>" alt="Me" style="width:100%" height="250px">
           <div class="overlay">
             <div class="text"><?php echo $aboutimg2info  ?></div>
           </div>
    </div>
        
    <div class="w3-col m4 container">
      <img src="uploads/<?php echo $aboutimg3  ?>" alt="Me" style="width:100%" height="250px">
           <div class="overlay">
             <div class="text"><?php echo $aboutimg3info  ?></div>
          </div>
    </div>
    </div>

    <h4>Our Ratings</h4>
    
               <?php 
                if($totalCount==0){
                  $percentage=0;    
                }else{
                  $percentage=(int) ($totalRate /$totalCount)*20;
                } 
                ?>  
      
    <div class="w3-grey">
      <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:<?php echo $percentage; ?>%"><?php echo $percentage; ?>%</div>
    </div>
    <hr>
    
    <h4>How much <?php echo $salon;  ?> charge</h4>
    
    <div class="w3-row-padding" style="margin:0 -16px">
     <div id="service" class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-teal w3-xlarge w3-padding-32">We Offer You</li>
          <li class="w3-padding-16"><?php   
            
                $sql = "SELECT service,serviceId,salonId,amount
                        FROM services
                        WHERE status='1' " ;
                   
                $result= mysqli_query($conn, $sql);
                echo  "<table id = 'records'>"; 
                echo "<tr class='service'>";
                echo  "<th class='amount1'>Service Name</th>";
                echo  "<th class='amount'>Amount</th>";                      
                echo "</tr>";  

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                       if($row['salonId']==$salonId){

                $username =$row['serviceId'];

                echo "<tr class='service'><td 'amount1'>", $row['service'] , "</td>
                      <td class='amount'>" , $row['amount'] , "</td>
                       </tr>";
                        }
                     } 
                }else{
                echo "<tr><td> <br><span> Will Appear when you add services</span></td>
                      </tr>"; 
                } 
                echo "</table>"; ?></li>   
        </ul>    
      </div>
  </div>

  <div class="w3-container w3-padding-large w3-grey">
    <h4 id="contact"><b>Contact Me</b></h4>
    <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
      <div class="w3-third w3-dark-grey">
        <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
        <p><?php echo $email;?></p>
      </div>
      <div class="w3-third w3-teal">
        <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
        <p><?php echo $location1;?></p>
      </div>
      <div class="w3-third w3-dark-grey">
        <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
        <p><?php echo $m;?></p>
      </div>
      </div>
      <div style="width: 100%">
         <?php echo $map;?>
      </div>
    <hr class="w3-opacity">
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-32 w3-dark-grey">
  <div class="w3-row-padding">
  </div>
  </footer>
  
  <div class="w3-black w3-center w3-padding-24">Powered by <a title="W3.CSS" target="_blank" class="w3-hover-opacity">University of kelaniya</a></div>
 </div>
</div>    

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
    
</body>
</html>
