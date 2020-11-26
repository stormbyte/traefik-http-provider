<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/redirectregex/
 */
class Redirectregex extends MiddlewareAbstract
{
    protected string $middlewareName = 'redirectRegex';
    protected array $middlewareOptions = ['regex', 'replacement', 'permanent'];

    protected function setPermanent(bool $value)
    {
        return $value;
    }
}
