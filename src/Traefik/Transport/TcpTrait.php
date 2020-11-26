<?php

namespace Traefik\Transport;

trait TcpTrait
{

    /**
     * @return string
     */
    public function getTraefikTransport(): string
    {
        return 'tcp';
    }
}
