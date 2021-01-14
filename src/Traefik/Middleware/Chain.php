<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;
use Traefik\Middleware\Config\Chain as ChainConfig;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/chain/
 */
class Chain extends MiddlewareAbstract {
    protected string $middlewareName = 'chain';

    public function __construct(ChainConfig $config) {
        if ($middlewares = $config->getMiddlewares()) {
            $this->middlewareData['middlewares'] = $middlewares;
        }

    }
}
