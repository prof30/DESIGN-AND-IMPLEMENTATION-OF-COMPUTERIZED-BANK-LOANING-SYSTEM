<?php
session_start();

include('inc/conn.php');
if(isset($_POST['submit'])){
	$title=mysqli_real_escape_string($con,$_POST['title']);
	$surname=mysqli_real_escape_string($con,$_POST['surname']); 
	$firstname=mysqli_real_escape_string($con,$_POST['firstname']);
	$lastname=mysqli_real_escape_string($con,$_POST['lastname']);
	$accountName=mysqli_real_escape_string($con,$_POST['accountName']);
	$accountNumber=mysqli_real_escape_string($con,$_POST['accountNumber']);  
	$dateofbirth=mysqli_real_escape_string($con,$_POST['dateofbirth']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$sex=mysqli_real_escape_string($con,$_POST['sex']);
	$status=mysqli_real_escape_string($con,$_POST['status']); 
	$country=mysqli_real_escape_string($con,$_POST['Country']);
	$state=mysqli_real_escape_string($con,$_POST['state']);
	$lga=mysqli_real_escape_string($con,$_POST['lga']); 
	$address=mysqli_real_escape_string($con,$_POST['Address']); 
	$address2=mysqli_real_escape_string($con,$_POST['Address2']); 
    $phone=mysqli_real_escape_string($con,$_POST['phone']); 
	$phone2=mysqli_real_escape_string($con,$_POST['phone2']);  

	$accttype=mysqli_real_escape_string($con,$_POST['accttype']); 
	$debitcard=mysqli_real_escape_string($con,$_POST['debitcard']); 
	$validity=mysqli_real_escape_string($con,$_POST['validity']); 
    $nextofkin=mysqli_real_escape_string($con,$_POST['nextofkin']); 
	$nextofkinphone=mysqli_real_escape_string($con,$_POST['nextofkinphone']); 
	$town=mysqli_real_escape_string($con,$_POST['town']);
	$occupation=mysqli_real_escape_string($con,$_POST['occupation']);
	$amt = '0.00';
	$fullname = $surname." ".$firstname." ".$lastname;
	
    $photos =  $_FILES['photo']['name'];
	$target = "admin/uploads/".basename($photos);


	$sucess = $con->query("INSERT INTO `user` VALUES('','$title','$surname','$firstname','$lastname','$accountName',
	'$accountNumber','$accttype','$debitcard','$validity','$dateofbirth','$email','$password','$sex','$status','$occupation',
	'$country','$state','$lga','$town','$address','$address2','$phone','$phone2',' $nextofkin','$nextofkinphone','$photos')") or die(mysqli_error());
    move_uploaded_file($_FILES['photo']['tmp_name'], $target);
	
	if($sucess){
		$sucess2 = $con->query("INSERT INTO `account` VALUES('','$fullname','$accountName',
	'$accountNumber','$address','$email','$phone','$sex','$status','$dateofbirth','$state','$lga','$photos','$amt')") or die(mysqli_error());
	move_uploaded_file($_FILES['photo']['tmp_name'], $target);
	if($sucess2){
		echo "<script> alert('You Have been registered, copy Your Acct Number to login ".$accountNumber."') </script>";
		echo "<script>window.location = 'login.php'</script>";
	}else{
		
		die(mysqli_error($con));
	}
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
<div class="main" >
	
      <h2 style="margin-top:0px; font-size:2em;">Account Opening Form</h2>
		<form method="POST" action=""  enctype='multipart/form-data'>
		<div class="lable">
		<p  style="color:white;">Title: </p>
		        <div class="col_1_of_2 span_1_of_2">	<input type="text" class="text" name="title"  id="active"></div>
                <div class="col_1_of_2 span_1_of_2"></div>
                <div class="clear"> </div>
				</div>
				<div class="lable-2">
				<p  style="color:white;">Surname: </p>
				<input type="text" class="text" name="surname" >
			</div>
		   <div class="lable">
		
		        <div class="col_1_of_2 span_1_of_2">
				<p  style="color:white;">First Name: </p>	
				<input type="text" class="text" name="firstname"  ></div>
				<p  style="color:white;">Last Name: </p>
                <div class="col_1_of_2 span_1_of_2"><input type="text" class="text" name="lastname" ></div>
                <div class="clear"> </div>
		   </div>
		   <div class="lable-2">
		   <?php

$con = "3070";
(int) @$i;
 $pin = $con.''.rand(1000,9999);
 ?>
	   <p  style="color:white;">Desire Account Name: </p>
		   <input type="text" class="text" name="accountName">
		   <p  style="color:white;">Account Number(You Can't edit it): </p>
		   <input type="text" class="text" name="accountNumber" value="<?php echo $pin;?>" readonly>
		   <p  style="color:white;">Account Type(You Can't edit it): </p>
		   <input type="text" class="text" name="accttype" value="Current" readonly>
		   <p  style="color:white;">Kindly Select Debit card type </p>
		   <select name="debitcard" style="width:95%;" class="form-control" required="required">
				<option>Select Card type </option>
				<option value="master"> Master Card </option>
				<option value="visa"> Visa Card </option>
				<option value="verve"> Verve Card </option>
				<option value="Gold"> Gold Card </option>
		   </select>
		   <br>
		   <p  style="color:white;">Validity: </p>
		   <input type="text" class="text" name="validity" readonly value="<?php $y= date("Y")+5; echo date($y."/m/d/");?>" >
		   <br/>
		   <p  style="color:white;"> Date of birth: </p>
           <input type="date" class="text" name="dateofbirth" value="" >
		   <p  style="color:white;">Choose Gender(Sex): </p>
		   <select name="sex" style="width:95%;" class="form-control" required="required">
				<option>Select Sex </option>
				<option value="Male"> Male </option>
				<option value="female"> Female </option>
				
		   </select>
		   <br/>
		   <p  style="color:white;">Choose Marital Status: </p>
		   <select name="status" style="width:95%;" class="form-control" required="required">
				<option>Select Marital Status </option>
				<option value="Single"> Single</option>
				<option value="Married"> Married </option>
				<option value="Divorced"> Divorced </option>
				<option value="Widow"> Widow </option>
				<option value="Widower"> Widower </option>
		   </select>
		        <!-- <div class="col_1_of_2 span_1_of_2">	
                    <input type="text" class="text" name="sex" placeholder="Enter Sex(Male/Female)">
                </div>
                <div class="col_1_of_2 span_1_of_2">
                    <input type="text" class="text" name="status" placeholder="Enter Status" ></div>
				<div class="clear"> </div> -->
				<p  style="color:white;">Occupation: </p>
				<input type="text" class="text" name="occupation" >
				<p  style="color:white;">Email: </p>
			<input type="text" class="text" name="email" >
			<p  style="color:white;">Password (Note your password): </p>
			<input type="password" class="text" name="password" >
			<p  style="color:white;">Next of Kin: </p>
			<input type="text" class="text" name="nextofkin" >
			<p  style="color:white;">Next of Kin Phone Number: </p>
            <input type="text" class="text" name="nextofkinphone" >
</div>

           <div class="lable">
		        <div class="col_1_of_2 span_1_of_2">	
				<p  style="color:white;">Country: </p>
                    <input type="text" class="text" name="Country" >
                </div>
                <div class="col_1_of_2 span_1_of_2">
				<p  style="color:white;">State: </p>
                    <input type="text" class="text" name="state" ></div>
                <div class="clear"> </div>
		   </div>

 <div class="lable-2">
 <p  style="color:white;">LGA: </p>
		   <input type="text" class="text"name="lga" >
		   <p  style="color:white;">Home Town: </p>
		   <input type="text" class="text"name="town"  >
		   <p  style="color:white;">Contact Address: </p>
		   <input type="text" class="text" name="Address" >
		   <p  style="color:white;">Permanent Address: </p>
		   <input type="text" class="text" name="Address2"  >
		   <p  style="color:white;">Personal Phone Number: </p>
		   <input type="text" class="text"name="phone"  >
		   <p  style="color:white;">Conatact mobile: </p>
			<input type="text" class="text" name="phone2"  >
			<p  style="color:white;">Select a valid Passport: </p>
			<input type="file" class="text" name="photo">


</div>
<br/>
		   <h3><br/><br/>By Creating an account, you agree to our <span class="term"><a href="#">Terms & Conditions</a></span></h3>
		   <div class="submit">
			  <input type="submit" name="submit" value="Create account" >
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