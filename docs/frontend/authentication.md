### authtentication installation

#### frontend

install npm dependencies `@nuxtjs/auth-next` and `@nuxtjs/axios`

include them in `nuxt.config.js` modules 

then add `auth` object to `nuxt.config.js` and set its `strategies` to `'laravelSanctum'`

this strategy needs to have a `provider` which is `'laravel/sanctum'` and `url` of the Laravel API you are using set up

after this add `axios` object with `baseUrl` which is the Laravel API again and `credentials` set to `true`