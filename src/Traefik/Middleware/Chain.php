<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/chain/
 */
class Chain extends MiddlewareAbstract
{
    protected string $middlewareName = 'chain';
    protected array $middlewareOptions = ['middlewares'];
}