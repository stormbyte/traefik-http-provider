<?php

namespace Traefik\Tcp;

class Server {
    public string $address;

    public function __construct(string $address) {
        $this->address = $address;
    }
}
