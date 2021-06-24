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
              width: 1000px;
              z-index: 15;
              top: 30%;
              left:450px;
              margin-top:30px; 
}
    
.discount{
              position: absolute;
              width: 1000px;
              height: 100px;
              z-index: 15;
              background-color: steelblue;    
             /* background-color: skyblue;*/
              margin: -100px 0 0 -150px;
}
        
.discounttext{
            font-weight: 900;
            color: navy;
            font-size: 35px;
            align-content: center;
            padding-left: 350px;
}
        
.form{
            padding-top: 25px;
            padding-left: 30px;
            width: 400px;
            height: 300px;
            margin-left: 250px;
}
    
.form1{
            padding-top: 1px;
            width: 400px;
}
    
.form2{
            padding-top: 5px;
            width: 300px;    
}
        
.text1{
            padding-left: 10px;
            height: 50px;
            padding-right: 10px;
            background-color: honeydew;
}
        
    
.button{
            padding-left: 30px;
            padding-right: 50px;
            font-size: 20px;
            background-color:#0a7a95 ;
            /*background-color:#008080 steelblue;*/
            border:none;
            border-radius: 6px;
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
    
    
#records {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 80%;
            margin-left: 10%;
            margin-top: 40px;
}
    
#records td{
            border: 1px solid #ddd;
            padding: 8px;
            background-color: honeydew;
}
    
#records th{
            border: 1px solid #ddd;
            padding: 8px;
            background-color: cadetblue;
            background-color: cadetblue;
}    

#records tr:hover {background-color: #ddd;}
#records th {
            padding-top: 12px;
            padding-bottom: 12px;
            color: black;
}
    
body{
            background-color: #f2f2f2;
}

.current{
            margin-left: 400px;
            font-weight: 800;
            margin-top:  60px;
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
          <p class="discounttext">Add Your Employees</p>
             
          <form action="addEmployeeDb.php" method="POST" class="form">
              <div class="form2">
                 <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
              </div>
            <div class="form1">
                 <input class="text1" type="text"  name="employeeUsername" required placeholder="Employee Name" />
            </div>
            <div class="form2">
                 <label for="email"><i class="zmdi zmdi-email"></i></label>                 
            </div>
            <div class="form1">
                 <input class="text1" style=" width:400px;" type="email"  name="employeeEmail" required placeholder="Employee Email" />
            </div>
            <div class="form1">
                 <input type="submit" name="submit" id="submit" class="button" style=" margin-top:30px; background-color:steelblue; padding-left:-20px;" value=" Add"/>
            </div>
          </form>
                    
       <div class="hh" style="height:10px; background-color:#4d414a;"></div> 
       <div class="hh" style="height:20px;"></div>           
            
         <?php   
            
        $sql = "SELECT employeeName,employeeEmail,salonId,employeeId
                FROM employee
                WHERE status='1' " ;
                    echo "<br>";
                    echo "<span class='current'>Current Employees</span>";
                    echo "<br>";
                $result= mysqli_query($conn, $sql);
                echo  "<table id = 'records'>"; 
                echo "<tr>";
                      echo  "<th>Employee Name</th>";
                      echo  "<th>Employee Email</th>";
                      echo  "<th>Status</th>";
            
                  echo "</tr>";  

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                       if($row['salonId']==$salonId){
                            $username =$row['employeeId'];
                            echo "<tr><td>", $row['employeeName'] , "</td>
                            <td>" , $row['employeeEmail'] , "</td>
                            <td><form action = 'viewAddEmployee.php' method = 'post'>
                            <input type = 'hidden' name = 'username' value = ", $username, ">
                            <input type = 'submit' value = 'Unlist' style= 'background-color:steelblue;'>
                            </form></td>
                           </tr>";
                        }
                    }  
                }else{
                        echo "<tr><td> <span> No Employees</span></td>
                        <td><span> No Employees</span></td>
                        <td><span>No Services</span></td>
                        <td><span>No Services</span></td>
                        </tr>"; 
                } 
                        echo "</table>";
?>        
            
        <div style="height:60px;"></div>        
        <div class="hh" style="height:10px; background-color:#4d414a;"></div> 
        <div class="hh" style="height:20px;"></div> 
        
        <?php   
            
        $sql = "SELECT employeeName,employeeEmail,salonId,employeeId
                FROM employee
                WHERE status='0' " ;
                      echo "<br>";
                      echo "<span class='current'> Restore Employees</span>";
                      echo "<br>";
                      $result= mysqli_query($conn, $sql);
                      echo  "<table id = 'records'>"; 
                      echo "<tr>";
                      echo  "<th>Employee Name</th>";
                      echo  "<th>Employee Email</th>";
                      echo  "<th>Status</th>";
                      echo  "<th>Remove </th>";
                      echo "</tr>";  

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                       if($row['salonId']==$salonId){
                         $username =$row['employeeId'];
                            echo "<tr><td>", $row['employeeName'] , "</td>
                            <td>" , $row['employeeEmail'] , "</td>
                            <td><form action = 'viewAddEmployee2.php' method = 'post'>
                            <input type = 'hidden' name = 'username' value = ", $username, ">
                            <input type = 'submit' value = 'Add' style= 'background-color:steelblue;'>
                            </form>
                            </td>
                            <td><form action = 'viewAddEmployee3.php' method = 'post'>
                            <input type = 'hidden' name = 'username' value = ", $username, ">
                            <input type = 'submit' value = 'Remove' style= 'background-color:steelblue;'>
                            </form>
                            </td>
                            </tr>";
                        }
                    }   
                }else{
                            echo "<tr><td> <span> No Employees</span></td>
                            <td><span> No Employees</span></td>
                            <td><span>No Services</span></td>
                            <td><span>No Services</span></td>
                            </tr>"; 
                } 
               echo "</table>";
?>                 
        <div style="height:60px;"></div>    
    </div>
</div>         
</body>
</html>