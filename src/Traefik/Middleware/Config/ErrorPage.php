<?php

namespace Traefik\Middleware\Config;

class ErrorPage implements MiddlewareInterface{

    protected array $status = [];
    protected string $service;
    protected string $query;

    /**
     * @return string
     */
    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\ErrorPage::class;
    }

    /**
     * @return string|null
     */
    public function getQuery(): ?string {
        return $this->query ?? null;
    }

    /**
     * @param string $query
     * @return $this
     */
    public function setQuery(string $query): self {
        $this->query = $query;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getService(): ?string {
        return $this->service ?? null;
    }

    /**
     * @param string $service
     * @return $this
     */
    public function setService(string $service): self {
        $this->service = $service;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getStatus(): ?array {
        return $this->status ?? null;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function addStatus(string $status): self {
        $this->status[] = $status;
        return $this;
    }

}
