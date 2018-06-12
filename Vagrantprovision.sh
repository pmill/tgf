#!/usr/bin/env bash
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update

# Install MySQL
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
sudo apt-get -y install mysql-server

# Install everything else
sudo apt-get -y install apache2 php7.2 php7.2-mysql php7.2-apcu
sudo rm -r /var/www/html
sudo ln -s /vagrant/www /var/www/html
sudo a2enmod rewrite
sudo cp /vagrant/virtual-host.conf /etc/apache2/sites-available/000-default.conf
sudo service apache2 restart

# Add the correct bind address to Mysql
cp /vagrant/my.cnf /etc/mysql/
sudo service mysql restart

# Run the SQL scripts to provision
sudo mysql -u root -proot < /vagrant/Vagrantprovision.sql
