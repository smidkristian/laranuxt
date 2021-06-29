
### authtentication installation

#### backend

install laravel sanctum https://laravel.com/docs/8.x/sanctum

you can see in `config/sanctum` that it needs to have a `SANCTUM_STATEFUL_DOMAINS` to work, set it in `.env` to `localhost:3000`, which is a default port for a nuxt app in the development

when there, set `SESSION_DOMAIN` to localhost, you can see in `config/session` that it needs to be set so that a session could be identified

create a user so that you can log-in 

install laravel fortify to handle your login, registration, logout and other routes https://laravel.com/docs/8.x/fortify

check if the `App\Providers\FortifyServiceProvider::class` was added in `config/app` Application Service Providers, usually it does not happen

disable `'views'` in `config/fortify`, those will handle Nuxt.js

when you are there, check which `'features'` you want to use

go to `config/cors` and define the `'paths'` you will use, like 'login', 'register' and so on,
also, very important part, set `'supports_credentials'` to `true`, that ensures that the Access-Control-Allow-Credentials header is set to true, read more about it https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Credentials

when you are authenticated, laravel by default wants to send you to /home, change it in `RedirectIfAuthenticated`, put there something like `response()->json('Authenticated', 200)`, then you can later check the status in your SPA and push a route you wish

that should be all for the api so far







