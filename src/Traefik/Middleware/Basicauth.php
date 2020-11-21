<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/basicauth/
 */
class Basicauth extends MiddlewareAbstract
{
    protected string $middlewareName = 'basicauth';
    protected array $middlewareOptions = ['users','usersFile','realm','removeHeader','headerField'];

    public static function bcrypt( string $password) : string
    {
        return password_hash( $password, PASSWORD_BCRYPT );
    }

}