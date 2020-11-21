<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/replacepath/
 */
class replacepath extends MiddlewareAbstract
{
    protected string $middlewareName = 'replacepath';
    protected array $middlewareOptions = ['path'];
}