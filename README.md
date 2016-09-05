# RPi Gpio Controller
![RPi Gpio Controller logo](http://vignette4.wikia.nocookie.net/minecraftpe/images/c/c0/Raspberry_Pi_logo.png/revision/latest?cb=20141028163023&path-prefix=es)

Project description:

 * Get the information of your Raspberry Pi.
 * Check and control the Raspberry Pi from your Android device.
 * Shutdown and reboot it remotely.

First we have to make some configurations on the Raspberry Pi.

## Prepare Raspberry
Update all the Raspberry libraries
```bash
sudo apt-get update -y && sudo apt-get upgrade -y
```

## Install web server
It must run will any web server, but I prefer Apache.
```bash
sudo apt-get install apache2
```

## Install PHP
The web server language that controls the host petitions.
```bash
sudo apt-get install php5
sudo apt-get install libapache2-mod-php5 libapache2-mod-perl2 php5 php5-cli php5-common php5-curl php5-dev php5-gd php5-imap php5-ldap php5-mhash php5-mysql php5-odbc
```

## Create groups and modify permissions
We need execute some instructions from a http petition, so is required that the user www-data can execute bash commands from PHP script.
```
sudo chown www-data:www-data /var/www/
sudo chmod 775 /var/www/
sudo usermod -a -G www-data pi
```

## Creates the new user
```
sudo visudo
```
At the end of the file opened add the next line:
* www-data ALL=(root) NOPASSWD:ALL

And restart the server
```
sudo /etc/init.d/apache2 restart
```

## Download code
Install git and clone the repository
```
sudo apt-get install git
cd /var/www/html
sudo git clone https://github.com/danny270793/RPiGpioController.git
cd RPiGpioController
```

## Configure credentials
Change the access credentials
```
sudo nano php/info.php
```
```php
<?php
	$user="admin";
	$password="admin";
    ...
```
## Test the Android application
* Download [RPi Gpio Controller](https://play.google.com/store/apps/details?id=com.danny270793.rpigpiocontroller2) from the google play store.
* Login with your Raspberry IP address and the credentials previously configured.
* See your Raspberry Pi information.
* Shutdown and reboot your Raspberry remotely
* Control the GPIO pins.

## Follow me
* [Facebook](https://www.facebook.com/danny.vaca.9655)
* [Instagram](https://www.instagram.com/danny27071993/)
* [Youtube](https://www.youtube.com/channel/UC5MAQWU2s2VESTXaUo-ysgg)
* [Github](https://github.com/danny270793/)

## Version
RPiGpioController version 2.4.9<br> 
Last update 04/09/2016 
