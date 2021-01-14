<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;
use Traefik\Middleware\Config\AddPrefix as AddPrefixConfig;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/addprefix/
 */
class AddPrefix extends MiddlewareAbstract {
    protected string $middlewareName = 'addPrefix';

    public function __construct(AddPrefixConfig $config) {
        if ($prefix = $config->getPrefix()) {
            $this->middlewareData['prefix'] = $prefix;
        }
    }
}
