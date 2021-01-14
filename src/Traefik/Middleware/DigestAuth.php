<?php

namespace Traefik\Middleware;

use Traefik\Middleware\Config\DigestAuth as DigestAuthConfig;
use Traefik\Middleware\MiddlewareAbstract;

/**
 * https://doc.traefik.io/traefik/v2.3/middlewares/digestauth/
 */
class DigestAuth extends MiddlewareAbstract {
    protected string $middlewareName = 'digestAuth';

    public function __construct(DigestAuthConfig $config) {

        if($users = $config->getUsers() ) {
            $this->middlewareData['users'] = $users;
        }
        if($usersFile = $config->getUsersFile() ) {
            $this->middlewareData['usersFile'] = $usersFile;
        }
        if($realm = $config->getRealm() ) {
            $this->middlewareData['realm'] = $realm;
        }
        if(!is_null($config->getRemoveHeader()) ) {
            $this->middlewareData['removeHeader'] = $config->getRemoveHeader();
        }
        if($headerField = $config->getHeaderField() ) {
            $this->middlewareData['headerField'] = $headerField;
        }
    }
}
