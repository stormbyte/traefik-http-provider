<?php

namespace Traefik\Transport;

trait UdpTrait{

    /**
     * @return string
     */
    public function getTraefikTransport(): string
    {
        return 'udp';
    }
}