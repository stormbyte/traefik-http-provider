<?php

namespace Traefik\Middleware\Config;

class SourceCriterion {

    protected string $requestHeaderName;
    protected bool $requestHost;
    protected int $ipStrategyDepth;
    protected array $ipStrategyExcludedIPs = [];

    /**
     * @return string|null
     */
    public function getRequestHeaderName(): ?string {
        return $this->requestHeaderName ?? null;
    }

    /**
     * @param string $requestHeaderName
     * @return $this
     */
    public function setRequestHeaderName(string $requestHeaderName): self {
        $this->requestHeaderName = $requestHeaderName;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestHost(): ?bool {
        return $this->requestHost ?? null;
    }

    /**
     * @param bool $requestHost
     * @return $this
     */
    public function setRequestHost(bool $requestHost): self {
        $this->requestHost = $requestHost;
        return $this;
    }

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
    public function getIpStrategyExcludedIPs(): array {
        return $this->ipStrategyExcludedIPs;
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
     * @return array|null
     */
    public function getData(): ?array {
        $dataArray = [];

        if ($requestHeaderName = $this->getRequestHeaderName()) {
            $dataArray['requestHeaderName'] = $requestHeaderName;
        }
        if ($requestHost = $this->getRequestHost()) {
            $dataArray['requestHost'] = $requestHost;
        }
        if ($ipStrategyDepth = $this->getIpStrategyDepth()) {
            $dataArray['ipStrategy']['depth'] = $ipStrategyDepth;
        }
        $ipStrategyExcludedIPs = $this->getIpStrategyExcludedIPs();
        if (!empty($ipStrategyExcludedIPs)) {
            $dataArray['ipStrategy']['excludedIPs'] = $ipStrategyExcludedIPs;
        }

        return (!empty($dataArray)) ? $dataArray : null;
    }
}
