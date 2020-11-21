<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/stripprefixregex/
 */
class Stripprefixregex  extends MiddlewareAbstract
{
    protected string $middlewareName = 'stripprefixregex';
    protected array $middlewareOptions = ['regex'];
}