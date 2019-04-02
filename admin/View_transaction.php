<?php
session_start();
error_reporting(0);
include('conn.php');
if(strlen($_SESSION['admin'])=="")
    {
    header("Location: index.php");
    }
    else{
        if(isset($_POST['search'])){

            $acctNumber=mysqli_real_escape_string($con,$_POST['AccountNumber']); 
            $query = $con->query("SELECT * FROM `transaction` WHERE `acctNumber` = '$acctNumber'") or die(mysqli_error());
            
        }
        ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online Banking  | Dashboard</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/green.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
              <?php include('includes/topbar.php');?>
            <div class="content-wrapper">
                <div class="content-container">

                    <?php include('includes/leftbar.php');?>

                     <div class="main-page">

<div class="container-fluid">
       <div class="row page-title-div">
           <div class="col-md-6">
               <h2 class="title">View Customer Details</h2>
           
           </div>
           
           <!-- /.col-md-6 text-right -->
       </div>
       <!-- /.row -->
       <div class="row breadcrumb-div">
           <div class="col-md-6">
               <ul class="breadcrumb">
                   <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
           
                   <li class="active">View Customer Details </li>
               </ul>
           </div>
        
       </div>
       <!-- /.row -->
   </div>
   <div class="container-fluid">
      
   <div class="row">
               <div class="col-md-12">
                   <div class="panel">
                       <div class="panel-heading">
                           <div class="panel-title">
                               <h5>Fill the Customer info</h5>
                           </div>
                       </div>
                       <div class="panel-body">

                      
                   </div>
                 
                           <form class="form-horizontal" method="post" action="" enctype='multipart/form-data'>



<div class="form-group">
<label for="default" class="col-sm-2 control-label">Account Number</label>
<div class="col-sm-10">

<input type="text" name="AccountNumber" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div>
                                             

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" name="search" class="btn btn-primary">Search</button>
</div>
</div>
</form>
<table>
    <tr>
    <th> Account Number</th>
     <th> Name of Depositor </th>
     <th> Account Credited  </th>
     <th> Account Debited </th>
     <th> Date of Debit </th>
     <th> Date of Credit </th>
   
    </tr>
    <tr>
    <?php 
    while($show = $query->fetch_array(MYSQLI_ASSOC)){

   
?>

     <td> <?php echo $show['acctNumber']; ?> </td>
     <td> <?php echo $show['NameOfDep']; ?> </td>
     <td> <?php echo $show['credited']; ?> </td>
     <td> <?php echo $show['Debited']; ?></td>
     <td> <?php echo $show['DateofDebit']; ?></td>
     <td> <?php echo $show['DateofCredit']; ?></td>
  
    </tr>
    <?php  } ?>
</table>
                       </div>
                   </div>
               </div>
               <!-- /.col-md-12 -->
           </div>
</div>
</div>container-fluid -->

                      
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->


                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/waypoint/waypoints.min.js"></script>
        <script src="js/counterUp/jquery.counterup.min.js"></script>
        <script src="js/amcharts/amcharts.js"></script>
        <script src="js/amcharts/serial.js"></script>
        <script src="js/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="js/amcharts/themes/light.js"></script>
        <script src="js/toastr/toastr.min.js"></script>
        <script src="js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script src="js/production-chart.js"></script>
        <script src="js/traffic-chart.js"></script>
        <script src="js/task-list.js"></script>
        <script>
            $(function(){

                // Counter for dashboard stats
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });

                // Welcome notification
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                toastr["success"]( "Welcome to Admin Dashboard!");

            });
        </script>
    </body>

    <div class="foot"><footer>

</footer> </div>

<style> .foot{text-align: center; */}</style>
</html>
<?php } ?>
