<?php

namespace Traefik\Transport;

trait HttpTrait
{

    /**
     * @return string
     */
    public function getTraefikTransport(): string
    {
        return 'http';
    }
}
