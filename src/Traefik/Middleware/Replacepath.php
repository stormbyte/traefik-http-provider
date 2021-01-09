<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/replacepath/
 */
class Replacepath extends MiddlewareAbstract
{
    protected string $middlewareName = 'replacePath';
    protected array $middlewareOptions = ['path'];
}
