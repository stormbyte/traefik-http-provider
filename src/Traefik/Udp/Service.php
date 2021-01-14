<?php

namespace Traefik\Udp;

use Traefik\Service\AbstractObject as ServiceObject;
use Traefik\Transport\UdpTrait;
use Traefik\Type\ServiceTrait;
use Traefik\Udp\Server;

class Service extends ServiceObject {
    use UdpTrait;
    use ServiceTrait;

    protected int $terminationDelay;

    /**
     *
     * @param integer $delay
     * @return self
     */
    public function setTerminationDelay(int $delay): self {
        $this->terminationDelay = $delay;
        return $this;
    }

    /**
     *
     * @param integer $delay
     * @return self
     */
    public function getTerminationDelay(): int {
        return $this->terminationDelay;
    }

    /**
     * @param string $url
     * @return self
     */
    public function addServer(string $url): self {
        $this->servers[] = (new Server($url));
        return $this;
    }

    /**
     * @return array[]
     */
    public function getData(): array {
        $data = [
            $this->getServerKey() => $this->getServers()
        ];
        if (isset($this->terminationDelay)) {
            $data['terminationDelay'] = $this->getTerminationDelay();
        }

        return [$this->getType() => $data];
    }
}
