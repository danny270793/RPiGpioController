<?php
        require_once("info.php");
        $isset_user=isset($_POST["app_user"]);
        $isset_password=isset($_POST["app_password"]);
        $isset_pin=isset($_POST["pin"]);
        $isset_state=isset($_POST["state"]);
        $response=array();
        if($isset_user&&$isset_password&&$isset_pin&&$isset_state){
                $valid_user=$_POST["app_user"]==$user;
                $valid_password=$_POST["app_password"]==$password;
                if($valid_user&&$valid_password){
                        $pin=$_POST["pin"];
                        $state=$_POST["state"];
                        $response=exec("sudo python /var/www/html/RPiGpioController/pyton/write.py ".$pin." ".$state);
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
