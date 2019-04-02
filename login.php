<?php
session_start();
include('inc/conn.php');
// if(strlen(@$_SESSION['email'])=="")
//     {   
//     //header("Location: login.php"); 
//     }elseif(strlen(@$_SESSION['email']))
//     {   
//         header("Location: profile.php"); 
//     }else{

if(isset($_POST['login'])){
	
	$accountnumber=mysqli_real_escape_string($con,$_POST['accountnumber']);
	$password=mysqli_real_escape_string($con,$_POST['password']);

	$sucess = $con->query("SELECT * FROM user WHERE accountnumber='$accountnumber' AND password='$password'") or die(mysqli_error($con));
    $show = $sucess->fetch_array(MYSQLI_ASSOC);
    $num=mysqli_num_rows($sucess);
    
    if (($num) == 1) {
		$_SESSION['accountnumber'] = $show['accountnumber'];
		echo "<script>window.location = 'profile.php'</script>";
		
		
	}else{

		
		die(mysqli_error($con));
	   
	}


	

}

?>
<?php include('inc/header.php');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="css/register.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<body>
<div class="main">
	<!-- <div class="social-icons">
		 <div class="col_1_of_f span_1_of_f"><a href="#">
		    <ul class='facebook'>
		    	<i class="fb"> </i>
		    	<li>Connect with Facebook</li>
		    	<div class='clear'> </div>
		    </ul>
		    </a>
		 </div>	
		 <div class="col_1_of_f span_1_of_f"><a href="#">
		    <ul class='twitter'>
		      <i class="tw"> </i>
		      <li>Connect with Twitter</li>
		      <div class='clear'> </div>
		    </ul>
		    </a>
		</div>
		<div class="clear"> </div>	
      </div> -->
      <h2>Account Opening Form</h2>
		<form method="POST" action=""  enctype='multipart/form-data'>

		   <div class="lable-2">
          
      
            <input type="text" class="text" name="accountnumber" placeholder="Enter Account Number " >
            <input type="password" class="text" name="password" placeholder="Password " >
</div>
		   <div class="submit">
			  <input type="submit" name="login" value="Login to Your Account" >
		   </div>
		   <div class="clear"> </div>
		</form>
		<!-----//end-main---->
		</div>
		 <!-----start-copyright---->
   		<div class="copy-right">
			<p> Copyright <a href="#">UBA NIGERIA</a></p> 
		</div>
				<!-----//end-copyright---->
</body>
</html>