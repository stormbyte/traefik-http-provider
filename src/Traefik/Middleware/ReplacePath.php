<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\ReplacePath as ReplacePathConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/replacepath/
 */
class ReplacePath extends MiddlewareAbstract {
    protected string $middlewareName = 'replacePath';

    public function __construct(ReplacePathConfig $config) {

        if ($path = $config->getPath()) {
            $this->middlewareData['path'] = $path;
        }

    }
}
