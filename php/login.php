<?php
	$user="admin";
	$password="admin";
	$isset_user=isset($_POST["app_user"]);
	$isset_password=isset($_POST["app_password"]);
	$response=array();
	if($isset_user&&$isset_password){
		$valid_user=$_POST["app_user"]==$user;
		$valid_password=$_POST["app_password"]==$password;
		if($valid_user&&$valid_password){
			$response["state"]="1";
			$response["message"]="User logged.";
		}else{
			$response["state"]="2";
			$response["message"]="Invalid credentials.";
		}
	}else{
		$response["state"]="0";
		$response["message"]="No credetials send.";
	}
	print(json_encode($response));
?>