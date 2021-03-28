# run it yourself

1. open docker-compose file and define mysql environment to match your laravel .env environment
2. open Dockerfile:
	choose PHP version
3. install your laravel app to backend/
4. install your nuxt app to frontend/
5. docker-compose up -d --build
6. interact with services through docker-compose run --rm command - for example: docker-compose run --rm artisan migrate - to run migrations

# authtentication installation

## backend

install laravel sanctum https://laravel.com/docs/8.x/sanctum

you can see in <code>config/sanctum</code> that it needs to have a <code>SANCTUM_STATEFUL_DOMAINS</code> to work, set it in <code>.env</code> to <code>localhost:3000</code>, which is a default port for a nuxt app in the development

when there, set <code>SESSION_DOMAIN</code> to localhost, you can see in <code>config/session</code> that it needs to be set so that a session could be identified

create a user so that you can log-in 

install laravel fortify to handle your login, registration, logout and other routes https://laravel.com/docs/8.x/fortify

check if the <code>App\Providers\FortifyServiceProvider::class</code> was added in <code>config/app</code> Application Service Providers, usually it does not happen

disable <code>'views'</code> in <code>config/fortify</code>, those the SPA will handle

when you are there, check which <code>'features'</code> you want to use

go to <code>config/cors</code> and define the <code>'paths'</code> you will use, like 'login', 'register' and so on,
also, very important part, set <code>'supports_credentials'</code> to <code>true</true>, that ensures that the Access-Control-Allow-Credentials header is set to true, read more about it https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Credentials

when you are authenticated, laravel by default wants to send you to /home, change it in <code>RedirectIfAuthenticated</code>, put there something like <code>response()->json('Authenticated', 200)</code>, then you can later check the status in your SPA and push a route you wish

that should be all for the api so far

## frontend



