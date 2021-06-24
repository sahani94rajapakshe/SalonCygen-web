<?php
session_start();


$_SESSION["username"]=1;

require_once 'config.php';

$salonId=1;
$_SESSION['salonId']=$salonId;

$sql ="SELECT * FROM salon_info WHERE salonId=1";
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

$map=$row['googlemap'];

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

$image1=$row['image1'];
$image2=$row['image2'];
$image3=$row['image3'];
$image4=$row['image4'];
$image5=$row['image5'];
$image6=$row['image6'];


$mobile=$row['mobile'];
$footer=$row['fullAddress'];
$aboutimg1=$row['aboutimg1'];
$aboutimg2=$row['aboutimg2'];
$aboutimg3=$row['aboutimg3'];
$aboutimg1info=$row['aboutimg1info'];
$aboutimg2info=$row['aboutimg2info'];
$aboutimg3info=$row['aboutimg3info'];


}}}

$_SESSION['salon']= $salon;
$email=$_SESSION['email'];
$rating1=50;

?>


<!DOCTYPE html>
<html>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/cc.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="css/cc1.css">
<link rel="stylesheet" href="css/formcss.css">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
    
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
    
    <form method="POST" action="update_salon_data.php" enctype="multipart/form-data" onSubmit="return confirm('Are you sure you wish to the changes?');">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="uploads/<?php echo $image1; ?>" style="width:99%;" class="w3-round">
    <br><br>
    <h4><b><?php  echo $salon;  ?></b></h4>
    <input type="text" name ="location1" value= '<?php  echo $location1;?>' >  
      
  </div>
  <div class="w3-bar-block">
    <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i><?php  echo $salon;  ?></a> 
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
    <a href="../index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>HOME</a> </div>
  <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>

