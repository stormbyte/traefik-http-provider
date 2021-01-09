<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/contenttype/
 */
class Contenttype extends MiddlewareAbstract
{
    protected string $middlewareName = 'contentType';
    protected array $middlewareOptions = ['autoDetect'];

    protected function setAutoDetect(bool $value)
    {
        return $value;
    }
}
