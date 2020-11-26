<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/stripprefix/
 */
class Stripprefix  extends MiddlewareAbstract
{
    protected string $middlewareName = 'stripPrefix';
    protected array $middlewareOptions = ['prefixes', 'forceSlash'];

    protected function setForceSlash(bool $value)
    {
        return $value;
    }
}
