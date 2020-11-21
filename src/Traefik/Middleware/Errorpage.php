<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/errorpages/
 */
class Errorpage extends MiddlewareAbstract
{
    protected string $middlewareName = 'errors';
    protected array $middlewareOptions = ['status','service','query'];

    protected function setRemoveHeader( bool $value )
    {
        return $value;
    }
}