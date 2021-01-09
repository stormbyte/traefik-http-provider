<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/passtlsclientcert/
 */
class Passtlsclientcert extends MiddlewareAbstract
{
    protected string $middlewareName = 'passTLSClientCert';
    protected array $middlewareOptions = ['pem', 'info'];
}
