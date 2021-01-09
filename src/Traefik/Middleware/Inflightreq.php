<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/inflightreq/
 */
class Inflightreq extends MiddlewareAbstract
{
    protected string $middlewareName = 'inFlightReq';
    protected array $middlewareOptions = ['amount', 'sourceCriterion'];

    protected function setAmount(int $value)
    {
        return $value;
    }
}
