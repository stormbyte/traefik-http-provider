<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\IpWhiteList as IpWhiteListConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/ipwhitelist/
 */
class IpWhiteList extends MiddlewareAbstract {
    protected string $middlewareName = 'ipWhiteList';

    public function __construct(IpWhiteListConfig $config) {

        if ($ipStrategyDepth = $config->getIpStrategyDepth()) {
            $this->middlewareData['ipStrategy']['depth'] = $ipStrategyDepth;
        }
        $ipStrategyExcludedIPs = $config->getIpStrategyExcludedIPs();
        if (!empty($ipStrategyExcludedIPs)) {
            $this->middlewareData['ipStrategy']['excludedIPs'] = $ipStrategyExcludedIPs;
        }
        $sourceRange = $config->getSourceRange();
        if (!empty($sourceRange)) {
            $this->middlewareData['sourceRange'] = $sourceRange;
        }

    }
}
