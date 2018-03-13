<?php 
//require your db connection
require "connection.php";
session_start();

//check if user is registered
if (isset($_POST['login'])) {

	extract($_POST);
	$query = 'SELECT * FROM 6470users WHERE USERNAME ="$name" AND PASSWORD = "$pass";';
	$run = mysqli_query($conn , $query);
	 $count = mysqli_num_rows($run);
	if (!$count == 1) {
		//store the user in the session variable and then redirecting them to the dasboard
		$_SESSION["user"]=$username;
		echo "<h3>login you in  ......" . $_SESSION['user'] . " </h3>";
	}else{
		echo "<h2>username or password you entered is incorrect or you haven't registered</h2>";
	}
}elseif (isset($_POST['Register'])) {
	//then register the user to the db
	extract($_POST);
	$query = "INSERT INTO 6470users SET USERNAME = '$name' , PASSWORD = '$pass', PHONE = '$contact'; ";
	$insert = mysqli_query($conn , $query);
	if ($insert) {
		echo require_once 'login.php';
	}else{
		echo "<h2>User registration failed" .  mysqli_error($conn);
	}
}
 ?>