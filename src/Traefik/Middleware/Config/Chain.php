<?php

namespace Traefik\Middleware\Config;

class Chain {

    protected array $middlewares = [];

    /**
     * @return array|null
     */
    public function getMiddlewares(): ?array {
        return $this->middlewares ?? null;
    }

    /**
     * @param string $middleware
     * @return $this
     */
    public function addMiddleware(string $middleware): self {
        $this->middlewares[] = $middleware;
        return $this;
    }
}
