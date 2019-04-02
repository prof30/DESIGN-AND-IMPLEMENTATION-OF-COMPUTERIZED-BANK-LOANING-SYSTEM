<?php
session_start();
include_once("conn.php");
if(@$_SESSION['admin']){

    header('location:dashboard.php');
}else{
    if(isset($_POST['login'])){
        @$username = mysqli_real_escape_string($con, $_POST['username']);
        @$pasword =  mysqli_real_escape_string($con, $_POST['password']);
        @$password = sha1($password);
        $query = $con->query("SELECT *FROM `admin` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$valid = $query->num_rows;
			if($valid > 0){
				$_SESSION['admin'] = $fetch['id'];
				header("location:dashboard.php");
			}else{
				echo "<script>alert('Invalid username or password')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
		$conn->close();
    }

}
?>