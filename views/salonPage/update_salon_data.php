<?php
session_start();

$salonId=$_SESSION['salonId'];

require_once 'config.php';

//$salonid=$_SESSION["username"];
//$salonId=$_POST['salonId'];
$salon=$_POST['name'];
$location1=$_POST['location1'];
$subtopic1=$_POST['subtopic1'];
$subtopic2=$_POST['subtopic2'];
$subtopic3=$_POST['subtopic3'];
$subtopic4=$_POST['subtopic4'];
$subtopic5=$_POST['subtopic5'];
$subtopic6=$_POST['subtopic6'];
$subtopic1des=$_POST['subtopic1des'];
$subtopic2des=$_POST['subtopic2des'];
$subtopic3des=$_POST['subtopic3des'];
$subtopic4des=$_POST['subtopic4des'];
$subtopic5des=$_POST['subtopic5des'];
$subtopic6des=$_POST['subtopic6des'];
//$imageprofile=$_POST['imageprofile'];
$image1=$_POST['image1'];
$image2=$_POST['image2'];
$image3=$_POST['image3'];
$image4=$_POST['image4'];
$image5=$_POST['image5'];
$image6=$_POST['image6'];
$image7=$_POST['image7'];
$image8=$_POST['image8'];
$image9=$_POST['image9'];
$aboutimg1info=$_POST['aboutimg1info'];
$aboutimg2info=$_POST['aboutimg2info'];
$aboutimg3info=$_POST['aboutimg3info'];
$map=$_POST['map'];

$about=$_POST['about'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];

echo $image7;

$name1 = $_FILES['pic1']['name'];  
$temp_name1  = $_FILES['pic1']['tmp_name'];  
if(isset($name1)){
   if(!empty($name1)){      
       $location = 'uploads/';      
              if(move_uploaded_file($temp_name1, $location.$name1)){
                    echo 'File uploaded successfully';
  }
       }  else {
       $name1=$image1;     
    }  
     }

$name2 = $_FILES['pic2']['name'];  
$temp_name2  = $_FILES['pic2']['tmp_name'];  
if(isset($name2)){
   if(!empty($name2)){      
       $location = 'uploads/';      
              if(move_uploaded_file($temp_name2, $location.$name2)){
                    echo 'File uploaded successfully';
  }
       }  else {
       $name2=$image2;     
           
    }  
     }

$name3 = $_FILES['pic3']['name'];  
$temp_name3  = $_FILES['pic3']['tmp_name'];  
if(isset($name3)){
   if(!empty($name3)){      
       $location = 'uploads/';      
              if(move_uploaded_file($temp_name3, $location.$name3)){
                    echo 'File uploaded successfully';
  }
       }else {
       $name3=$image3;       
    }  
     }

$name4 = $_FILES['pic4']['name'];  
$temp_name4  = $_FILES['pic4']['tmp_name'];  
if(isset($name4)){
   if(!empty($name4)){      
       $location = 'uploads/';      
              if(move_uploaded_file($temp_name4, $location.$name4)){
                    echo 'File uploaded successfully';
  }
       }else {
       $name4=$image4;       
    }  
     }


$name5 = $_FILES['pic5']['name'];  
$temp_name5  = $_FILES['pic5']['tmp_name'];  
if(isset($name5)){
   if(!empty($name5)){      
       $location = 'uploads/';      
              if(move_uploaded_file($temp_name5, $location.$name5)){
                    echo 'File uploaded successfully';
  }
       } else {
       $name5=$image5;      
    }  
     }

$name6 = $_FILES['pic6']['name'];  
$temp_name6  = $_FILES['pic6']['tmp_name'];  
if(isset($name6)){
   if(!empty($name6)){      
       $location = 'uploads/';      
              if(move_uploaded_file($temp_name6, $location.$name6)){
                    echo 'File uploaded successfully';
  }
       }
       else {
       $name6=$image6;
     }       
    } 

