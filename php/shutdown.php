<?php
        $isset_user=isset($_POST["app_user"]);
        $isset_password=isset($_POST["app_password"]);
        $response=array();
        if($isset_user&&$isset_password){
                $valid_user=$_POST["app_user"]=="danny";
                $valid_password=$_POST["app_password"]=="270793";
                if($valid_user&&$valid_password){
                        $response=exec("sudo python /var/www/html/RPiGpioController/pyton/shutdown.py");
                }else{
                        $response["state"]="2";
                        $response["message"]="Invalid credentials.";
                        print(json_encode($response));
                }
        }else{
                $response["state"]="0";
                $response["message"]="No credetials send.";
                print(json_encode($response));
        }
?>
