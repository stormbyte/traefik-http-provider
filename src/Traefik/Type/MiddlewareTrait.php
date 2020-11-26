<?php

namespace Traefik\Type;

trait MiddlewareTrait
{

    /**
     * @return string
     */
    public function getTraefikType(): string
    {
        return 'middlewares';
    }
}
