<?php

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

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SalonCygen &#8482;</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../assets/css/style.css"> 
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
                 <li class="nav-item active"><a href="../index.php" class="nav-link">Home</a></li>
                  
                 <li class="nav-item active"><a href="../login/login1/index.php" class="nav-link">Customer</a></li>        
                 <li class="nav-item active"><a href="../salonOwnerAccount/login/login1/index.php" class="nav-link">Salon Owner</a></li>  
                 <li class="nav-item active"><a href="../salonowner.php" class="nav-link">Admin</a></li>
                <?php
                }else if ($_SESSION['role']==2){
                    ?>
                <li class="nav-item active"><a href="../index.php" class="nav-link">Home</a></li>
                                <li class="nav-item active"><a href="../profile/profile.php" class="nav-link"><?php echo "$cusUsername";?></a></li>
                <li class="nav-item active"><a href="../logout/logout.php" class="nav-link">Sign out</a></li>
                <?php
                }else if ($_SESSION['role']==3){
                    ?>
                <li class="nav-item active"><a href="../index.php" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="../salonOwnerAccount/login/login1/index.php" class="nav-link">Salon Owner - <?php echo $_SESSION['salonUsername'];?></a></li>
                <li class="nav-item active"><a href="../logout/logout.php" class="nav-link">Sign out</a></li>
                <?php
                }else if ($_SESSION['role']==4){
                  ?>
                <li class="nav-item active"><a href="../index.php" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="../profile/profile.php" class="nav-link">Admin</a></li>
                <li class="nav-item active"><a href="../logout/logout.php" class="nav-link">Sign out</a></li>
                <?php  
                }
                ?>
            </ul>
	      </div>
	    </div>
	  </nav>
    </body>
</html>
      