$name7 = $_FILES['aboutimg1']['name'];  
$temp_name7  = $_FILES['aboutimg1']['tmp_name'];  
if(isset($name7)){
   if(!empty($name7)){      
       $location = 'uploads/';      
              if(move_uploaded_file($temp_name7, $location.$name7)){
                    echo 'File uploaded successfully';
  }
       } else {
       $name7=$image7;      
    }  
     }


$name8 = $_FILES['aboutimg2']['name'];  
$temp_name8 = $_FILES['aboutimg2']['tmp_name'];  
if(isset($name8)){
   if(!empty($name8)){      
       $location = 'uploads/';      
              if(move_uploaded_file($temp_name8, $location.$name8)){
                    echo 'File uploaded successfully';
  }
       }
       else {
       $name8=$image8;
     }       
    } 

$name9 = $_FILES['aboutimg3']['name'];  
$temp_name9  = $_FILES['aboutimg3']['tmp_name'];  
if(isset($name9)){
   if(!empty($name9)){      
       $location = 'uploads/';      
              if(move_uploaded_file($temp_name9, $location.$name9)){
                    echo 'File uploaded successfully';
  }
       }
       else {
       $name9=$image9;
     }       
    } 

if($salonId==1){
    
 $sql = "INSERT INTO salon_info(salonName,location1, mobile, email,subtopic1, subtopic2, subtopic3, subtopic4, subtopic5, subtopic6,about, subtopic1Des, subtopic2Des, subtopic3Des, subtopic4Des, subtopic5Des, subtopic6Des, image1, image2, image3, image4, image5, image6, googlemap, aboutimg1, aboutimg2, aboutimg3, aboutimg1info, aboutimg2info, aboutimg3info) 
 VALUES ('$salon','$location1','$mobile','$email','$subtopic1','$subtopic2','$subtopic3','$subtopic4','$subtopic5','$subtopic6','$about','$subtopic1des','$subtopic2des','$subtopic3des','$subtopic4des','$subtopic5des','$subtopic6des','$name1','$name2','$name3','$name4','$name5','$name6','$map','$name7','$name8','$name9','$aboutimg1info','$aboutimg2info','$aboutimg3info')";
 
$result = mysqli_query($conn, $sql);
$_SESSION['email']=$email; 
header("Location:reTake.php");
   
//header("Location:../index.php");      
   
 
}else{
         
$sql="UPDATE salon_info SET salonName ='$salon',location1 = '$location1', mobile= '$mobile', email = '$email', subtopic1 = '$subtopic1', subtopic2 = '$subtopic2', subtopic3 ='$subtopic3', subtopic4 ='$subtopic4',subtopic5='$subtopic5',subtopic6='$subtopic6',about='$about',subtopic1Des='$subtopic1des',subtopic2Des='$subtopic2des',subtopic3Des='$subtopic3des',subtopic4Des='$subtopic4des',subtopic5Des='$subtopic5des',subtopic6Des='$subtopic6des',image1='$name1',image2='$name2',image3='$name3',image4='$name4',image5='$name5',image6='$name6',googlemap='$map',aboutimg1='$name7',aboutimg2='$name8',aboutimg3='$name9',aboutimg1info='$aboutimg1info',aboutimg2info='$aboutimg2info',aboutimg3info='$aboutimg3info'
WHERE salonId= $salonId ";    
    
//$result = mysqli_query($conn, $sql);
//header("Location:Salon-Admin1.php");

    
if ($conn->query($sql) === TRUE) {
        echo "<script>alert('changes saved.');</script>";
          $_SESSION['salonId']=$salonId;    
          header("Location:Salon-Admin1.php");
              
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }    
    
/*$_SESSION['salonId']=$salonId;    
header("Location:Salon-Admin1.php");*/
    
}

//$result = mysqli_query($conn, $sql);
//header("Location:Salon-Admin1.php");
?>