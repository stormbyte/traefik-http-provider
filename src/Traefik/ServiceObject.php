<?php

namespace Traefik;

use \Traefik\ConfigObject;


abstract class ServiceObject implements ConfigObject
{
    const LOADBALANCER = 'loadBalancer';
    const MIRRORING = 'mirroring';
    const WEIGHTED = 'weighted';

    protected string $name;
    protected string $type;
    protected array $servers = [];

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function addServer(string $url)
    {
        $this->servers[] = [
            'url' => $url
        ];
        return $this;
    }

    public function getServers()
    {
        return $this->servers;
    }
}
