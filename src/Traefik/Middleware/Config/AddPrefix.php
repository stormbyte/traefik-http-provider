<?php

namespace Traefik\Middleware\Config;

class AddPrefix implements MiddlewareInterface {

    protected string $prefix;

    public function getPrefix(): ?string {
        return $this->prefix ?? null;
    }

    public function setPrefix(string $prefix): self {
        $this->prefix = $prefix;
        return $this;
    }

    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\AddPrefix::class;
    }
}
