<?php
session_start();

/*session_start();
$cusEmail=$_SESSION['cusEmail'];*/
  //DB connection
include ('../dbConnection/dbConnection.php');
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "saloncygen";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
/*if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }*/


  if(isset($_POST['search_SalonId']))
  {
    $id = $_POST['SalonId'];
    $salonname= $_POST['SalonName'];
    $location = $_POST['Location'];

    /*  $valueToSearch =  $_POST['search_SalonId'];*/
    if($id != "" ||  $salonname != "" || $location != ""){
     $valueToSearch = mysqli_real_escape_string ($conn, $_POST['SalonId']);
$query = "SELECT * FROM salon_info 
WHERE salonId ='$id' OR salonName='$salonname' OR location1 ='$location'";
     $search_result = filterTable($query);
   }else{
    $query = "select 1 from dual where false";
     $search_result = filterTable($query);

   }

 }elseif (isset($_POST['btnAllsalons'])) {
    # code...
  $query = "SELECT * FROM salon_info  ";
  $search_result = filterTable($query);
}
else {
  $query = "select 1 from dual where false";
  $search_result = filterTable($query);
  /*echo "no results";*/
}


// function to connect and execute the query
function filterTable($query)
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "saloncygen";

  $conn = mysqli_connect($servername, $username, $password, $database);
  $filter_Result = mysqli_query($conn, $query);
  return $filter_Result;
} 




?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin</title>

	
	<!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="assets/css/components.min.css" rel="stylesheet" type="text/css"> -->
  <link href="assets/css/components_original.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
  <link href="global_assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
  <link href="global_assets/css/extras/animate.min.css" rel="stylesheet" type="text/css">
  
  
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script src="global_assets/js/main/jquery.min.js"></script>
  <script src="global_assets/js/main/bootstrap.bundle.min.js"></script>
  <script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script src="global_assets/js/plugins/visualization/d3/d3.min.js"></script>
  <script src="global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
  <script src="global_assets/js/plugins/forms/styling/switchery.min.js"></script>
  <script src="global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
  <script src="global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="global_assets/js/plugins/visualization/d3/d3.min.js"></script>
  <script src="global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>

  <script src="assets/js/app.js"></script>
  <script src="global_assets/js/demo_pages/dashboard.js"></script>
  <script src="global_assets/js/demo_pages/datatables_basic.js"></script>
  <script src="global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="global_assets/js/demo_pages/widgets_stats.js"></script>
    
  <!-- /theme JS files -->
    <!-- Theme JS files -->
  <script src="global_assets/js/plugins/visualization/d3/d3.min.js"></script>
  <script src="global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>

  <script src="assets/js/app.js"></script>
  <script src="global_assets/js/demo_pages/widgets_stats.js"></script>
  <!-- /theme JS files -->
    <!-- Theme JS files -->
  <script src="global_assets/js/plugins/visualization/echarts/echarts.min.js"></script>

  <script src="assets/js/app.js"></script>
  <script src="global_assets/js/demo_pages/charts/echarts/bars_tornados.js"></script>
  <!-- /theme JS files -->
    <!-- Theme JS files -->
  <script src="global_assets/js/plugins/visualization/echarts/echarts.min.js"></script>

  <script src="assets/js/app.js"></script>
  <script src="global_assets/js/demo_pages/charts/echarts/pies_donuts.js"></script>
  <!-- /theme JS files -->
    <!-- Theme JS files -->
  <script src="global_assets/js/plugins/visualization/echarts/echarts.min.js"></script>

  <script src="assets/js/app.js"></script>
  <script src="global_assets/js/demo_pages/charts/echarts/columns_waterfalls.js"></script>
  <!-- /theme JS files -->
    <!-- Theme JS files -->
  <script src="global_assets/js/plugins/ui/moment/moment.min.js"></script>
  <script src="global_assets/js/plugins/pickers/daterangepicker.js"></script>
  <script src="global_assets/js/plugins/pickers/anytime.min.js"></script>
  <script src="global_assets/js/plugins/pickers/pickadate/picker.js"></script>
  <script src="global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
  <script src="global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
  <script src="global_assets/js/plugins/pickers/pickadate/legacy.js"></script>
  <script src="global_assets/js/plugins/notifications/jgrowl.min.js"></script>

  <!-- /theme JS files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"> </script>
  <script src="global_assets/js/plugins/pagination/bs_pagination.min.js"></script>
  <script src="global_assets/js/demo_pages/components_pagination.js"></script>

  <script src="global_assets/js/demo_pages/picker_date.js"></script>
    <script src="global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
  <script src="global_assets/js/plugins/forms/selects/select2.min.js"></script>

  <script src="global_assets/js/demo_pages/form_select2.js"></script>
  
  <script src="global_assets/js/plugins/forms/styling/uniform.min.js"></script>
  <script src="global_assets/js/plugins/forms/styling/switchery.min.js"></script>
  <script src="global_assets/js/plugins/forms/styling/switch.min.js"></script>
  <script src="global_assets/js/demo_pages/form_checkboxes_radios.js"></script>

