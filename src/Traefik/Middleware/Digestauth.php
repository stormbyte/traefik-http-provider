<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/digestauth/
 */
class Digestauth extends MiddlewareAbstract
{
    protected string $middlewareName = 'digestAuth';
    protected array $middlewareOptions = ['users', 'usersFile', 'realm', 'removeHeader', 'headerField'];

    // Use htdigest to generate passwords.

    protected function setRemoveHeader(bool $value)
    {
        return $value;
    }

    public static function htdigest(string $username, string $realm, string $password): string
    {
        return md5(implode(':', [$username, $realm, $password]));
    }
}
