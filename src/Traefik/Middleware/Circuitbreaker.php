<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/circuitbreaker/
 */
class Circuitbreaker extends MiddlewareAbstract
{
    protected string $middlewareName = 'circuitBreaker';
    protected array $middlewareOptions = ['expression'];
}
