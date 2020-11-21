<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/retry/
 */
class Retry extends MiddlewareAbstract
{
    protected string $middlewareName = 'retry';
    protected array $middlewareOptions = ['attempts'];

    protected function setAttempts( int $value )
    {
        return $value;
    }
}