<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/replacepathregex/
 */
class Replacepathregex extends MiddlewareAbstract
{
    protected string $middlewareName = 'replacePathRegex';
    protected array $middlewareOptions = ['regex', 'replacement'];
}
