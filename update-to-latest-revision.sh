git pull --rebase
npm install
bower install --allow-root
php composer.phar install
rm -r www/assets/*
app/yiic migrate
app/yiic authorizationhierarchy reset
app/yiic authorizationhierarchy build
echo "Script finished. Don't forget to synchronize the db schema using MySQL Workbench"
