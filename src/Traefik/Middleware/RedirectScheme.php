<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\RedirectScheme as RedirectSchemeConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/redirectscheme/
 */
class RedirectScheme extends MiddlewareAbstract {
    protected string $middlewareName = 'redirectScheme';
    protected array $middlewareOptions = ['scheme', 'port', 'permanent'];


    public function __construct(RedirectSchemeConfig $config) {

        if ($scheme = $config->getScheme()) {
            $this->middlewareData['scheme'] = $scheme;
        }
        if ($port = $config->getPort()) {
            $this->middlewareData['port'] = $port;
        }
        if (!is_null($config->isPermanent())) {
            $this->middlewareData['permanent'] = $config->isPermanent();
        }

    }

}
