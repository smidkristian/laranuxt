1. open docker-compose file and define mysql environment to match your laravel .env environment
2. open Dockerfile:
	choose PHP version
3. install your laravel app to backend/
4. install your nuxt app to frontend/
5. docker-compose up -d --build
6. interact with services through docker-compose run --rm command - for example: docker-compose run --rm artisan migrate - to run migrations