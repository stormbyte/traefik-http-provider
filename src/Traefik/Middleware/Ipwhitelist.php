<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/ipwhitelist/
 */
class Ipwhitelist extends MiddlewareAbstract
{
    protected string $middlewareName = 'ipWhiteList';
    protected array $middlewareOptions = ['sourceRange'];
}