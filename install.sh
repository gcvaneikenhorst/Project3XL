#Usage 'sh install.sh'
<<<<<<< HEAD
#Or wget -qO- https://raw.githubusercontent.com/rubenlievense/Project3XL/master/install.sh | sh
=======
>>>>>>> fb40c47a22e4896c01c5dbaadd7e25ecd4f29130

#Warning! sudo might not be needed. If they give you trouble remove them and try again.

echo "What is the database name?"
read databasename
echo "What is the username for the database?"
read databaseusername
echo "What is the password for the database?"
read databasepassword
echo "What is the public folder called?"
read publicfolder

# apt-get might not be needed.
sudo apt-get install git
sudo apt-get install composer
sudo apt-get install zip

git clone https://github.com/rubenlievense/Project3XL tmp
sudo mv tmp/* .

configfile=""
configfilename="configexample"
while read -r line
do
        configfile="$configfile\n$line"
done < "$configfilename"

configfile="$configfile\nDB_DATABASE=$databasename"
configfile="$configfile\nDB_USERNAME=$databaseusername"
configfile="$configfile\nDB_PASSWORD=$databasepassword"

echo $configfile > '.env'
sudo composer install
<<<<<<< HEAD
echo 'Please set the permissions properly (chown -R <group> ./) and type exit when you\'re done'
=======
echo "Please set the permissions properly (chown -R <group> ./) and type exit when you're done"
>>>>>>> fb40c47a22e4896c01c5dbaadd7e25ecd4f29130
sh
#sudo chown -R www-data ./
#sudo chmod -R 755 ./
#sudo chmod -R o+w storage
#sudo chmod -R o+w bootstrap
sudo php artisan command:initialize_database
sudo php artisan command:create_admin
sudo php artisan key:generate
sudo mv public $publicfolder
currentDir=$(pwd)

crontab -l > _mycron
echo "* * * * * php $currentDir/artisan schedule:run" >> _mycron
crontab _mycron