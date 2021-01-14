<?php

namespace Traefik\Middleware\Config;

use Traefik\Middleware\Config\Tls as TlsConfig;

class ForwardAuth implements MiddlewareInterface{

    protected string $address;
    protected TlsConfig $tls;
    protected bool $trustForwardHeader;
    protected array $authResponseHeaders;

    /**
     * @return string
     */
    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\ForwardAuth::class;
    }

    /**
     * @return array|null
     */
    public function getAuthResponseHeaders(): ?array {
        return $this->authResponseHeaders ?? null;
    }

    /**
     * @param string $authResponseHeader
     * @return $this
     */
    public function addAuthResponseHeaders(string $authResponseHeader): self {
        $this->authResponseHeaders[] = $authResponseHeader;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getTrustForwardHeader(): ?bool {
        return $this->trustForwardHeader ?? null;
    }

    /**
     * @param bool $trustForwardHeader
     * @return $this
     */
    public function setTrustForwardHeader(bool $trustForwardHeader): self {
        $this->trustForwardHeader = $trustForwardHeader;
        return $this;
    }

    /**
     * @return Tls|null
     */
    public function getTls(): ?Tls {
        return $this->tls ?? null;
    }

    /**
     * @param Tls $tls
     * @return $this
     */
    public function setTls(Tls $tls): self {
        $this->tls = $tls;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string {
        return $this->address ?? null;
    }

    /**
     * @param string $address
     * @return $this
     */
    public function setAddress(string $address): self {
        $this->address = $address;
        return $this;
    }

}
