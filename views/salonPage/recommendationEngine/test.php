
<?php
	$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "saloncygen";

        $conn = new mysqli($servername, $username, $password, $dbname);


        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

/*include ('../dbConnection/dbConnection.php');*/
include ('recommSimilarity.php');


$salons = mysqli_query($conn, " select * from  appoinment ");


$matrix=array();

while ($salon = mysqli_fetch_array($salons)) {
  # code...
$users = mysqli_query($conn, " select cusUsername from customers where cusId=$salon[cusId]");
$cusUsername = mysqli_fetch_array($users);
//img
/*$salonimg = mysqli_query($conn, " select image1 from salon_info where salonId=$salon[salonid]");
$Img = mysqli_fetch_array($salonimg);*/
//name
/*$salonname = mysqli_query($conn, " select salonName from salon_info where salonId=$salon[salonid]");
$name = mysqli_fetch_array($salonname);*/



$matrix[$cusUsername['cusUsername']][$salon['salonName']] = $salon['rated'];

}

$users = mysqli_query($conn, " select cusUsername from customers where cusId=$_GET[cusId]");
$cusUsername = mysqli_fetch_array($users);


?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Salon Cygen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">

    <link rel="stylesheet" href="../assets/css/aos.css">

    <link rel="stylesheet" href="../assets/css/ionicons.min.css">

    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../assets/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../assets/css/flaticon.css">
    <link rel="stylesheet" href="../assets/css/icomoon.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
      <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href=../"css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">
      
    
      
  </head>
  <body>
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
         <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
         <li class="nav-item active"><a href="login/login1/index.php" class="nav-link">Customer</a></li>        
         <li class="nav-item active"><a href="salonOwnerAccount/login/login1/index.php" class="nav-link">Salon Owner</a></li>  
         <li class="nav-item active"><a href="admin/login/login1/index.php" class="nav-link">Admin</a></li>
                <?php
                }else if ($_SESSION['role']==2){
                    ?>
                <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="profile/profile.php" class="nav-link"><?php echo "$cusUsername";?></a></li>
                <li class="nav-item active"><a href="salonOwnerAccount/login/login1/index.php" class="nav-link">Sign out</a></li>
                <?php
                }else if ($_SESSION['role']==3){
                    ?>
                <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="salonOwnerAccount/login/login1/index.php" class="nav-link">Salon Owner</a></li>
                <li class="nav-item active"><a href="salonOwnerAccount/login/login1/index.php" class="nav-link">Sign out</a></li>
                <?php
                }else if ($_SESSION['role']==4){
                  ?>
                <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="profile/profile.php" class="nav-link">Admin</a></li>
                <li class="nav-item active"><a href="salonOwnerAccount/login/login1/index.php" class="nav-link">Sign out</a></li>
                <?php  
                }
                ?>
            </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
      
      

    
    <div class="hero-wrap js-fullheight" style="background-image: url('../assets/images/Background2.jpg');" data-stellar-background-ratio="0.5">
        
      <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> SALONCYGEN</h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Where beauty meets Quality</p>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-no-pt">
    	<div class="container">
	    	<div class="row">
					<div class="col-md-12">
						<div class="search-wrap-1 ftco-animate p-4">
              <!-- Search form -->
               <form action="./salonPage/salonListView/page_list_result.php"  class="search-property-1" method = "POST" enctype="multipart/form-data"> 
		        		<div class="row">
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#"></label> 
		          				<div class="form-field">
		          					<div class="icon"><span class="ion-ios-search"></span></div>
                         <input type="text" name ="search" class="form-control" placeholder="Search place">
				              </div>
			              </div>
		        			</div>
		        			<!-- <div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">Date</label>
		        					<div class="form-field">
		          					<div class="icon"><span class="ion-ios-calendar"></span></div>
				                <input type="text" class="form-control checkin_date" placeholder="Check In Date">
				              </div>
			              </div>
		        			</div> -->
		        		<!-- 	<div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">Time</label>
		        					<div class="form-field">
		          					<div class="icon"><span class="ion-ios-calendar"></span></div>
				                <input type="text" class="form-control checkout_date" placeholder="Check Out Date">
				              </div>
			              </div>
		        			</div>
		        			 -->
		        			<div class="col-lg align-self-end">
		        				<div class="form-group">
		        					<div class="form-field">
				                <input type="submit" value="Search" class="form-control btn btn-primary" name = "submit-search">
				              </div>
			              </div>
		        			</div>
		        		</div>
                     
                        
		        	</form>
		        </div>
                </div>
	    	</div>
        </div>    
    </section>


    <!-- Submit search for city -->

<!-- //Submit search for city -->

<!-- Rated salons -->
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Dream Salon For You</h2>
            
          </div>
        </div>
        



<div class="SalonList-container" id="salonList">
 <table width="100%" cellspacing="0" cellpadding="2" border="0" style="overflow: wrap"> 
 <tr> 
