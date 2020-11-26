<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/circuitbreaker/
 */
class Circuitbreaker extends MiddlewareAbstract
{
    protected string $middlewareName = 'circuitbreaker';
    protected array $middlewareOptions = ['expression'];
}
