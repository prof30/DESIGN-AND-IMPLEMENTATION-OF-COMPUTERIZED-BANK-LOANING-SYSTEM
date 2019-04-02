<?php
session_start();
error_reporting(0);
include('inc/conn.php');
if(strlen($_SESSION['accountnumber'])=="")
    {
    header("Location: index.php");
    }
    else{
        if(isset($_POST['transfer'])){
            $accountnumber=mysqli_real_escape_string($con,$_POST['AcctNumber']);
            $bankname=mysqli_real_escape_string($con,$_POST['bankname']);
            $amount=mysqli_real_escape_string($con,$_POST['Amount']);
            $Description=mysqli_real_escape_string($con,$_POST['Description']);
if(!empty($accountnumber) && !empty($bankname) && !empty($amount) && !empty($Description)){
    header("Location: code.php");
}else{

    echo "<script> alert('fill all the form') </script>";
    // echo "<script>window.location = 'transfer.php'</script>";
}
           

        }
        ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online Banking  | Profile</title>
        <link rel="stylesheet" href="css2/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css2/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css2/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css2/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css2/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="css2/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="css2/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="css2/icheck/skins/line/green.css" >
        <link rel="stylesheet" href="css2/main.css" media="screen" >
        <script src="js2/modernizr/modernizr.min.js"></script>
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
               <h2 class="title">Make Transfer</h2>
           
           </div>
           
           <!-- /.col-md-6 text-right -->
       </div>
       <!-- /.row -->
       <div class="row breadcrumb-div">
           <div class="col-md-6">
               <ul class="breadcrumb">
                   <li><a href="profile.php"><i class="fa fa-home"></i> Home</a></li>
           
                   <li class="active">Make Transfer </li>
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
<label for="default" class="col-sm-2 control-label">Phone Number</label>
<div class="col-sm-10">

<input type="text" name="AcctNumber" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Network Provider</label>
<div class="col-sm-10">

<input type="text" name="bankname" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div>                                     
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Amount</label>
<div class="col-sm-10">

<input type="text" name="Amount" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Description</label>
<div class="col-sm-10">

<input type="text" name="Description" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" name="transfer" class="btn btn-primary">Recharge</button>
</div>
</div>
</form>

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

      <script src="js2/jquery/jquery-2.2.4.min.js"></script>
        <script src="js2/jquery-ui/jquery-ui.min.js"></script>
        <script src="js2/bootstrap/bootstrap.min.js"></script>
        <script src="js2/pace/pace.min.js"></script>
        <script src="js2/lobipanel/lobipanel.min.js"></script>
        <script src="js2/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js2/prism/prism.js"></script>
        <script src="js2/waypoint/waypoints.min.js"></script>
        <script src="js2/counterUp/jquery.counterup.min.js"></script>
        <script src="js2/amcharts/amcharts.js"></script>
        <script src="js2/amcharts/serial.js"></script>
        <script src="js2/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="js2/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="js2/amcharts/themes/light.js"></script>
        <script src="js2/toastr/toastr.min.js"></script>
        <script src="js2/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js2/main.js"></script>
        <script src="js2/production-chart.js"></script>
        <script src="js2/traffic-chart.js"></script>
        <script src="js2/task-list.js"></script>
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
                toastr["success"]( "Welcome to Transfer!");

            });
        </script>
    </body>

    <div class="foot"><footer>

</footer> </div>

<style> .foot{text-align: center; */}</style>
</html>
<?php } ?>