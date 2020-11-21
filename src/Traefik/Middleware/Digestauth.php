<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/digestauth/
 */
class Digestauth extends MiddlewareAbstract
{
    protected string $middlewareName = 'digestauth';
    protected array $middlewareOptions = ['users','usersFile','realm','removeHeader','headerField'];

    // Use htdigest to generate passwords.

    protected function setRemoveHeader( bool $value )
    {
        return $value;
    }
}