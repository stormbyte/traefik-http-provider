<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\RedirectRegex as RedirectRegexConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/redirectregex/
 */
class RedirectRegex extends MiddlewareAbstract {
    protected string $middlewareName = 'redirectRegex';

    public function __construct(RedirectRegexConfig $config) {

        if ($regex = $config->getRegex()) {
            $this->middlewareData['regex'] = $regex;
        }
        if ($replacement = $config->getReplacement()) {
            $this->middlewareData['replacement'] = $replacement;
        }
        if (!is_null($config->isPermanent())) {
            $this->middlewareData['permanent'] = $config->isPermanent();
        }


    }
}
