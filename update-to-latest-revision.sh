set -x
git pull --rebase
npm install
bower install --allow-root
php composer.phar install
rm -r www/assets/*
chown -R www-data:www-data app/data/
chown -R www-data:www-data app/runtime/
chown -R www-data:www-data www/assets/
chown -R www-data:www-data www/runtime/
chmod -R g+rw app/data/
chmod -R g+rw app/runtime/
chmod -R g+rw www/assets/
chmod -R g+rw www/runtime/
app/yiic migrate
app/yiic authorizationhierarchy reset
app/yiic authorizationhierarchy build
app/yiic databaseviewgenerator item
app/yiic fixture load
echo "Script finished. Don't forget to synchronize the db schema using MySQL Workbench"
