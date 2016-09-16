<?php
	/* Access credentials */
		$user="admin";
		$password="admin";

	/* Json responses */
		$state="state";
		$message="message";

	/* Json responses values */
		$invalidCredentials=2;
		$invalidCredentialsMessage="Invalid Credentials";
		$noCredetialsSend=0;
		$noCredetialsSendMessage="No credentials send";
		$userLogged=1;
		$userLoggedMessage="User logged";

	/* Post data */
		$appUser="app_user";
		$appPassword="app_password";
		$pin="pin";
		$pinState="state";

	/* Url */
		$getSystemInfoUrl="sudo python /var/www/html/RPiGpioController/pyton/getSystemInfo.py";
		$readUrl="sudo python /var/www/html/RPiGpioController/python/read.py";
		$writeUrl="sudo python /var/www/html/RPiGpioController/python/write.py";
		$rebootUrl="sudo python /var/www/html/RPiGpioController/python/reboot.py";
		$shutdownUrl="sudo python /var/www/html/RPiGpioController/python/shutdown.py";
?>