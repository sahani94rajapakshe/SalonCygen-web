<?php
/*session_start();
$cusEmail=$_SESSION['cusEmail'];*/
  //DB connection
/*include ('../dbConnection/dbConnection.php');*/
$servername = "localhost";
$username = "root";
$password = "";
$database = "saloncygen";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
/*if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}*/


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

</head>
<body class="sidebar-xs sidebar-secondary-hidden">


<!-- <div id="header">
        <?php include('../../headFoot/headfile.php'); ?>
    </div> -->

    <!-- Main navbar -->
    
    
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="adminpage-content">


        <!-- Main sidebar -->
        
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header page-header-light">

                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <span class="breadcrumb-item active">Search</span>
                        </div>

                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>

                    
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <!-- seach id div -->
                            
                            <!-- //seach id div -->

                            <div class="col-xl-12"  style="border: 1px; border-style:none; ">
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h5 class="card-title">Search</h5>
                                        
                                    </div>
                                    <div class="card-body"> 
                                        <form  id="idForm2" action="" method="post">


                                            <div class="row">

                                                <div class="col-sm-4">  
                                                    <input type="text" class="form-control" placeholder="Salon Id" name="SalonId" id="SalonId" >
                                                </div>
                                                
                                                <div class="col-sm-4">                                    

                                                    <select data-placeholder="--Select Service--" class="form-control select" data-fouc name="search_servicetype" id="search_ServiceId">
                                                        <option></option>                                   
                                                        <option value="Hair Dressign">Hair Dressing</option>
                                                        <option value="Facial Treatment">Facial Treatment</option>
                                                        <                                           
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">

                                                    <select data-placeholder="--Select Location--" class="form-control select" data-fouc name="search_Location" id="search_locationId">
                                                        <option></option>                                   
                                                        <option value="Anuradhapura">Anuradhapura</option>
                                                        <option value="Galle">Galle</option>
                                                        <option value="Negumbo">Nigumbo</option>
                                                        
                                                    </select>
                                                    
                                                </div>
                                                <div class="col-sm-4 text-center" >

                                                    <button type="submit" class="btn btn-outline-primary btn-lg icon-search4" value="search" id="search_SalonId" name="search_SalonId" style="padding:5px 25px; font-size: 18px;  float: right;"> search    </button>
                                                    <button type="button" id="btnAlltrans" class="btn btn-outline-success" >All Salons</button>
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

                                <table class="table datatable-basic">
                                    <thead>
                                        <tr>
                                            <!-- <th>No</th> -->
                                            <th>Salon Id</th>
                                            <th>Salon Name</th>
                                            <!-- <th>Owner Name</th> -->
                                            <!-- <th>Email</th>
                                            <th>Location</th>
                                            <th>Total  Rate</th>
                                            <th>Action</th>
                                            <th>Action</th> -->
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody id="mytbody">
                                        <?php 
                                        if(isset($_POST['search_SalonId']))
                                        {


                                          $id = $_POST['SalonId'];

                                          if($id != ""){
                                             $query = "SELECT * FROM salon_info WHERE SalonId= '$id' ";

                                             $valueToSearch = mysqli_query ($conn, $query);

                                             if (mysqli_num_rows( $valueToSearch) > 0) {
                              # code...
                                              while ( $row =mysqli_fetch_assoc($valueToSearch)) {
                                # code...
                                                $id = $row['salonId'];
                                                $name = $row['salonName'];
                                            }
                                            ?>

                                            <tr>

                                                <td><?php echo $id;?></td>
                                                <td><?php echo $name;?></td>




                                            </tr>

                                            <?php
                                        }
                                    }




                                }
                                else {

                                  $query = "SELECT * FROM salon_info";

                                  $valueToSearch = mysqli_query ($conn, $query);

                                  while ( $row =mysqli_fetch_array($valueToSearch)) {
                                     
                                    $id = $row['salonId'];
                                    $name = $row['salonName'];
                                }
                                ?>


                                <tr>

                                    <td><?php echo $id;?></td>
                                    <td><?php echo $name;?></td>




                                </tr>
                                <?php


                                
                                /*echo "no results";*/
                            }



                            ?>


                        </table>

                    </div>


                </div>


            </div>
        </div>
        <!-- /dashboard content -->


        <!--All Transaction Table-->


        <!--All Transaction Table-->
        <!-- /content area -->


        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-footer">
                <span class="navbar-text">
                    &copy;  <a href="#">BEET</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">MobiOs Private Limited</a>
                </span>

                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>

                </ul>
            </div>
        </div>
        <!-- /footer -->

    </div>
    <!-- /main content -->
</div>
</div>
<!-- /page content -->



</body>
</html>
