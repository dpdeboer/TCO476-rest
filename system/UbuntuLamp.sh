# https://www.linode.com/docs/websites/lamp/lamp-on-ubuntu-14-04
#
#  run this by calling 
#    curl --silent  "https://raw.githubusercontent.com/rbwatson/TCO476-rest/master/system/UbuntuLamp.sh" | sudo sh
#
#	then perform the manual commands aafter the script completes
#
# update the existing software
apt-get -y update 
#
# 	install apache2
apt-get install -y apache2
#
#	Configure apache
#
# edit /etc/apache2/apache2.conf
#  Replace:
#    KeepAlive On
#  with 
#    KeepAlive Off
# ------------------
#
sed -i -E 's/KeepAlive(\s)+On/KeepAlive Off/g'  /etc/apache2/apache2.conf
#
#  replace /etc/apache2/mods-available/mpm_prefork.conf with:
cat - > /etc/apache2/mods-available/mpm_prefork.conf <<PREFORK_CONF

# prefork MPM
# StartServers: number of server processes to start
# MinSpareServers: minimum number of server processes which are kept spare
# MaxSpareServers: maximum number of server processes which are kept spare
# MaxRequestWorkers: maximum number of server processes allowed to start
# MaxConnectionsPerChild: maximum number of requests a server process serves

<IfModule mpm_prefork_module>
        StartServers             4
        MinSpareServers          20
        MaxSpareServers          40
        MaxRequestWorkers        200
        MaxConnectionsPerChild   4500
</IfModule>

# vim: syntax=apache ts=4 sw=4 sts=4 sr noet

PREFORK_CONF
# -----------
a2dismod mpm_event
a2enmod mpm_prefork
# 	restart apache to pick up changes
service apache2 restart
#
#	Install mysql
apt-get install -y mysql-server
#
#
#	Install PHP
apt-get install -y php5 php-pear php5-dev libapache2-mod-php5 php5-cli php5-common php5-json php5-readline libapache2-mod-php5 php-pear php5 php5-cli php5-common php5-json php5-readline 
#
#
mkdir /var/log/php
chown www-data /var/log/php
#
#	create PHP info file
#++++
#  Create phpinfo page
#----
echo "Creating PHP info page"
cat - > /var/www/html/phpinfo.php <<PHPINFOTEXT
<?php
phpinfo();
?>
PHPINFOTEXT
#
service apache2 restart
#
#
#
# ------------------------------------------
#
# 	post install 
#     	These are interactive: run the lines that start with the #> from the command prompt
#
#> mysql_secure_installation
#---
#
#> sudo apt-get install -y phpmyadmin
#---
#> sudo nano /etc/php5/apache2/php.ini
#
#  update configuration parameters as needed. e.g.
#   display_errors = On
#   error_reporting = E_COMPILE_ERROR|E_RECOVERABLE_ERROR|E_ERROR|E_CORE_ERROR
#   error_log = /var/log/php/error.log
#   max_input_time = 30
#   memory_limit = 1024M
#---
#> sudo nano /etc/apache2/apache2.conf
#	add these two lines to the end of the file
#
# # phpmyadmin configuration
# Include /etc/phpmyadmin/apache.conf
#
# 	restart Apache
#> sudo service apache2 restart
#
echo Run the interactive commands to finish the installation
echo \> mysql_secure_installation
echo \> sudo apt-get install -y phpmyadmin
echo \> sudo nano /etc/php5/apache2/php.ini
echo \> sudo nano /etc/apache2/apache2.conf
echo \> sudo service apache2 restart
#finished