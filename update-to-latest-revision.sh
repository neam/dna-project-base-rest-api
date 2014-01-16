git pull
php composer.phar install
rm -r www/assets/*
app/yiic migrate
app/yiic authorizationhierarchy reset
app/yiic authorizationhierarchy build
echo "Synchronize db schema using MySQL Workbench"
