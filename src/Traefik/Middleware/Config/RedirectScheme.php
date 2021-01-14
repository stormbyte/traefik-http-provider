<?php

namespace Traefik\Middleware\Config;

class RedirectScheme implements MiddlewareInterface{

    protected string $scheme;
    protected string $port;
    protected bool $permanent;

    /**
     * @return string
     */
    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\RedirectScheme::class;
    }

    /**
     * @return string|null
     */
    public function getScheme(): ?string {
        return $this->scheme ?? null;
    }

    /**
     * @param string $scheme
     * @return $this
     */
    public function setScheme(string $scheme): self {
        $this->scheme = $scheme;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPort(): ?string {
        return $this->port ?? null;
    }

    /**
     * @param string $port
     * @return $this
     */
    public function setPort(string $port): self {
        $this->port = $port;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isPermanent(): ?bool {
        return $this->permanent ?? null;
    }

    /**
     * @param bool $permanent
     * @return $this
     */
    public function setPermanent(bool $permanent): self {
        $this->permanent = $permanent;
        return $this;
    }
}
