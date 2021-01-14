<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\CircuitBreaker as CircuitBreakerConfig;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/circuitbreaker/
 */
class CircuitBreaker extends MiddlewareAbstract {
    protected string $middlewareName = 'circuitBreaker';

    public function __construct(CircuitBreakerConfig $config) {
        if ($expression = $config->getExpression()) {
            $this->middlewareData['expression'] = $expression;
        }

    }
}
