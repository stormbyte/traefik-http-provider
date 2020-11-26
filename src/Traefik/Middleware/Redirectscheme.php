<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/redirectscheme/
 */
class Redirectscheme extends MiddlewareAbstract
{
    protected string $middlewareName = 'redirectScheme';
    protected array $middlewareOptions = ['scheme', 'port', 'permanent'];

    protected function setPermanent(bool $value)
    {
        return $value;
    }
}
