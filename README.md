
## Simple Laravel and Vuejs Portfolio

Download and set in htdocs directory

composer install

npm install


Rename the .env.example to .env and connect the database

after connect database run 

php artisan migrate:fresh --seed

php artisan config:cache
php artisan view:clear
php artisan cache:clear

composer dump-autoload

url: http://localhost/project/public/

boom!
