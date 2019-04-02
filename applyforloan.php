<?php
session_start();
include('inc/conn.php');
if(strlen($_SESSION['accountnumber'])=="")
    {
    header("Location: index.php");
    }
    else{
        if(strlen($_SESSION['accountnumber'])){
            $accountnumber = $_SESSION['accountnumber'];
            $sucess = $con->query("SELECT * FROM loan WHERE accountnumber='$accountnumber'") or die(mysqli_error($con));
    $check = mysqli_num_rows($sucess);
    if($check == 1){
        echo "<script> alert('You have already applied for loan.. Kindly Wait for Approval') </script>";
        echo "<script>window.location = 'profile.php'</script>";
        
    }
            // $show = $sucess->fetch_array(MYSQLI_ASSOC);
   
        }


        if(strlen($_SESSION['accountnumber'])){
            $accountnumber = $_SESSION['accountnumber'];
            $sucess = $con->query("SELECT * FROM user WHERE accountnumber='$accountnumber'") or die(mysqli_error($con));
    $show = $sucess->fetch_array(MYSQLI_ASSOC);
    $sucess2 = $con->query("SELECT * FROM account WHERE acctNumber='$accountnumber'") or die(mysqli_error($con));
    $show2 = $sucess2->fetch_array(MYSQLI_ASSOC);
        }


        if(isset($_POST['apply'])){
            $accontname=mysqli_real_escape_string($con,$_POST['acctname']);
            $dateofapplication=mysqli_real_escape_string($con,$_POST['applieddate']);
            $accountnumber=mysqli_real_escape_string($con,$_POST['AcctNumber']);
            $loantype=mysqli_real_escape_string($con,$_POST['loantype']);
            $amount=mysqli_real_escape_string($con,$_POST['Amount']);
            $interest=mysqli_real_escape_string($con,$_POST['interest']);
            $deposit=mysqli_real_escape_string($con,$_POST['deposit']);
            $balance=mysqli_real_escape_string($con,$_POST['balance']);
            $address=mysqli_real_escape_string($con,$_POST['address']);
            $phone=mysqli_real_escape_string($con,$_POST['phone']);
            $occupation=mysqli_real_escape_string($con,$_POST['occupation']);
            $remark=mysqli_real_escape_string($con,$_POST['remark']);
           
            $sucess2 = $con->query("INSERT INTO `loan` VALUES('','$accontname','$accountnumber',
            '$loantype','$amount','$interest','$deposit','$balance','$address','$phone','$occupation',$dateofapplication,'$remark')");
            if($sucess2){
                echo "<script> alert('Your Application has been submitted.. Kindly Wait for Approval') </script>";
                echo "<script>window.location = 'profile.php'</script>";
            }else{
                
                die(mysqli_error($con));
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
<label for="default" class="col-sm-2 control-label">Date of Application</label>
<div class="col-sm-10">
<input type="text" name="applieddate" class="form-control" value="<?php echo date('Y/d/m');?>" readonly autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Account Name</label>
<div class="col-sm-10">
<input type="text" name="acctname" class="form-control" value="<?php echo  $show['accountname'];?>" readonly autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Account Number</label>
<div class="col-sm-10">
<input type="text" name="AcctNumber" class="form-control" value="<?php echo  $accountnumber;?>" readonly autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Type of Loan</label>
<div class="col-sm-10">
<input type="text" name="loantype" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div>  

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Amount Loan</label>
<div class="col-sm-10">
<input type="text" name="Amount" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Interest rate</label>
<div class="col-sm-10">
<input type="text" name="interest" class="form-control" value="5%" readonly autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Deposit</label>
<div class="col-sm-10">
<input type="text" name="deposit" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div> 


<div class="form-group">
<label for="default" class="col-sm-2 control-label">Balance</label>
<div class="col-sm-10">
<input type="text" name="balance" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div> 

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Address</label>
<div class="col-sm-10">
<input type="text" name="address" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div> 

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Phone Number</label>
<div class="col-sm-10">
<input type="text" name="phone" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div> 

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Occupation</label>
<div class="col-sm-10">
<input type="text" name="occupation" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div> 
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Remark</label>
<div class="col-sm-10">
<input type="text" name="remark" class="form-control" value="Waiting Approval" readonly required="required" autocomplete="off">
</div>
</div> 
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" name="apply" class="btn btn-primary">Apply for loan</button>
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
                toastr["success"]( "Welcome to Loan menu!");

            });
        </script>
    </body>

    <div class="foot"><footer>

</footer> </div>

<style> .foot{text-align: center; */}</style>
</html>
<?php } ?>