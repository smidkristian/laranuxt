## run it

1. open `docker-compose` file and define mysql environment to match your laravel `.env` environment
2. `docker-compose up -d --build`
3. interact with services through `docker-compose run --rm` command - for example: `docker-compose run --rm composer install` to install php dependencies
