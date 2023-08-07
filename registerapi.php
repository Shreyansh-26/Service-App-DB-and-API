<?php

require 'connection.php';
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$address = $_POST['address'];

$checkuser = "SELECT * from user WHERE email='$email'";
$checkquery = mysqli_query($conn,$checkuser);

if(mysqli_num_rows($checkquery)>0){
	$response['error']='002';
	$response['message']='user exist';
}

else{

	$insertquery = "INSERT INTO user(user_id,name,email,password,address) VALUES('$user_id','$name','$email','$password','$address')";
$result = mysqli_query($conn,$insertquery);

if($result){
	$response['error']='000';
	$response['message']='register successful';
}
else{
	$response['error']='001';
	$response['message']='registeration failed!';
}

}

echo json_encode($response);
  ?>
