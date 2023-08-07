<?php

include_once 'config.php';

if(isset($_GET['user_id']) && isset($_GET['password']) && $_GET['user_id']!='' && $_GET['password']!='')
{
	$user_id = mysqli_real_escape_string($db,$_GET['user_id']);
	$password = mysqli_real_escape_string($db,$_GET['password']);

	$q = "SELECT * FROM user WHERE user_id='$user_id' LIMIT 1";
	$r = mysqli_query($db,$q);

	$row = mysqli_num_rows($r);

	if($row<1)
	{
		$response = array();
		$response['status'] = 'failed';
		$response['msg'] = 'Mobile does not exist';
		$output = json_encode($response);
		echo $output;
	}
	else
	{
		$res = mysqli_fetch_assoc($r);
        $dbp = $res['password'];
      	if($pword == $dbp)
        {
			$response = array();
			$response['status'] = 'success';
			$response['msg'] = 'logged in';
			$response['userkey'] = $res['uniqueid'];
			$output = json_encode($response);
			echo $output;
        }
      	else
        {
          	$response = array();
			$response['status'] = 'failed';
			$response['msg'] = 'Invalid Password';
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