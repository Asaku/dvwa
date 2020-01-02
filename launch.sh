apt install -y php7.3-xml cupp


service apache2 start
service mysql start

mysql -uroot -proot -e "create database dvwa;"
mysql -uroot -proot -e "CREATE USER 'dvwa'@'127.0.0.1' IDENTIFIED BY 'dvwa';"
mysql -uroot -proot -e "grant all on dvwa.* to 'dvwa'@'127.0.0.1';"
mysql -uroot -proot -e "flush privileges;"

mysql -uroot -proot -e "create database bWAPP;"
mysql -uroot -proot -e "CREATE USER 'bee'@'localhost' IDENTIFIED BY 'bug';"
mysql -uroot -proot -e "grant all on bWAPP.* to 'bee'@'localhost';"
mysql -uroot -proot -e "flush privileges;"


git clone https://github.com/mehdiAberkane/dvwa.git /var/www/html/dvwa
git clone https://github.com/mehdiAberkane/bwapp.git /var/www/html/bwapp

