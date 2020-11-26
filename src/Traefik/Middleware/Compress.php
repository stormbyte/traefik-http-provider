<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/compress/
 */
class Compress extends MiddlewareAbstract
{
    protected string $middlewareName = 'compress';
    protected array $middlewareOptions = ['excludedContentTypes'];
}
