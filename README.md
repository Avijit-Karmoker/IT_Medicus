first run this command-> composer update

then rename file .env.example to .env

run this command-> php artisan key:generate

then run this command-> run npm install (for laravel breeze auth system)

set a database name into .env file and create a same name database in mysql database (localhost/phpmyadmin)

then run this command-> php artisan migrate (migrate table in database)

then run this command-> php artisan db:seed

then run this command-> php artisan db:seed --class=UserSeeder (seed admin email: admin@gmail.com & password: password into database)

then run this command-> npm run dev (always run this command for laravel breeze ui)

then run this command-> php artisan ser (for run laravel project)

