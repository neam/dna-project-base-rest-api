set -x
git pull --rebase
./_provision.sh
echo "Script finished. Don't forget to synchronize the db schema using MySQL Workbench"
