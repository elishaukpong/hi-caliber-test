# Property Listing Project


## Setup Instructions

### First Time

- Clone the repo to your local machine.
- CD into the project folder
- Ensure you have docker installed on your laptop.
- run `cp .env.example .env`
- run `docker-compose up -d` and allow to set up containers, this will power up the application on `localhost:81`
- run `docker exec -it php-srv /bin/bash`
- run `cd html/hi-caliber && composer install`
- run `php artisan key:generate` 
- run `php artisan migrate:fresh --seed`
- run `sudo npm install`
- run `sudo npm run build`
- That's it

### Subsequently
- run `docker-compose up -d` and allow to set up containers, this will power up the application on `localhost:81`

NB: If you are having conflicting ports error, check your `.env` file and change ports for conflicting services`

## Tests

There are some test cases in the project and this can be run as below:

- Ensure containers are running already as was setup in `setup instructions` section
- run `docker exec -it php-srv /bin/bash`
- run `cd html/hi-caliber && php artisan test`