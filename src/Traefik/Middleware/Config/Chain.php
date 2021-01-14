<?php

namespace Traefik\Middleware\Config;

class Chain implements MiddlewareInterface{

    protected array $middlewares = [];

    /**
     * @return string
     */
    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\Chain::class;
    }

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
