<?php

namespace Traefik\Udp;

use Traefik\RouterObject;
use Traefik\Transport\UdpTrait;
use Traefik\Type\RouterTrait;

class Router extends RouterObject
{
    use UdpTrait;
    use RouterTrait;

    public function getData(): array
    {
        $routerData = [
            'entryPoints' => $this->getEntryPoints(),
            'service' => $this->getService(),
            'rule' => $this->getRule(),

        ];
        if ($this->tls) {
            $routerData['tls'] = [
                'passthrough' => 'true'
            ];
        }

        if (isset($this->priority)) {
            $routerData['priority'] = $this->priority;
        }

        if (isset($this->middlewares)) {
            $routerData['middlewares'] = $this->middlewares;
        }

        return $routerData;
    }
}
