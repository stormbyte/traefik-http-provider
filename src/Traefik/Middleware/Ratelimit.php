<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/ratelimit/
 */
class Ratelimit extends MiddlewareAbstract
{
    protected string $middlewareName = 'rateLimit';
    protected array $middlewareOptions = ['average', 'period', 'burst', 'sourceCriterion'];
}
