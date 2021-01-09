<?php

namespace Traefik\Service;

use \Traefik\ConfigObject;

abstract class AbstractObject implements ConfigObject
{
    const LOADBALANCER = 'loadBalancer';
    const MIRRORING = 'mirroring';
    const WEIGHTED = 'weighted';

    protected string $name;
    protected string $type;
    protected array $servers = [];

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $name
     * @return self
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $name
     * @return self
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $name
     * @return self
     */
    abstract public function addServer(string $url);

    /**
     * @return array
     */
    public function getServers(): array
    {
        return $this->servers;
    }
    public function getServerKey()
    {
        switch ($this->getType()) {
            case self::LOADBALANCER:
                return 'servers';
            case self::WEIGHTED:
                return 'services';
            case self::MIRRORING:
                return 'mirrors';
        }
        return 'servers';
    }
}
