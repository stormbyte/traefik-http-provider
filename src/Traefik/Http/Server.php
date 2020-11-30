<?php

namespace Traefik\Http;

/**
 * Server
 */
class Server
{
    public string $url;

    /**
     *
     * @param string $url
     */
    public function __construct( string $url )
    {
        $this->url = $url;
    }
}
