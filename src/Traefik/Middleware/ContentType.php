<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\ContentType as ContentTypeConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/contenttype/
 */
class ContentType extends MiddlewareAbstract {
    protected string $middlewareName = 'contentType';

    public function __construct(ContentTypeConfig $config) {
        if (!is_null($config->getAutoDetect())) {
            $this->middlewareData['autoDetect'] = $config->getAutoDetect();
        }

    }
}
