# Http Providers for Traefik

Start with a new config
`$config = new \Traefik\Config();`


## Http

### Service

Add a Http Service to the config
`$config->setHttpService( <my-service>, <backend-url>);`

The return is the HttpService class,
`\Traefik\Http\Service`

With `addServer( <backend-url> )` it's possible to add more backend url's


### Router

Add a Http Router to the config
`$config->setHttpRouter( <my-router>, <rule>, <my-service> )`

Add the entryPoints with an array
`->setEntryPoints( [ <my-entrypoint> ] )`

Add middlewares with an array
`->setMiddlewares( [ <my-middleware> ] )`

Add tls to enable SSL
`->setTls(true)`


### Middleware

Add a Http Middleware the the config
`$config->setMiddleWare( <my-middleware>, <MiddlewareInterface> )`

Possible classes 

- `\Traefik\Middleware\Addprefix`
- `\Traefik\Middleware\Basicauth`
- `\Traefik\Middleware\Buffering`
- `\Traefik\Middleware\Chain`
- `\Traefik\Middleware\Circuitbreaker`
- `\Traefik\Middleware\Compress`
- `\Traefik\Middleware\Digestauth`
- `\Traefik\Middleware\Errors`
- `\Traefik\Middleware\Forwardauth`
- `\Traefik\Middleware\Headers`
- `\Traefik\Middleware\Ipwhitelist`
- `\Traefik\Middleware\Inflightreq`
- `\Traefik\Middleware\Passtlsclientcert`
- `\Traefik\Middleware\Ratelimit`
- `\Traefik\Middleware\Redirectscheme`
- `\Traefik\Middleware\Redirectregex`
- `\Traefik\Middleware\Replacepath`
- `\Traefik\Middleware\Replacepathregex`
- `\Traefik\Middleware\Retry`
- `\Traefik\Middleware\Stripprefix`
- `\Traefik\Middleware\Stripprefixregex`

## Tcp

### Service

`$config->setTcpService( <my-service>, <backend-url>)`

### Router

`$config->setTcpRouter( <my-tcp-router>, <rule>, <my-tcp-service> )`
`->setEntryPoints( [ <my-entrypoint> ] )`
`->setTls(true)`

## Udp

### Service

`$config->setUpdService( <my-service>, <backend-url>)`

### Router

`$config->setUdpRouter( <my-udp-router>, <rule>, <my-udp-service> )`
`->setEntryPoints( [ <my-entrypoint> ] )`
`->setTls(true)`

## Return config

`echo $config->getJsonConfig()`
