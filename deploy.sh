#!/bin/bash
cd /var/www/fw_sisseg

#git pull origin marcelo
git pull

#composer update --optimize-autoloader --no-dev

#php artisan config:cache

#php artisan route:cache

cp -R /var/www/fw_sisseg/public /var/www/html/sisseg/
cp -R /var/www/fw_sisseg/public/build /var/www/html/sisseg/
cp -R /var/www/fw_sisseg/public/css /var/www/html/sisseg/
cp -R /var/www/fw_sisseg/public/datatables /var/www/html/sisseg/
cp -R /var/www/fw_sisseg/public/images /var/www/html/sisseg/
cp -R /var/www/fw_sisseg/public/js /var/www/html/sisseg/
cp -R /var/www/fw_sisseg/public/vendors /var/www/html/sisseg/

#/etc/init.d/apache2 restart

