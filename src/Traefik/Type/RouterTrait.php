<?php

namespace Traefik\Type;

trait RouterTrait
{

    /**
     * @return string
     */
    public function getTraefikType(): string
    {
        return 'routers';
    }
}
