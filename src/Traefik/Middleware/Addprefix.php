<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/addprefix/
 */
class Addprefix extends MiddlewareAbstract
{
    protected string $middlewareName = 'addPrefix';
    protected array $middlewareOptions = ['prefix'];
}
