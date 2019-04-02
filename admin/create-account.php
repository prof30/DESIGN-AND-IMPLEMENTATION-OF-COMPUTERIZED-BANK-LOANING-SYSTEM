<?php
session_start();
error_reporting(0);
include('conn.php');
if(strlen($_SESSION['admin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{

if(isset($_POST['submit'])){
    $fullname=mysqli_real_escape_string($con,$_POST['fullname']);
    $acctName=mysqli_real_escape_string($con,$_POST['accountName']); 
    $acctNumber=mysqli_real_escape_string($con,$_POST['AccountNumber']); 
    $address=mysqli_real_escape_string($con,$_POST['address']); 
    $state=mysqli_real_escape_string($con,$_POST['state']);
    $lga=mysqli_real_escape_string($con,$_POST['lga']); 
    $emailid=mysqli_real_escape_string($con,$_POST['emailid']); 
    $phone=mysqli_real_escape_string($con,$_POST['phone']); 
    $gender=mysqli_real_escape_string($con,$_POST['gender']); 
    $status=mysqli_real_escape_string($con,$_POST['status']); 
    $dob=mysqli_real_escape_string($con,$_POST['dob']); 
    $amt = '0.00';
    $photos =  $_FILES['photo']['name'];
    $target = "uploads/".basename($photos);
    $con->query("INSERT INTO `account` VALUES('', '$fullname', '$acctName','$acctNumber',' $address',' $emailid',' $phone',
    '$gender','$status','$dob','$state','$lga','$photos','$amt')") or die(mysqli_error());
    move_uploaded_file($_FILES['photo']['tmp_name'], $target);
    header("location: dashboard.php");
    
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bank Admin| Create Account </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Add Customer</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Customer Account Creation</li>
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

                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                      
                                                <form class="form-horizontal" method="post" action="" enctype='multipart/form-data'>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<input type="text" name="fullname" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Account Name</label>
<div class="col-sm-10">
<input type="text" name="accountName" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Account Number</label>
<div class="col-sm-10">
<?php

$con = "230";
(int) @$i;
 $pin = $con.''.rand(1000,9999);
 ?>
<input type="text" name="AccountNumber" value="<?php echo "$pin";?>"class="form-control" id="fullanme" readonly required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Address</label>
<div class="col-sm-10">
<input type="text" name="address" class="form-control" id="rollid" maxlength="20" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
  <label for="default" class="col-sm-2 control-label">State</label>
  <div class="col-sm-10">
 <select name="state" class="form-control" id="default" required="required">
<option Selected value="">Select State</option>
<option value="Abia"> Abia</option>
<option value="Adamawa"> Adamawa</option>
<option value="Akwa Ibom"> Akwa Ibom</option>
<option value="Anambra"> Anambra</option>
<option value="Bauchi"> Bauchi</option>
<option value="Benue"> Benue</option>
<option value="Borno"> Borno</option>
<option value="Cross River"> Cross River</option>
<option value="Delta"> Delta</option>
<option value="Edo"> Edo</option>
<option value="Eungu"> Eungu</option>
<option value="Rivers"> Rivers</option>
<option value="Taraba"> Taraba</option>
<option value="Sokoto"> Sokoto</option>
<option value="Kano"> Kano</option>
<option value="Kaduna"> Kaduna</option>
<option value="Imo"> Imo</option>
<option value="Ebonyi"> Ebonyi</option>
<option value="Bayelsa"> Bayelsa</option>
<option value="Jigawa"> Jigawa</option>
 </select>
   </div>
 </div>



 <div class="form-group">
  <label for="default" class="col-sm-2 control-label">LGA</label>
  <div class="col-sm-10">
 <select name="lga" class="form-control" id="default" required="required">
<option Selected value="">Select Status</option>
<option value="Ughelli North"> Ughelli North</option>
<option value="Ughelli South"> Ughelli South</option>
<option value="Ogbaru"> Ogbaru</option>
<option value="Awka South"> Awka South</option>
<option value="Awka North"> Awka North</option>
<option value="Ihiala"> Ihiala</option>
<option value="Oyi"> Oyi</option>
<option value="Ikwerre"> Ikwerre</option>
<option value=" Obia/Akpo"> Obia/Akpo</option>
<option value="Patani"> Patani</option>
 </select>
   </div>
 </div>


<div class="form-group">
<label for="default" class="col-sm-2 control-label">Email id:</label>
<div class="col-sm-10">
<input type="email" name="emailid" class="form-control" id="email" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Phone Number:</label>
<div class="col-sm-10">
<input type="tel" name="phone" class="form-control" id="phone" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Gender</label>
<div class="col-sm-10">
<input type="radio" name="gender" value="Male" required="required" checked="">Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
</div>
</div>


 <div class="form-group">
  <label for="default" class="col-sm-2 control-label">Marital Status</label>
  <div class="col-sm-10">
 <select name="status" class="form-control" id="default" required="required">
<option Selected value="">Select Status</option>
<option value="Single"> Single</option>
<option value="Single"> Married</option>
<option value="Single"> Divorced</option>
<option value="Single"> Searching</option>
 </select>
   </div>
 </div>

<div class="form-group">
 <label for="date" class="col-sm-2 control-label">Date of Birth:</label>
<div class="col-sm-10">
<input type="date"  name="dob" class="form-control" id="date">
  </div>
 </div>


     <div class="form-group">
 <label for="date" class="col-sm-2 control-label">Passport Photograph:</label>
<div class="col-sm-10">
<input type="file"  name="photo" class="form-control" id="photo">
  </div>
 </div>                                               

  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" name="submit" class="btn btn-primary">Add</button>
      </div>
     </div>
    </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>
<?PHP } ?>
