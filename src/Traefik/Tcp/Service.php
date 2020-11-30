<?php

namespace Traefik\Tcp;

use Traefik\Service\AbstractObject as ServiceObject;
use Traefik\Transport\TcpTrait;
use Traefik\Type\ServiceTrait;
use Traefik\Tcp\Server;

class Service extends ServiceObject
{
    use TcpTrait;
    use ServiceTrait;

    protected int $terminationDelay;

    public function setTerminationDelay(int $delay)
    {
        $this->terminationDelay = $delay;
        return $this;
    }

    public function getTerminationDelay()
    {
        return $this->terminationDelay;
    }

    public function addServer( string $url ): self
    {
        $this->servers[] = (new Server( $url ));
        return $this;
    }

    public function getData(): array
    {
        $data = [
            $this->getServerKey() => $this->getServers()
        ];
        if (isset($this->terminationDelay)) {
            $data['terminationDelay'] = $this->getTerminationDelay();
        }

        return [$this->getType() => $data];
    }
}
