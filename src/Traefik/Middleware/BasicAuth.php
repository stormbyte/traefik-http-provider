<?php

namespace Traefik\Middleware;

use Traefik\Middleware\MiddlewareAbstract;
use Traefik\Middleware\Config\BasicAuth as BasicAuthConfig;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/basicauth/
 */
class BasicAuth extends MiddlewareAbstract {
    protected string $middlewareName = 'basicAuth';
    protected array $middlewareOptions = ['users', 'usersFile', 'realm', 'removeHeader', 'headerField'];

    public function __construct(BasicAuthConfig $config) {
        if ($usersFile = $config->getUsersFile()) {
            $this->middlewareData['usersFile'] = $usersFile;
        }

        if ($realm = $config->getRealm()) {
            $this->middlewareData['realm'] = $realm;
        }

        if ($headerField = $config->getHeaderField()) {
            $this->middlewareData['headerField'] = $headerField;
        }

        if ($users = $config->getUsers()) {
            $this->middlewareData['users'] = $users;
        }

        if (!is_null($config->getRemoveHeader())) {
            $this->middlewareData['removeHeader'] = $config->getRemoveHeader();
        }
    }
}
