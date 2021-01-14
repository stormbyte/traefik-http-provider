<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;
use Traefik\Middleware\Config\RateLimit as RateLimitConfig;

/**
 * @link https://doc.traefik.io/traefik/v2.3/middlewares/ratelimit/
 */
class RateLimit extends MiddlewareAbstract {
    protected string $middlewareName = 'rateLimit';

    public function __construct(RateLimitConfig $config) {
        if ($average = $config->getAverage()) {
            $this->middlewareData['average'] = $average;
        }
        if ($period = $config->getPeriod()) {
            $this->middlewareData['period'] = $period;
        }
        if ($burst = $config->getBurst()) {
            $this->middlewareData['burst'] = $burst;
        }
        if ($sourceCriterion = $config->getSourceCriterion()) {
            $this->middlewareData['sourceCriterion'] = $sourceCriterion->getData();
        }
    }
}
