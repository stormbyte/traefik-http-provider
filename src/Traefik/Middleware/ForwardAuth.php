<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\ForwardAuth as ForwardAuthConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/forwardauth/
 */
class ForwardAuth extends MiddlewareAbstract {
    protected string $middlewareName = 'forwardAuth';

    public function __construct(ForwardAuthConfig $config) {

        if ($authResponseHeaders = $config->getAuthResponseHeaders()) {
            $this->middlewareData['authResponseHeaders'] = $authResponseHeaders;
        }
        if (!is_null($config->getTrustForwardHeader())) {
            $this->middlewareData['trustForwardHeader'] = $config->getTrustForwardHeader();
        }
        if ($tls = $config->getTls()) {
            $this->middlewareData['tls'] = $tls->getData();
        }
        if ($address = $config->getAddress()) {
            $this->middlewareData['address'] = $address;
        }
    }
}
