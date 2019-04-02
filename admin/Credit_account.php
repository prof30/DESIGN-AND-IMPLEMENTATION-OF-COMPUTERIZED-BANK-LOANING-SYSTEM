<?php
session_start();
error_reporting(0);
include('conn.php');
if(strlen($_SESSION['admin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        if(isset($_POST['getaccount'])){
            $acctNumber=mysqli_real_escape_string($con,$_POST['AccountNumber']); 
            $query = $con->query("SELECT * FROM `account` WHERE `acctNumber` = '$acctNumber'") or die(mysqli_error());
            $show = $query->fetch_array(MYSQLI_ASSOC);
            $_SESSION['old_amt'] = $show['Amount'];
                
        }
        //2305822
    
         
    }
    if(isset($_POST['credit'])){
        $acctNumber=mysqli_real_escape_string($con,$_POST['AccountNumber']);
        $AmountPosted=mysqli_real_escape_string($con,$_POST['Amount']);
        $success = $con->query("UPDATE `account` SET `Amount` = Amount+'$AmountPosted' WHERE `acctNumber`='$acctNumber'");
       if($success){
        $debited = '';
         $Dateofdebit = '';
        $DepositorName = mysqli_real_escape_string($con, $_POST['DepositorName']);
        $DateofCredit =  mysqli_real_escape_string($con, $_POST['DateofCredit']);
        $success2 = $con->query("INSERT INTO `transaction` VALUES('', '$acctNumber', '$DepositorName', '$AmountPosted','$debited','$Dateofdebit','$DateofCredit')") or die(mysqli_error());
        if($success){

            echo "<script> alert('Account Has been Credited') </script>";
            echo "<script>window.location = 'dashboard.php'</script>";
            
        }else{

            
            echo "<script> alert('Something went Wrong') </script>";
           
        }

            //echo "<script> alert('Account Has been Credited') </script>";
            //echo "<script>window.location = 'dashboard.php'</script>";
             //header('location:dashboard.php');
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
    
<form class="form-horizontal" method="post" action="" enctype='multipart/form-data'>
<div class="form-group">
<label for="AccountNumber" class="col-sm-2 control-label">Account Number</label>
<div class="col-sm-10">
<input type="text" name="AccountNumber" class="form-control" id="fullanme"  required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
   <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" name="getaccount" class="btn btn-primary">Get Account</button>
      </div>
     </div>
    </form>

         <table>
    <tr>
    <th> Photo </th>
     <th> Full Name </th>
     <th> Account Number  </th>
     <th> Addresss </th>
     <th> Email </th>
     <th> Phone Number </th>
     <th> Account Balance </th>
     <th> State of Origin </th>
    </tr>
    <tr>
    <td> <?php  echo "<img src='uploads/".$show['photo']."' width='50' height='50' />" ;?></td>
     <td> <?php echo $show['fullname']; ?> </td>
     <td> <?php echo $show['acctNumber']; ?> </td>
     <td> <?php echo $show['Address']; ?> </td>
     <td> <?php echo $show['Email']; ?></td>
     <td> <?php echo $show['phone']; ?></td>
     <td> <?php echo "N".$show ['Amount']; ?> </td>
     <td><?php echo $show['state']; ?> </td>
    </tr>
</table>                              
                                        </div>
                                      
<form class="form-horizontal" method="post" action="" enctype='multipart/form-data'>
<div class="form-group">
<label for="AccountNumber" class="col-sm-2 control-label"> Enter Account Number</label>
<div class="col-sm-10">
<input type="text" name="AccountNumber" class="form-control" id="fullanme"  required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Enter Amount</label>
<div class="col-sm-10">
<input type="text" name="Amount" class="form-control" id="fullanme"  required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Name of Depositor</label>
<div class="col-sm-10">
<input type="text" name="DepositorName" class="form-control" id="fullanme"  required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Date of Credit</label>
<div class="col-sm-10">
<input type="Date" name="DateofCredit" class="form-control" id="fullanme"  required="required" autocomplete="off">
</div>
</div>
  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" name="credit" class="btn btn-primary">Credit Account</button>
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

