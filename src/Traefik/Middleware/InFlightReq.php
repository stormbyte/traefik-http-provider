<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\InFlightReq as InFlightReqConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/inflightreq/
 */
class InFlightReq extends MiddlewareAbstract {
    protected string $middlewareName = 'inFlightReq';

    public function __construct(InFlightReqConfig $config) {

        if ($amount = $config->getAmount()) {
            $this->middlewareData['amount'] = $amount;
        }
        if ($sourceCriterion = $config->getSourceCriterion()) {
            $this->middlewareData['sourceCriterion'] = $sourceCriterion->getData();
        }

    }
}
