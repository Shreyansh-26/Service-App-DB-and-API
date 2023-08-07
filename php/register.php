<?php

include_once 'config.php';

if(isset($_GET['user_id']) && isset($_GET['name']) && isset($_GET['email']) && isset($_GET['password']) && isset($_GET['address']) && $_GET['user_id']!='' && $_GET['name']!='' && $_GET['email']!='' && $_GET['password']!='' && $_GET['address']!='')
{
	$user_id = mysqli_real_escape_string($db,$_GET['user_id']);
	$name = mysqli_real_escape_string($db,$_GET['name']);
	// $lname = mysqli_real_escape_string($db,$_GET['lname']);
    $email = mysqli_real_escape_string($db,$_GET['email']);
    $password = mysqli_real_escape_string($db,$_GET['password']);
	$address = mysqli_real_escape_string($db,$_GET['address']);
	// $country = mysqli_real_escape_string($db,$_GET['country']);
	
	

	$q = "SELECT * FROM user WHERE user_id='$user_id' LIMIT 1";
	$r = mysqli_query($db,$q);

	$row = mysqli_num_rows($r);

	if($row>0)
	{
		$response = array();
		$response['status'] = 'failed';
		$response['msg'] = 'Email already registered';
		$output = json_encode($response);
		echo $output;
	}
	else
	{
		$uniquecode = uniqid();
		$q2 = "INSERT INTO user(user_id,name,email,uniqueid,password,address) VALUES('$user_id','$name','$email','$password','$address')";
		$r2 = mysqli_query($db,$q2);
		
		if(!$r2)
		{
			$error = mysqli_error($db);
			$response = array();
			$response['status'] = 'failed';
			$response['msg'] = 'Error at the database server.';
			$output = json_encode($response);
			echo $output;
		}
		else
		{
			$response = array();
			$response['status'] = 'success';
			$response['msg'] = 'User account created';
			$response['userkey'] = $uniquecode;
			$output = json_encode($response);
			echo $output;
		}
	}
}
else
{
	$response = array();
	$response['status'] = 'failed';
	$response['msg'] = 'Please enter all the details';
	$output = json_encode($response);
	echo $output;
}

?>