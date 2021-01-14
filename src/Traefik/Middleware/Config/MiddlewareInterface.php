<?php

namespace Traefik\Middleware\Config;

interface MiddlewareInterface {

    /**
     * Return Class name of middleware
     *
     * @return string
     */
    public function getMiddlewareClassName(): string;

}
