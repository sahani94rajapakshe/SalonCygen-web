<?php
session_start();
if(isset($_SESSION['cusUsername'])) {    
    $role=$_SESSION['role'];
    $cusUsername=$_SESSION['cusUsername'];    
}else if(isset($_SESSION['salonUsername'])){
    $role=$_SESSION['role'];
    $salonUsername=$_SESSION['salonUsername'];
}else{   
    $_SESSION['cusUsername'] ="";
    $_SESSION['role']=1;  
}


/*$cusEmail=$_SESSION['cusEmail'];*/
  //DB connection
include ('../config.php');



      
      $sql = " SELECT * FROM salon_info where not salonId= 1 ORDER BY rand()";
      $result = mysqli_query($conn , $sql);
      $queryResults = mysqli_num_rows($result);

   

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <title>SalonCygen</title>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../assets/css/style.css">  
    <link rel="stylesheet" href="css/style.css">    
      <link rel="stylesheet" href="../../../assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/animate.css">
    
    <link rel="stylesheet" href="../../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../../assets/css/magnific-popup.css">

    <link rel="stylesheet" href="../../../assets/css/aos.css">

    <link rel="stylesheet" href="../../../assets/css/ionicons.min.css">

    <link rel="stylesheet" href="../../../assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../../../assets/css/jquery.timepicker.css">
<link rel="icon" href="favicon.png" sizes="16x16" type="image/png">
<!--favicon===============================================================================================-->
    
    <link rel="stylesheet" href="../../../assets/css/flaticon.css">
    <link rel="stylesheet" href="../../../assets/css/icomoon.css">
  </head>

  
  <body >
      

 <style>
body {
  background-image: url("./images/salon8.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
}
</style> 


 <div class="main-container">
     
     <!-- css cange needed -->
     
     <div id="header">
       <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html"><span>SalonCygen</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
                <?php
                if ($_SESSION['role']==1){
                    ?>
                 <li class="nav-item active"><a href="../../index.php" class="nav-link">Home</a></li>
                  
                 <li class="nav-item active"><a href="../../login/login1/index.php" class="nav-link">Customer</a></li>        
                 <li class="nav-item active"><a href="../../salonOwnerAccount/login/login1/index.php" class="nav-link">Salon Owner</a></li>  
                 <li class="nav-item active"><a href="../../salonowner.php" class="nav-link">Admin</a></li>
                <?php
                }else if ($_SESSION['role']==2){
                    ?>
                <li class="nav-item active"><a href="../../index.php" class="nav-link">Home</a></li>
                
                <li class="nav-item active"><a href="../../profile/profile.php" class="nav-link"><?php echo "$cusUsername";?></a></li>
                <li class="nav-item active"><a href="../../logout/logout.php" class="nav-link">Sign out</a></li>
                <?php
                }else if ($_SESSION['role']==3){
                    ?>
                <li class="nav-item active"><a href="../../index.php" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="../../salonOwnerAccount/login/login1/index.php" class="nav-link">Salon Owner - <?php echo $_SESSION['salonUsername'];?></a></li>
                <li class="nav-item active"><a href="../../logout/logout.php" class="nav-link">Sign out</a></li>
                <?php
                }else if ($_SESSION['role']==4){
                  ?>
                <li class="nav-item active"><a href="../../index.php" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="../../profile/profile.php" class="nav-link">Admin</a></li>
                <li class="nav-item active"><a href="../../logout/logout.php" class="nav-link">Sign out</a></li>
                <?php  
                }
                ?>
            </ul>
        </div>
      </div>
    </nav>
    </div>  
     
     
     
    <?php  
      while ($salonList = $result->fetch_assoc()): 
         /*$salonId==$salonList['salonId'];
        
          if($salonId==1){


          }else{*/
             ?>

             <div class='salon-container'>
        <div class='content'><!-- Detail  -->
          <div class='left-column'><!-- Image and ratings -->
             <?php $image1 = $salonList['image1']; ?> 
              <img class='imgid'  src="../uploads//<?php echo $image1; ?>">
        <!--    <img class='imgid' src='./images/salonimage2.jpg' >  -->
            <div id='rateView'>
                
                <?php $totalRate = $salonList['totalRate'];
                      $totalCount = $salonList['totalCount'];
                    if($totalCount==0){
                      $percentage=0;    
                    }else{
                      $percentage=(int) ($totalRate /$totalCount)*2;
                    }
                    
                    ?> 

              <div id='rateid' class='rates'><?php echo $percentage;echo ".0";?></div>
             <div id= 'viewid' class='views'><?= $salonList['totalCount'] ?> Rated</div>
            </div>
          </div>
          <div class="right-column">
          <span class="content name">
            <!-- <div class='header'> --><!-- Salon Name -->
              <h3><?= $salonList['salonName'] ?></h3>
            <!-- </div> -->
          </span>
          <?php echo $salonList['salonName'] ? '' : ''?><!-- Only print the SPACE not hte salon name -->
          <span class="content star">
            
            <div class="mr-auto float-left">
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                  </div>
          </span>

          <div class="content details">
            <span class="content city">
            <!-- <div class='header'> --><!-- Salon Name -->
              <?= $salonList['location1'] ?>
            <!-- </div> -->
          </span>
          <?php echo $salonList['location1'] ? ' |' : ''?><!-- Only print the SPACE not hte salon name -->

          <!-- <span class="content map">
            <a href="">Show on a map</a>
          </span> -->
          </div>
          <div class="content description" style="font-size: 13px;"><?= $salonList['about'] ?></div>
         <!--  <div class="button"><a href = '#'>See availability</a></div> -->
        
         <div>
          
          <form method="POST" action="takeSalonId.php" style="margin-top:1px">
          <input type="hidden" name="salonId" value=" <?= $salonList['salonId'] ?>">
          <input name="salonInfo" type="submit" value="Salon Info"  >

          <style> 
              input[type=submit] {

                background-color: #1569C7; /* Green */
                border: none;
                color: white;
                line-height: 10px;
                padding: 10px 25px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 13px;
                border-radius: 10px;
                }
                </style>
           </form>
         </div>
          
          </div>
        </div>
      </div>
     
     
    

  </div>
              
              
   

     
  <?php 
  /* }
*/
  endwhile; 
  ?>
      
  </body>
  </html>
