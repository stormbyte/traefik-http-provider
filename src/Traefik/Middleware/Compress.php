<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\Compress as CompressConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/compress/
 */
class Compress extends MiddlewareAbstract {
    protected string $middlewareName = 'compress';

    public function __construct(CompressConfig $config) {
        if ($excludedContentTypes = $config->getExcludedContentTypes()) {
            $this->middlewareData['excludedContentTypes'] = $excludedContentTypes;
        }
    }
}
