<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;
use Traefik\Middleware\Config\Buffering as BufferingConfig;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/buffering/
 */
class Buffering extends MiddlewareAbstract {

    protected string $middlewareName = 'buffering';

    public function __construct(BufferingConfig $config) {
        if ($retryExpression = $config->getRetryExpression()) {
            $this->middlewareData['retryExpression'] = $retryExpression;
        }

        if ($memResponseBodyBytes = $config->getMemResponseBodyBytes()) {
            $this->middlewareData['memResponseBodyBytes'] = $memResponseBodyBytes;
        }

        if ($maxResponseBodyBytes = $config->getMaxResponseBodyBytes()) {
            $this->middlewareData['maxResponseBodyBytes'] = $maxResponseBodyBytes;
        }

        if ($memRequestBodyBytes = $config->getMemRequestBodyBytes()) {
            $this->middlewareData['memRequestBodyBytes'] = $memRequestBodyBytes;
        }

        if ($maxRequestBodyBytes = $config->getMaxRequestBodyBytes()) {
            $this->middlewareData['maxRequestBodyBytes'] = $maxRequestBodyBytes;
        }

    }

}
