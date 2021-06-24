<?php
session_start();

$cusUsername=$_SESSION['cusUsername'];
$cusEmail=$_SESSION['cusEmail'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SalonCygen &#8482;</title>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    
    <link rel="icon" href="favicon.png" sizes="16x16" type="image/png"><!--favicon-->

    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="../../assets/css/style.css">
    
    <style>
        .signup{
          
            padding-top: 100px;
            width: 1200px;
            padding-left: 320px;
        }
        
        .total{
            background-image: url(../../assets/images/Appointment.jpg);
        }
        
        .signup-image{
            padding-top: 80px;
        }
    </style>
      
</head>
<body>
    
<div class="total">    

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html"><span>SalonCygen</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="../index.php" class="nav-link">Home</a></li>
            </ul>
	      </div>
	   </div>
</nav>     

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form" >
                        <h2 class="form-title"><b> Create Account</b> </h2>
                        <form class="register-form" id="register-form" method="POST" action="sendDd.php" onSubmit="return confirm('Are you sure you wish to the changes?')";>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text"  name="cusUsername" required value="<?php echo $cusUsername?>" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email"  name="cusEmail" required value="<?php echo $cusEmail?>" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" required id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" required id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-city "></i></label>
                                <input type="text" placeholder =" Number" required name="homeNumber"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi "></i></label>
                                <input type="text" placeholder =" Street" name="street"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi "></i></label>
                                <input type="text" placeholder =" City" required name="city"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-phone-in-talk"></i></label>
                                <input type="number" placeholder =" number" required name="NUM" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account-calendar "></i></label>
                                <input type="date" placeholder =" Date of Birth" name="DOB" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi "></i></label>
                                <input type="radio" name="gender" id="male" value="Male">Male    
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi "></i></label>
                                <input type="radio" name="gender" id="female" value="Female">Female
                            </div>
                            
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree to Terms and Conditions </label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../../assets/images/salona8.jpg" alt="Create Account image">
                                
                        </figure>
                    </div>
                </div>
            </div>
        </section>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    
</div>    
</body>
</html>