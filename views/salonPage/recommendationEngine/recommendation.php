
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
/*
$salonlo = mysqli_query($conn, " select location from salon_info where salonId=$salon[salonid]");
$location = mysqli_fetch_array($salonlo);*/

/*var_dump (getRecommendation($matrix, "sahani sineka"));
var_dump (getRecommendation($matrix, "Sithara Nishadini"));
var_dump (getRecommendation($matrix, "Kalana Maleesha"));*/
/*var_dump (getRecommendation($matrix, $cusUsername['cusUsername']));*/

/*$sql = mysqli_query($conn, " select * from  salon_info ");
$result = mysqli_query($conn , $sql);
$queryResults = mysqli_num_rows($result);*/



 ?>


 <!DOCTYPE html>
<html lang="en">
   <head>
    <title>Salon Cygen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/animate.css">
    
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./assets/css/magnific-popup.css">

    <link rel="stylesheet" href="./assets/css/aos.css">

    <link rel="stylesheet" href="./assets/css/ionicons.min.css">

    <link rel="stylesheet" href="./assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="./assets/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="./assets/css/flaticon.css">
    <link rel="stylesheet" href="./assets/css/icomoon.css">
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

  
  <body >



<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Recommended Salon For You</h2>
            
          </div>
        </div>

<div class="SalonList-container" id="salonList">
 <table width="100%" cellspacing="0" cellpadding="2" border="0" style="overflow: wrap"> 
 <tr> 
    <?php  

      /*while ($salonList = $result->fetch_assoc()): */

    $rec = array();
    $rec = getRecommendation($matrix, $cusUsername['cusUsername']);

    foreach ($rec as $salonName => $ratings) {
  
    ?>



  
     

<?php 

$sql ="SELECT * FROM salon_info WHERE salonName= '$salonName'";
if($result = mysqli_query($conn, $sql)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){

$id = $row['salonId'];
 $image1=$row['image1']; 
$salonname=$row['salonName'];
$location1=$row['location1'];
$about=$row['about'];

?>

 <div class="row" >
        <!-- first card -->
        <td  >
          <div class="col-md-6 col-lg-3 ftco-animate" >


            <div class="project" style="width:250px;">
              <div class="img">

               <!--  <img src="./salonPage/images/beauty2.jpg" class="img-fluid" alt="Colorlib Template">  -->
                <img src="../uploads/<?php echo $image1 ?>" alt="Me" height="400"> 
              </div>
              <div class="text">
              <!-- Salon name -->
                <h4 class="price"> <?php echo $salonname ?></h4>
                 
                <h3 style="font-size: 14px;"><?php echo $location1 ?></h3>

                <?php  $pos=strpos($about, ' ', 32); ?>
                 <span style="font-size: 10px; color: #C6C2C1; "><?php echo substr($about,0,$pos ); ?>...</span> 
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
          <input type="hidden" name="salonId" value=" <?php echo$id  ?>">
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


    
<?php 
}}}
       }
  ?>
 </tr>
        </table> 
        
      </div>
      </div>
 </section>

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
