<?php

namespace Traefik\Udp;

/**
 * Server
 */
class Server {
    public string $address;

    /**
     *
     * @param string $address
     */
    public function __construct(string $address) {
        $this->address = $address;
    }
}
