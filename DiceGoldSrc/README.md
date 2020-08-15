<p align="center"><img src="https://dicegold.com/images/logo.png" width="400"></p>

## About DiceGold

DiceGold is a web application for dice game

## Install

- Clone repository <br>
    `git clone`
- Install composer dependencies <br>
    `composer install`
- Install NodeJS dependencies <br>
    `npm install`
- Configure database
    - rename '.env.example' to '.env' at DiceGold directory.
    - configure database host, port, database, username, password etc.
- Migrate database <br>
    `php artisan migrate` <br>
    To migrate specific file <br>
    `php artisan migrate --path=/database/migrations/2020_07_09_003948_create_messages_table.php` <br>
    To rollback migration <br>
    `php artisan migrate:rollback --step=1`
- Build assets <br>
    `npm run public | npm run dev`
- Install Redis Cache Server <br>
    \- Prerequisites
    - CentOS/RHEL 7 <br>
    `yum install epel-release`    
    - CentOS/RHEL 6 <br>
    `rpm -Uvh http://download.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm`<br>
    \- Install Redis <br>
    `yum install redis` <br>
    \- Install Redis PHP extension <br>
         **Copy and paste the entire block into SSH, don't do line by line.**
         ```bash
             for phpver in $(whmapi1 php_get_installed_versions|grep -oE '\bea-php.*') ; do
             cd ~
             wget -O redis.tgz https://pecl.php.net/get/redis
             tar -xvf redis.tgz
             cd ~/redis* || exit
             /opt/cpanel/"$phpver"/root/usr/bin/phpize
             ./configure --with-php-config=/opt/cpanel/"$phpver"/root/usr/bin/php-config
             make clean && make install
             echo 'extension=redis.so' > /opt/cpanel/"$phpver"/root/etc/php.d/redis.ini
             rm -rf ~/redis*
             done
             
             /scripts/restartsrv_httpd
             /scripts/restartsrv_apache_php_fpm
         ```
        All done! Check to make sure the PHP extension is loaded in each version of PHP:
        Copy and paste the entire block into SSH, don't do line by line.
        ```bash
            for phpver in $(whmapi1 php_get_installed_versions|grep -oE '\bea-php.*') ; do
            echo "PHP $phpver" ; /opt/cpanel/"$phpver"/root/usr/bin/php -i |grep "Redis Support"
            done
        ```
     
- Install Laravel Echo Server <br>
    `npm install -g laravel-echo-server`
- Start Laravel Echo Server <br>
    `sh laravel-echo-start.sh`

## Developing references

- **[Laravel Broadcast Redis Socket io Tutorial](https://www.itsolutionstuff.com/post/laravel-broadcast-redis-socket-io-tutorial-example.html)**


## Issues
- compoer memory overflow error <br>
linux: `php -d memory_limit=-1 "/opt/cpanel/composer/bin/composer" require predis/predis` <br>
windows: `php -d memory_limit=-1 "C:/ProgramData/ComposerSetup/bin/composer.phar" require laravel/sanctum`
- Open redis and laravel echo server port
  - install ConfigServer Firewall plugin to WHM <br>
     `cd /usr/src`<br>
     `rm -fv csf.tgz` <br>
     `wget https://download.configserver.com/csf.tgz` <br>
     `tar -xzf csf.tgz` <br>
     `cd csf` <br>
     `sh install.sh` <br>
  - Login to WHM and go to “ConfigServer Security & Firewall” which is under the “Plugins” section
  - Go to "Firewall Configuration"
  - Add port number to TCP_IN, TCP_OUT

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
