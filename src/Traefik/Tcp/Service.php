<?php

namespace Traefik\Tcp;

use Traefik\ServiceObject;
use Traefik\Transport\TcpTrait;
use Traefik\Type\ServiceTrait;

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

    public function getData(): array
    {
        $data = [
            'servers' => $this->getServers()
        ];
        if (isset($this->terminationDelay)) {
            $data['terminationDelay'] = $this->getTerminationDelay();
        }

        return [$this->getType() => $data];
    }
}
