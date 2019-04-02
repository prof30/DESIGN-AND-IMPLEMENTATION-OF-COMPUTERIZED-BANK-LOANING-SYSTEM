<?php
session_start();
error_reporting(0);
include('inc/conn.php');
if(strlen($_SESSION['accountnumber'])=="")
    {
    header("Location: index.php");
    }
    else{
        if(strlen($_SESSION['accountnumber'])){
            $accountnumber = $_SESSION['accountnumber'];
            $sucess = $con->query("SELECT * FROM user WHERE accountnumber='$accountnumber'") or die(mysqli_error($con));
    $show = $sucess->fetch_array(MYSQLI_ASSOC);
    $sucess2 = $con->query("SELECT * FROM account WHERE acctNumber='$accountnumber'") or die(mysqli_error($con));
    $show2 = $sucess2->fetch_array(MYSQLI_ASSOC);
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
                                <div class="col-sm-6">
                                    <h2 class="title">Dashboard</h2>

                                </div>
                                <!-- /.col-sm-6 -->
                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.container-fluid -->

                   <center> <h1 class="alert alert-info"> Welcome <?php echo $show['surname']; echo " Your Account Number is  "; echo $show2['acctNumber'];?></h1></center>

                   <center> <h1 class="alert alert-info"> <?php echo " Your Account Bal is  "; echo $show2['Amount'];?></h1></center>

                    </div>
                    <!-- /.main-page -->


                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
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
                toastr["success"]( "Welcome to my Profile!");

            });
        </script>
    </body>

    <div class="foot"><footer>

</footer> </div>

<style> .foot{text-align: center; */}</style>
</html>
<?php } ?>
