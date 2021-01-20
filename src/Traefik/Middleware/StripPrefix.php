<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\StripPrefix as StripPrefixConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/stripprefix/
 */
class StripPrefix extends MiddlewareAbstract {
    protected string $middlewareName = 'stripPrefix';

    public function __construct(StripPrefixConfig $config) {

        if( !is_null( $config->getForceSlash() ) ) {
            $this->middlewareData['forceSlash'] = $config->getForceSlash();
        }

        if ($prefixes = $config->getPrefixes()) {
            $this->middlewareData['prefixes'] = $prefixes;
        }
    }
}
