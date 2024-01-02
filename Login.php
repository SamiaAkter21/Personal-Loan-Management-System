<?php

	$email=$_POST['email'];
	$pass=$_POST['pass'];

	$connection= mysqli_connect('localhost','root','','db_lms'); 

	if(!$connection)
	{
		die("failed". mysqli_error($connection));
	}


	$query = $connection->prepare("SELECT * FROM signup WHERE email=? "); 

	$query->bind_param("s",$email);

	$query->execute();

	$query_result=$query->get_result();

	if($query_result->num_rows>0)
	{
		$data = $query_result->fetch_assoc();
		if($data['Password'] == md5($pass))
		{
			header('location:admin.html');
			
		}
		else 
		{
			echo "Invalid email or password!!"; 
		}
	}
	else 
	{
		echo "You need to sign up first!!";
	}

?>