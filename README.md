# Property Listing Project


## Setup Instructions

- Clone the repo to your local machine.
- Ensure you have docker installed on your laptop.
- Run `docker-compose up -d` and allow to set up containers, this will power up the application on `localhost:81`
- run `docker exec -it php-srv /bin/bash`
- run `cd html/hi-caliber && php artisan migrate --seed`
- run `sudo npm install && sudo npm run build`
- That's it

## Tests

There are some test cases in the project and this can be run as below:

- Ensure containers are running already as was setup in `setup instructions` section
- run `docker exec -it php-srv /bin/bash`
- run `cd html/hi-caliber && php artisan test`