#!/usr/bin/env bash
sudo apt-get update >/dev/null 2>&1
echo "Installing MySQL..."
	echo 'mysql-server-5.1 mysql-server/root_password password vagrant' | debconf-set-selections
	echo 'mysql-server-5.1 mysql-server/root_password_again password vagrant' | debconf-set-selections
	apt-get -y install mysql-client mysql-server >/dev/null 2>&1
	mysqladmin -u root --password=vagrant password ''

#echo "Installing Sendmail..."
#	apt-get -y install sendmail

echo "Installing Apache2..."
	apt-get -y install apache2 >/dev/null 2>&1

echo "Installing PHP5 support..."	 
	apt-get -y install php5 libapache2-mod-php5 php5-mysql >/dev/null 2>&1
	wget http://pear.php.net/go-pear.phar  >/dev/null 2>&1
	php go-pear.phar  >/dev/null 2>&1

echo "Setting Apache..."
	# Enable mod_rewrite	
	a2enmod rewrite >/dev/null 2>&1

	# Allow .htaccess
	sed "s/AllowOverride None/AllowOverride All/g" /etc/apache2/sites-enabled/000-default > /tmp/000-default
	cp /tmp/000-default /etc/apache2/sites-enabled/000-default

	# Add www-data to vagrant group
	usermod -a -G vagrant www-data >/dev/null 2>&1

	# Restart services
	/etc/init.d/apache2 restart >/dev/null 2>&1

echo "Installing git..."	 
	apt-get -y install git >/dev/null 2>&1

echo "Setting unitary tests..."
	mysqladmin -u root create myapp_test >/dev/null 2>&1
	apt-get -y install php-pear >/dev/null 2>&1
	pear config-set auto_discover 1 >/dev/null 2>&1
	pear install pear.phpunit.de/PHPUnit >/dev/null 2>&1	
	pear install phpunit/PHPUnit >/dev/null 2>&1
	cd /vagrant
	./tools/install-wordpress.sh  >/dev/null 2>&1

