<?php

namespace Traefik\Http;

use Traefik\Service\AbstractObject as ServiceObject;
use Traefik\Transport\HttpTrait;
use Traefik\Type\ServiceTrait;
use Traefik\Http\Server;

class Service extends ServiceObject
{
    use HttpTrait;
    use ServiceTrait;

    protected bool $passHostHeader = false;

    /**
     *
     * @param boolean $status
     * @return void
     */
    public function setPassHostHeader(bool $status)
    {
        $this->passHostHeader = $status;
        return $this;
    }

    /**
     *
     * @param boolean $status
     * @return void
     */
    public function getPassHostHeader()
    {
        return $this->passHostHeader;
    }

    /**
     *
     * @param boolean $status
     * @return void
     */
    public function addServer( string $url ): self
    {
        $this->servers[] = (new Server( $url ));
        return $this;
    }

    /**
     *
     * @param boolean $status
     * @return void
     */
    public function getData(): array
    {
        return [
            $this->getType() => [
                'passHostHeader' => $this->getPassHostHeader(),
                $this->getServerKey() => $this->getServers()
            ]
        ];
    }
}