<?php  
      while ($salonList = $result->fetch_assoc()):
      $image1=$salonList['image1']; 
    ?>



        <div class="row" >
        <!-- first card -->
        <td  >
          <div class="col-md-6 col-lg-3 ftco-animate" >


            <div class="project" style="width:250px;">
              <div class="img">

               <!--  <img src="./salonPage/images/beauty2.jpg" class="img-fluid" alt="Colorlib Template">  -->
                <img src="./salonPage/uploads/<?php echo $image1 ?>" alt="Me" height="400"> 
              </div>
              <div class="text">
              <!-- Salon name -->
                <h4 class="price"> <?= $salonList['salonName'] ?></h4>
                 
                <h3 style="font-size: 14px;"><?= $salonList['location1'] ?></h3>

                <?php  $pos=strpos($salonList['about'], ' ', 32); ?>
                 <span style="font-size: 10px; color: #C6C2C1; "><?php echo substr($salonList['about'],0,$pos ); ?>...</span> 
                <div class="star d-flex clearfix">
                  <div class="mr-auto float-left">
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                  </div>
                  <div class="float-right">
                    <!-- <span class="rate"><a href="#">(120)</a></span> -->

                    <form method="POST" action="./salonPage/index.php">
          <input type="hidden" name="salonId" value=" <?= $salonList['salonId'] ?>">
          <input name="salonInfo" type="submit" value="More" >

          <style> 
              input[type=submit] {

                background-color: #1569C7; /* Green */
                border: none;
                color: white;
                height: 30px;
                padding: 3px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 14px;
                border-radius: 5px;
                }
                </style>
           </form>
                  </div>
                </div>
              </div>
               <a href="./salonPage/uploads/<?php echo $image1 ?>" class="icon image-popup d-flex justify-content-center align-items-center">
                <span class="icon-expand"></span>
              </a> 
             </div>
          </div>
<!-- //first card -->
           
         </td>  
          
        </div>
        <?php endwhile; ?>
          </tr>
        </table> 
        
      </div>

    </section>
<!-- //Ratedsalons -->
   
 <!-- Recommendation salons -->
    <section class="ftco-section" >
        
        <!-- <button onclick="window.location.href='salonOwnerAccount/login/login1/index.php'">Continue</button> -->
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Recommendations For You</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="project">
              <div class="img">
                <img src="images/destination-1.jpg" class="img-fluid" alt="Colorlib Template">
              </div>
              <div class="text">
                <h4 class="price"> Wev should load salons from here</h4>
                <span>15 Days Tour</span>
                <h3><a href="project.html">Gurtnellen, Swetzerland</a></h3>
                <div class="star d-flex clearfix">
                  <div class="mr-auto float-left">
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                  </div>
                  <div class="float-right">
                    <span class="rate"><a href="#">(120)</a></span>
                  </div>
                </div>
              </div>
              <a href="images/destination-1.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                <span class="icon-expand"></span>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="project">
              <div class="img">
                <img src="images/destination-2.jpg" class="img-fluid" alt="Colorlib Template">
              </div>
              <div class="text">
                <h4 class="price">$400</h4>
                <span>15 Days Tour</span>
                <h3><a href="project.html">Gurtnellen, Swetzerland</a></h3>
                <div class="star d-flex clearfix">
                  <div class="mr-auto float-left">
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                  </div>
                  <div class="float-right">
                    <span class="rate"><a href="#">(120)</a></span>
                  </div>
                </div>
              </div>
              <a href="images/destination-2.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                <span class="icon-expand"></span>
              </a>
            </div>
          </div>
          
          
        </div>
        
      </div>
    </section>
<!-- //recommendation salons -->   
   

    <footer class="ftco-footer ftco-footer-2 ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Traveland</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Infromation</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Online Enquiry</a></li>
                <li><a href="#" class="py-2 d-block">General Enquiries</a></li>
                <li><a href="#" class="py-2 d-block">Booking Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
                <li><a href="#" class="py-2 d-block">Refund Policy</a></li>
                <li><a href="#" class="py-2 d-block">Call Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Experience</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Adventure</a></li>
                <li><a href="#" class="py-2 d-block">Hotel and Restaurant</a></li>
                <li><a href="#" class="py-2 d-block">Beach</a></li>
                <li><a href="#" class="py-2 d-block">Nature</a></li>
                <li><a href="#" class="py-2 d-block">Camping</a></li>
                <li><a href="#" class="py-2 d-block">Party</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery.easing.1.3.js"></script>
  <script src="../assets/js/jquery.waypoints.min.js"></script>
  <script src="../assets/js/jquery.stellar.min.js"></script>
  <script src="../assets/js/owl.carousel.min.js"></script>
  <script src="../assets/js/jquery.magnific-popup.min.js"></script>
  <script src="../assets/js/aos.js"></script>
  <script src="../assets/js/jquery.animateNumber.min.js"></script>
  <script src="../assets/js/bootstrap-datepicker.js"></script>
  <script src="../assets/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../assets/js/google-map.js"></script>
  <script src="../assets/js/main.js"></script>

  </body>
</html>