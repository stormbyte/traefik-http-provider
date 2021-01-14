<?php

namespace Traefik\Tcp;

use Traefik\RouterObject;
use Traefik\Transport\TcpTrait;
use Traefik\Type\RouterTrait;

class Router extends RouterObject {
    use TcpTrait;
    use RouterTrait;

    public function getData(): array {
        $routerData = [
            'entryPoints' => $this->getEntryPoints(),
            'service' => $this->getService()
        ];

        if ($rule = $this->getRule()) {
            $routerData['rule'] = $rule;
        }

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
