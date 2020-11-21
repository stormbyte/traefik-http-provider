<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/buffering/
 */
class Buffering extends MiddlewareAbstract
{

    protected string $middlewareName = 'buffering';
    protected array $middlewareOptions = ['maxRequestBodyBytes','memRequestBodyBytes','maxResponseBodyBytes','memResponseBodyBytes','retryExpression'];

    protected function setMaxRequestBodyBytes(int $value): int
    {
        return $value;
    }
    
    protected function setMemRequestBodyBytes(int $value): int
    {
        return $value;
    }
    
    protected function setMaxResponseBodyBytes(int $value): int
    {
        return $value;
    }
    
    protected function setMemResponseBodyBytes(int $value): int
    {
        return $value;
    }
}