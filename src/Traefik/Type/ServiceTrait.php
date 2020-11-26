<?php

namespace Traefik\Type;

trait ServiceTrait
{

    /**
     * @return string
     */
    public function getTraefikType(): string
    {
        return 'services';
    }
}
