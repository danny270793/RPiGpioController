<?php
        require_once("info.php");
        $isset_user=isset($_POST[$appUser]);
	$isset_password=isset($_POST[$appPassword]);
        $isset_pin=isset($_POST[$pin]);
        $response=array();
        if($isset_user&&$isset_password&&$isset_pin){
                $valid_user=$_POST[$appUser]==$user;
                $valid_password=$_POST[$appPassword]==$password;
                if($valid_user&&$valid_password){
                        $pinNumber=$_POST[$pin];
                        $response=exec($readUrl." ".$pinNumber);
                }else{
                        $response[$state]=$invalidCredentials;
			$response[$message]=$invalidCredentialsMessage;
                        print(json_encode($response));
                }
        }else{
                $response[$state]=$noCredetialsSend;
                $response[$message]=$noCredetialsSendMessage;
                print(json_encode($response));
        }
?>
