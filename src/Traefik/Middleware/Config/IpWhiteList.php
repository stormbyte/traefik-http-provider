<?php

namespace Traefik\Middleware\Config;

class IpWhiteList {

    protected int $ipStrategyDepth;
    protected array $ipStrategyExcludedIPs = [];
    protected array $sourceRange = [];

    /**
     * @return int|null
     */
    public function getIpStrategyDepth(): ?int {
        return $this->ipStrategyDepth ?? null;
    }

    /**
     * @param int $ipStrategyDepth
     * @return $this
     */
    public function setIpStrategyDepth(int $ipStrategyDepth): self {
        $this->ipStrategyDepth = $ipStrategyDepth;
        return $this;
    }

    /**
     * @return array
     */
    public function getIpStrategyExcludedIPs(): ?array {
        return $this->ipStrategyExcludedIPs ?? null;
    }

    /**
     * @param string $ipStrategyExcludedIP
     * @return $this
     */
    public function addIpStrategyExcludedIP(string $ipStrategyExcludedIP): self {
        $this->ipStrategyExcludedIPs[] = $ipStrategyExcludedIP;
        return $this;
    }

    /**
     * @return array
     */
    public function getSourceRange(): ?array {
        return $this->sourceRange ?? null;
    }

    /**
     * @param string $sourceIp
     * @return $this
     */
    public function addSourceRange(string $sourceIp): self {
        $this->sourceRange[] = $sourceIp;
        return $this;
    }

}
