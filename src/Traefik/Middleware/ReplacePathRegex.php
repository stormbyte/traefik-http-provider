<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\ReplacePathRegex as ReplacePathRegexConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/replacepathregex/
 */
class ReplacePathRegex extends MiddlewareAbstract {
    protected string $middlewareName = 'replacePathRegex';
    protected array $middlewareOptions = ['regex', 'replacement'];

    public function __construct(ReplacePathRegexConfig $config) {

        if( $regex = $config->getRegex() ){
            $this->middlewareData['regex'] = $regex;
        }

        if ($replacement = $config->getReplacement()) {
            $this->middlewareData['replacement'] = $replacement;
        }

    }
}
