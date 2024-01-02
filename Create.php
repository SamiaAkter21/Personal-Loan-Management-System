<?php

	$name = $_POST['name'];
	$email = $_POST['email'];
	$add = $_POST['address'];
	$num = $_POST['number'];
	$pass = $_POST['pass'];
	$con_pass = $_POST['con_pass'];


	if($pass!=$con_pass)
	{
		die("Password did not match");
	}

	$connection= mysqli_connect('localhost','root','','db_lms');

	if(!$connection)
	{
		die("failed". mysqli_error($connection));
	}

	$query = "INSERT INTO signup VALUES ('$name', '$email', '$add', '$num', '".md5($pass)."')"; 

	$final=mysqli_query($connection, $query);
	
	if($final){
		echo "Registration Successful!!";
	}
	else{
		echo "This email is already in used!!";
	}

?>