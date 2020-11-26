<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/replacepathregex/
 */
class replacepathregex extends MiddlewareAbstract
{
    protected string $middlewareName = 'replacepathregex';
    protected array $middlewareOptions = ['regex', 'replacement'];
}
