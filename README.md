1. open docker-compose file and define: 
	mysql environment
	php working_dir
2. open Dockerfile:
	choose PHP version
	decide if you want to install Composer
3. open nginx/default.conf:
	define root directory based on your laravel app name
4. install your laravel app to src/ 
5. run - docker exec php sh - and set permissions:
	chown -R $USER:www-data .
