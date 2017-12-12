Getting Started

Clone Repo

git clone https://github.com/Alimantado/more-corp.git
Create Database

Cd project and run composer install and npm install

cd more-corp
composer install
npm install

Add .env file to root directory.

Example:
see .env.example file

Migrate tables
php artisan migrate

Seed tables

php artisan db:seed
Start Server

php artisan serve
Navigate to

localhost:8000

Create the mailtrap account and use the creadential on this project to get the email running