</head>
<body class="sidebar-xs sidebar-secondary-hidden">

  <!-- Main navbar -->
  <div class="navbar navbar-expand-md navbar-dark">
    <!-- BEET Logo -->
    <div class="navbar-brand">
      <h3>Salon Cygen</h3>
    </div>
    <!-- /BEET Logo -->
    <div class="d-md-none">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
        <i class="icon-tree5"></i>
      </button>
      <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
        <i class="icon-paragraph-justify3"></i>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
      <ul class="navbar-nav">

      </ul>

      <!-- Show the logged user -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown dropdown-user">
          <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
            <img src="global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
            <span>  </span><br> 

          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="../index.php" class="dropdown-item"><i class="icon-home2 mr-2"></i> Home</a>
            <a href="Login_page.jsp" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
          </div>
        </li>
      </ul>
      <!-- /Show the logged user -->
    </div>
  </div>
  <!-- /main navbar -->



  <div class="main-container">


   <div class="page-container">

    <!-- Page content -->
    <div class="adminpage-content">


    	<!-- Main content -->
    	<div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

         <!-- Dashboard content -->
         <div class="row">
          <div class="col-xl-12">
           <div class="row">
            <div class="col-xl-12"  style="border: 1px; border-style:none; ">
             <div class="card">
              <div class="card-header header-elements-inline">
               <h5 class="card-title">Search</h5>

             </div>
             <div class="card-body"> 
               <form  id="idForm2" action="" method="post">


                <div class="row">

                  <div class="col-sm-2">  
                    <input type="text" class="form-control" placeholder="Salon Id" name="SalonId" id="search_SalonId" >
                  </div>

                  <div class="col-sm-4">  
                    <input type="text" class="form-control" placeholder="Salon Name" name="SalonName" id="search_SalonName" >
                  </div>


                  <div class="col-sm-2">

                    <select name="Location" data-placeholder="--Select Location--" class="form-control select" data-fouc name="search_Location" id="search_locationId" >
                     <option></option>		
                     <option value="Ampara">Ampara</option>
                     <option value="Anuradhapura">Anuradhapura</option>
                     <option value="Badulla">Badulla</option>
                     <option value="Batticaloa">Batticaloa</option>
                     <option value="Colombo">Colombo</option>
                     <option value="Galle">Galle</option>
                     <option value="Gampaha">Gampaha</option>							
                     <option value="Hambantota">Hambantota</option>
                     <option value="Jaffna">Jaffna</option>
                     <option value="Kalutara">Kalutara</option>
                     <option value="Kandy">Kandy</option>
                     <option value="Kegalle">Kegalle</option>
                     <option value="Kilinochchi">Kilinochchi</option>
                     <option value="Kurunegala">Kurunegala</option>
                     <option value="Mannar">Mannar</option>
                     <option value="Matale">Matale</option>
                     <option value="Matara">Matara</option>
                     <option value="Monaragala">Monaragala</option>
                     <option value="Mullaitivu">Mullaitivu</option>
                     <option value="Nuwara Eliya">Nuwara Eliya</option>
                     <option value="Polonnaruwa">Polonnaruwa</option>
                     <option value="Puttalam">Puttalam</option>
                     <option value="Ratnapura">Ratnapura</option>
                     <option value="Trincomalee">Trincomalee</option>
                     <option value="Vavuniya">Vavuniya</option>
                     

                   </select>

                 </div>
                 <div class="col-sm-4 text-center" >
                   <button type="submit" id="btnAllsalons" name="btnAllsalons" class="btn btn-outline alpha-success text-success-800 border-success-600 " >Display All Salons</button>

                   <button type="submit" class="btn btn-outline-primary btn-lg icon-search4" value="search" id="search_SalonId" name="search_SalonId" style="padding:5px 25px; font-size: 18px;  float: right;"> search	</button>

                 </div>


               </div>
             </form>
           </div>
         </div>
       </div>

     </div>



     <div class="card">
      <div class="card-header header-elements-inline">
       <h5 class="card-title">Salons</h5>

     </div>					

     <div class="card-body">



       <table class="table datatable-basic" id="mytable"> 
        <thead>
         <tr>
          <!-- <th>No</th> -->
          <th>Salon Id</th>
          <th>Salon Name</th>
          <!-- <th>Owner Name</th> -->
          <th>Email</th>
          <th>Location</th>
          <th>Total  Rate</th>
          <th>View</th>
          <th>Action</th>

        </tr>
      </thead>

      <tbody id="mytbody">




       <?php while($row = mysqli_fetch_array($search_result)):?>
        <tr>
         <!-- <td><?php echo $row['id'];?></td> -->
         <td><?php echo $row['salonId'];?></td>
         <td><?php echo $row['salonName'];?></td>
         <!-- <td><?php echo $row['id'];?></td> -->
         <td><?php echo $row['email'];?></td>
         <td><?php echo $row['location1'];?></td>					
         <td><?php echo $row['totalRate'];?></td>


                  <!--  <form method="POST" action="takeSalonId.php" >
                   <td><input type="text" name="salonId" value="<?php echo $row['salonId'];?>">
                     <input name="salonInfo" type="submit" value="Salon Info"  ></td> </form> -->

                     <form method="POST" action="takeSalonId.php" >
                       <td>
                         <input type="hidden" name="salonId" value=" <?php echo $row['salonId'];?>">
                         <button type="submit" class=" btn_view btn bg-teal-400 btn-labeled btn-labeled-left rounded-round" data-toggle="modal" data-target="#modal_default" id="btn_view" ><b><i class="icon-eye2"></i></b>View</button></td>
                       </form>

                       <form method="POST" action="takeActionButton.php">

                        <td>
                          <?php if ($row['remove'] == '0') { ?>

                            <input type="hidden" name="salonId" value=" <?php echo $row['salonId'];?>">
                            <button type="submit" class=" btn_remove  btn btn-danger rounded-round btn-labeled btn-labeled-left" data-toggle="" data-target="#modal_default" id="btn_remove" name="btn_remove" ><b><i class="icon-cross2"></i></b>Remove</button>

                            <?php  }else{ ?>
                              <input type="hidden" name="salonId" value=" <?php echo $row['salonId'];?>">
                              <button type="submit" class=" btn_restore btn btn-primary rounded-round btn-labeled btn-labeled-left" data-toggle="" data-target="#modal_default" id="btn_restore" name="btn_restore"><b><i class="icon-reload-alt"></i></b>Restore</button>
                              <?php }?>


                            </td> 
                            
                          </form>

                        </tr>
                      <?php endwhile;?>
                    </tbody>

                  </table>

                </div>


              </div>


            </div>
          </div>
          <!-- /dashboard content -->

        </div>
      </div>
    </div> 


  </div>

</div>

</body>




</html>
