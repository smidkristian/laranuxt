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
	chown -R www-data:www-data .
	exit
6. go to src/laravelapp:
	sudo chown -R $USER .
		- I am not sure why but this set of permissions is safe and works
