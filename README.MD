# Http Providers for Traefik

This package is meant to provide a easy to use [HTTP provider for Traefik](https://doc.traefik.io/traefik/providers/http/).

The http provider can be set up to update in increments.

In the `docker-compose` folder there is an example setup of a self contained setup with a interval of 5sec updates.
As long as the config is valid json it should update every 5sec.

With this package the config will output a valid json for traefik to read.

## Http

### Service

https://doc.traefik.io/traefik/routing/services/

Add a Http Service to the config
`$config->setHttpService( <my-service>, <backend-url>);`

The return is the HttpService class,
`\Traefik\Http\Service`

With `addServer( <backend-url> )` it's possible to add more backend url's


### Router

https://doc.traefik.io/traefik/routing/routers/

Add a Http Router to the config
`$config->setHttpRouter( <my-router>, <rule>, <my-service> )`

Add the entryPoints with an array
`->setEntryPoints( [ <my-entrypoint> ] )`

Add middlewares with an array
`->setMiddlewares( [ <my-middleware> ] )`

Add tls to enable SSL
`->setTls(true)`


### Middleware

https://doc.traefik.io/traefik/middlewares/overview/

Add a Http Middleware the the config
`$config->addMiddleWare( <my-middleware>, <MiddlewareConfigInterface> )`

Possible classes

- `\Traefik\Middleware\Config\AddPrefix`
- `\Traefik\Middleware\Config\BasicAuth`
- `\Traefik\Middleware\Config\Buffering`
- `\Traefik\Middleware\Config\Chain`
- `\Traefik\Middleware\Config\CircuitBreaker`
- `\Traefik\Middleware\Config\Compress`
- `\Traefik\Middleware\Config\DigestAuth`
- `\Traefik\Middleware\Config\ErrorPage`
- `\Traefik\Middleware\Config\ForwardAuth`
- `\Traefik\Middleware\Config\Headers`
- `\Traefik\Middleware\Config\InFlightReq`
- `\Traefik\Middleware\Config\IpWhiteList`
- `\Traefik\Middleware\Config\PassTLSClientCert`
- `\Traefik\Middleware\Config\RateLimit`
- `\Traefik\Middleware\Config\RedirectRegex`
- `\Traefik\Middleware\Config\RedirectScheme`
- `\Traefik\Middleware\Config\ReplacePath`
- `\Traefik\Middleware\Config\ReplacePathRegex`
- `\Traefik\Middleware\Config\Retry`
- `\Traefik\Middleware\Config\StripPrefix`
- `\Traefik\Middleware\Config\StripPrefixRegex`

## Tcp

### Service

https://doc.traefik.io/traefik/routing/services/#configuring-tcp-services

`$config->setTcpService( <my-service>, <backend-url>)`

### Router

https://doc.traefik.io/traefik/routing/routers/#configuring-tcp-routers

`$config->setTcpRouter( <my-tcp-router>, <rule>, <my-tcp-service> )`
`->setEntryPoints( [ <my-entrypoint> ] )`
`->setTls(true)`

## Udp

### Service

https://doc.traefik.io/traefik/routing/services/#configuring-udp-services

`$config->setUpdService( <my-service>, <backend-url>)`

### Router

https://doc.traefik.io/traefik/routing/routers/#configuring-udp-routers

`$config->setUdpRouter( <my-udp-router>, <rule>, <my-udp-service> )`
`->setEntryPoints( [ <my-entrypoint> ] )`
`->setTls(true)`

## Return config

`echo $config->getJsonConfig()`



## TODO

Support for:
- Root TLS settings
https://doc.traefik.io/traefik/https/tls/
- Full http router TLS settings
  https://doc.traefik.io/traefik/routing/routers/#tls
- Full tcp router TLS settings
  https://doc.traefik.io/traefik/routing/routers/#tls
- Weighted service
  https://doc.traefik.io/traefik/routing/services/#weighted-round-robin-service
- Mirroring service
  https://doc.traefik.io/traefik/routing/services/#mirroring-service
- Service health check
  https://doc.traefik.io/traefik/routing/services/#health-check
- Service sticky sessions
  https://doc.traefik.io/traefik/routing/services/#sticky-sessions
