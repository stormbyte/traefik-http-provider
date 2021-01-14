<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\ErrorPage as ErrorPageConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/errorpages/
 */
class ErrorPage extends MiddlewareAbstract {
    protected string $middlewareName = 'errors';

    public function __construct(ErrorPageConfig $config) {

        if( $query = $config->getQuery() )
        {
            $this->middlewareData['query'] = $query;
        }
        if( $service = $config->getService() )
        {
            $this->middlewareData['service'] = $service;
        }
        if( $status = $config->getStatus() )
        {
            $this->middlewareData['status'] = $status;
        }

    }

}
