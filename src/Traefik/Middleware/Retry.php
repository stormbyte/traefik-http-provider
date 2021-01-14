<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\Retry as RetryConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/retry/
 */
class Retry extends MiddlewareAbstract {
    protected string $middlewareName = 'retry';

    public function __construct(RetryConfig $config) {

        if ($attempts = $config->getAttempts()) {
            $this->middlewareData['attempts'] = $attempts;
        }
    }
}
