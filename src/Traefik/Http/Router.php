<?php

namespace Traefik\Http;

use Traefik\RouterObject;
use Traefik\Transport\HttpTrait;
use Traefik\Type\RouterTrait;

class Router extends RouterObject {
    use HttpTrait;
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
                'certResolver' => 'letsencrypt'
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
