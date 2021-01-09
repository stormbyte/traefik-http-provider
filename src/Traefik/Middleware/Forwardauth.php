<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/forwardauth/
 */
class Forwardauth extends MiddlewareAbstract
{
    protected string $middlewareName = 'forwardAuth';
    protected array $middlewareOptions = ['address', 'tls', 'trustForwardHeader', 'authResponseHeaders'];

    protected function setTrustForwardHeader(bool $value)
    {
        return $value;
    }
}
