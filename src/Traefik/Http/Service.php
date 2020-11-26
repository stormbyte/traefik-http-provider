<?php

namespace Traefik\Http;

use Traefik\ServiceObject;
use Traefik\Transport\HttpTrait;
use Traefik\Type\ServiceTrait;

class Service extends ServiceObject
{
    use HttpTrait;
    use ServiceTrait;

    protected bool $passHostHeader = false;

    public function setPassHostHeader(bool $status)
    {
        $this->passHostHeader = $status;
        return $this;
    }

    public function getPassHostHeader()
    {
        return $this->passHostHeader;
    }

    public function getData(): array
    {
        return [
            $this->getType() => [
                'passHostHeader' => $this->getPassHostHeader(),
                'servers' => $this->getServers()
            ]
        ];
    }
}
