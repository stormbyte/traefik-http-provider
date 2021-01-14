<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\StripPrefixRegex as StripPrefixRegexConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/stripprefixregex/
 */
class StripPrefixRegex extends MiddlewareAbstract {
    protected string $middlewareName = 'stripPrefixRegex';

    public function __construct(StripPrefixRegexConfig $config) {

        if ($prefixes = $config->getRegex()) {
            $this->middlewareData['regex'] = $prefixes;
        }
    }
}
