# GeocodeApp

## Install

Checkout the repo and run `npm install`.   
In folder `be/` run `composer install`. 

## Backend server

In folder `be/` Run `php -S localhost:8080`.

## Frontend server

Run `ng serve`. Navigate to `http://localhost:4200/`.

## PHP testing

### In folder `be/`:  
For all tests execute `./test.sh`.  
or  
For testing PSR2 standart execute `phpcs --standard=PSR2 --ignore=*/vendor/* .`  
For unit tests execute `./vendor/bin/phpunit ./tests`  