</nav>
    
    
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">



  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="Images/12-hair3.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><input type="text" name="name" value='<?php  echo $salon;?>'></h1>
    
    <div class="w3-section w3-bottombar w3-padding-16" style="background-color:ash"> 
    </div>
    </div>
  </header>
  
  <!-- First Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="uploads/<?php echo $image1; ?>" alt="Norway" style="width:100%;height:250px" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><input type="text" name="subtopic1" value='<?php  echo $subtopic1;?>'></p>
         <p><input type="text" name="subtopic1des" value='<?php  echo $subtopic1des;?>'></p>
      
       <input type="file" name="pic1">
      </div>
    </div>
      
      <div class="w3-third w3-container w3-margin-bottom">
      <img src="uploads/<?php echo $image2; ?>" alt="Norway" style="width:100%;height:250px" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><input type="text" name="subtopic2" value='<?php  echo $subtopic2;?>'></p>
         <p><input type="text" name="subtopic2des" value='<?php  echo $subtopic2des;?>'></p>
      
       <input type="file" name="pic2">
      </div>
    </div>
    
    <div class="w3-third w3-container">
      <img src="uploads/<?php echo $image3; ?>" alt="Norway" style="width:100%;height:250px" class="w3-hover-opacity">
      <div class="w3-container w3-white">
         <p><input type="text" name="subtopic3" value='<?php  echo $subtopic3;?>'></p>
       <p><input type="text" name="subtopic3des" value='<?php  echo $subtopic3des;?>'></p>
       <input type="file" name="pic3">
      </div>
    </div>
  </div>
  
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="uploads/<?php echo $image4; ?>" alt="Norway" style="width:100%;height:250px" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><input type="text" name="subtopic4" value='<?php  echo $subtopic4;?>'></p>
       <p><input type="text" name="subtopic4des" value='<?php  echo $subtopic4des;?>'></p>
       <input type="file" name="pic4">
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="uploads/<?php echo $image5; ?>" alt="Norway" style="width:100%;height:250px" class="w3-hover-opacity">
      <div class="w3-container w3-white">
         <p><input type="text" name="subtopic5" value='<?php  echo $subtopic5;?>'></p>
       <p><input type="text" name="subtopic5des" value='<?php  echo $subtopic5des;?>'></p>
       <input type="file" name="pic5">
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="uploads/<?php echo $image6; ?>" alt="Norway" style="width:100%;height:250px" class="w3-hover-opacity">
      <div class="w3-container w3-white">
         <p><input type="text" name="subtopic6" value='<?php  echo $subtopic6;?>'></p>
       <p><input type="text" name="subtopic6des" value='<?php  echo $subtopic6des;?>'></p>
       <input type="file" name="pic6">
      </div>
    </div>
  </div>


  <div class="w3-container w3-padding-large" style="margin-bottom:32px">
    <h4><b>About our company</b></h4>
    <textarea name="about" style="width: 100%; height:200px"><?php  echo $about;?></textarea>
    <hr>
    
    <div class="w3-row-padding w3-padding-16" id="about">
    <div class="w3-col m4 container">
      <img src="uploads/<?php echo $aboutimg1  ?>" alt="Me" style="width:100%" height="250px">
       <div class="overlay">
        <input type="file" name="aboutimg1">
    <div class="text"><input type="text" name="aboutimg1info" value='<?php echo $aboutimg1info  ?>'></div>
  </div>
    </div>
    <div class="w3-col m4 container">
      <img src="uploads/<?php echo $aboutimg2  ?>" alt="Me" style="width:100%" height="250px">
       <div class="overlay">
        <input type="file" name="aboutimg2">
    <div class="text"><input type="text" name="aboutimg2info" value='<?php echo $aboutimg2info  ?>'></div>
    
  </div>
    </div>
    <div class="w3-col m4 container">
      <img src="uploads/<?php echo $aboutimg3  ?>" alt="Me" style="width:100%" height="250px">
       <div class="overlay">
        <input type="file" name="aboutimg3">
    <div class="text"><input type="text" name="aboutimg3info" value='<?php echo $aboutimg3info  ?>'></div>
    
  </div>
    </div>
  </div>

    <h4>Our Ratings</h4>
    <!-- Progress bars / Skills -->
    <div class="w3-grey">
      <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:<?php echo $rating1; ?>%"><?php echo $rating1; ?>%</div>
    </div>
    <p>
    </p>   
  </div>
  
  <div class="w3-container w3-padding-large w3-grey">
    <h4 id="contact"><b>Contact Me</b></h4>
    <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
      <div class="w3-third w3-dark-grey">
        <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
         <p><input type="text" name="mobile" value='<?php  echo $mobile?>'></p>
      </div>
      <div class="w3-third w3-teal">
        <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
          <p><input type="text" name="location" value='<?php  echo $location1 ?>'></p>
      </div>
      <div class="w3-third w3-dark-grey">
        <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
         <p><input type="text" name="email" value='<?php  echo $email ?>'></p>
      </div>
    </div>
  
    <?php  
echo $map;
      ?>
      <h2>Instructions to Follow</h2>
      <ul>
          <li>Visit Google Map www.google.lk/maps/</li>
          <li>Select Your Live Location of your salon.</li>
          <li>Go to Share and use embeded to a map.</li>
          <li>Change The Size to Custom Size (1150*600)</li>
          <li>Copy the Html Code and paste it below.</li>
     </ul>  

    <input type="text" name="map" value='<?php echo $map ?>'>
    <hr class="w3-opacity">
    <input type="submit" name="submit" value="Save Changes" style="width:100%;">

<input type="hidden" name="image1" value="<?php echo $image1  ?>">
<input type="hidden" name="image2" value="<?php echo $image2  ?>">
<input type="hidden" name="image3" value="<?php echo $image3  ?>">
<input type="hidden" name="image4" value="<?php echo $image4  ?>">
<input type="hidden" name="image5" value="<?php echo $image5  ?>">
<input type="hidden" name="image6" value="<?php echo $image6  ?>">
<input type="hidden" name="image7" value="<?php echo $aboutimg1  ?>">
<input type="hidden" name="image8" value="<?php echo $aboutimg2  ?>">
<input type="hidden" name="image9" value="<?php echo $aboutimg3  ?>">
         </div> 
    </div>
  </form>
  

  <!-- Footer -->
  <footer class="w3-container w3-padding-32 w3-dark-grey">
  <div class="w3-row-padding">
    
  </div>
  </footer>


  
  <div class="w3-black w3-center w3-padding-24">Powered by <a title="W3.CSS" target="_blank" class="w3-hover-opacity">University of kelaniya</a></div>

<!-- End page content -->
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
